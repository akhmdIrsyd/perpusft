<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Mahasiswa;
use App\Models\Jurusan;
use App\Models\Buku;
use App\Imports\BukuImport;
use Ramsey\Uuid\Uuid;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Mail;
use Session;
class ProsesControllers extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Mahasiswas = Mahasiswa::with('Jurusan')->latest()->get();
        $jurusans = Jurusan::all();
        $bookings = Booking::with('Buku')
            ->selectRaw('kode_beli, id_buku')
            ->groupBy('kode_beli')
            ->latest()
            ->get();
        $Mahasiswas_belum = Mahasiswa::with('Jurusan')
        ->where('status','=','0')
        ->get();
        return view('proses.index', compact('bookings', 'jurusans', 'Mahasiswas', 'Mahasiswas_belum'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function index_fakultas(Request $request)
    {
        $id_jurusan = $request->user()->id_jurusan;
        $Mahasiswas = Mahasiswa::with('Jurusan')->latest()->get();
        $jurusans = Jurusan::where('id', '!=', '1');
        $bookings = Booking::with('Buku')
            ->selectRaw('kode_beli, id_buku, nama_jurusan, id_jurusan')
            ->groupBy('kode_beli')
            ->Join("bukus", "bukus.id", "=",  "bookings.id_buku")
            ->Join("jurusans", "jurusans.id", "=",  "bukus.id_jurusan")
            ->where('id_jurusan', '=', $id_jurusan)
            ->get();
        $Mahasiswas_belum = Mahasiswa::with('Jurusan')
        ->where('status', '=', '0')
        ->get();
        return view('proses.index', compact('bookings', 'jurusans', 'Mahasiswas', 'Mahasiswas_belum'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
        $nim = $request->input('nim');
        $nama_buku = $request->get('addnama_buku');
        $penerbit = $request->get('penerbit');
        $penulis = $request->get('penulis');
        $harga = $request->get('harga');
        $answers1 = array();
        $uuid4 = Uuid::uuid4();
        $uuid4->toString();

        $update_buku = Buku::find($request->addid_buku);
        $update_buku->jumlah = $update_buku->jumlah+1;
        $update_buku->save();
        

        for ($i = 0; $i < count($nim); $i++) {
            $mahasiswas = Mahasiswa::where('nim', $nim[$i]);
            $mahasiswas->update([
                'status' => 1,
            ]);



            $answers1[] = [
                'kode_beli' => $uuid4,
                'id_buku' => $request->addid_buku,
                'NIM_mhs' => $nim[$i],
                'status' => 1,
            ];

            $mhs_list = Mahasiswa::where('nim', $nim[$i]);
            $nama_mhs = $mhs_list->value('nama_mhs');
            $emails[] = $mhs_list->value('email');
            $id_jurusan = $mhs_list->value('id_jurusan');
            $jurusans = Jurusan::where('id', $id_jurusan);

            $answers[] = [
                'nama_mhs' => $nama_mhs,
                'nim' => $nim[$i],
                'id_jurusan' => $jurusans,
            ];
            $details = [
                'title' => 'Pembelian Buku untuk Perpustakaan',
                'body' => 'Buku yang anda beli adalah:',
                'kode' => $uuid4,
                'nama' => $nama_buku[0],
                'penerbit' => $penerbit[0],
                'penulis' => $penulis[0],
                'harga' => $harga[0],
                'nama' => $nama_buku[0],
                'nama_mhs' => $nama_mhs, 
                'nim' => $nim[$i],
            ];

        }
        Booking::insert($answers1);

        for ($i = 0; $i < count($nim); $i++) {
                Mail::to($emails[$i])->send(new \App\Mail\MyTestMail($details, $answers));
        }

        //$tambah_mahasiswa = new Mahasiswa;
        //$tambah_mahasiswa->nama_mhs = $request->addnama;
        //$tambah_mahasiswa->nim = $request->addNIM;
        //$tambah_mahasiswa->id_jurusan = $request->addid_jurusan;
        //$tambah_mahasiswa->no_hp = $request->addno_hp;
        //$tambah_mahasiswa->email = $request->addemail;
        //$tambah_mahasiswa->save();

        //$tambah_booking = new Booking;
        //$tambah_booking->id_buku = $request->addid_buku;
        //$tambah_booking->NIM_mhs = $request->addNIM;
        //$tambah_booking->status = 1;
        //$tambah_booking->save();
        
        $id_jurusan = $request->user()->id_jurusan;
        if ($id_jurusan == 1) {
            # code...
            return redirect('/buku');
        } else {
            return redirect('/buku_fakultas');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $jurusans = Jurusan::all();
        $bookings = Booking::with('Buku')
            ->selectRaw('bookings.id, kode_beli, id_buku, NIM_mhs, nama_mhs, id_jurusan, email, no_hp, bookings.status')
            ->Join("mahasiswas", "mahasiswas.nim", "=", "bookings.NIM_mhs")
            ->where('kode_beli', '=', $id)
            ->get();

        $bukus = Booking::with('Buku')
            ->selectRaw('kode_beli, id_buku')
            ->groupBy('kode_beli')
            ->where('kode_beli', '=', $id)
            ->get();
        $Mahasiswas_belum = Mahasiswa::with('Jurusan')
        ->where('status', '=', '0')
        ->get();
        return view('proses.update1', compact('bookings', 'bukus','jurusans', 'Mahasiswas_belum'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function showupdate($id)
    {
        $jurusans = Jurusan::all();
        $bookings = Booking::with('Buku')
        ->selectRaw('bookings.id, kode_beli, id_buku, NIM_mhs, nama_mhs, id_jurusan, email, no_hp, bookings.status')
        ->Join("mahasiswas", "mahasiswas.nim", "=", "bookings.NIM_mhs")
        ->where('kode_beli', '=', $id)
            ->get();

        $bukus = Booking::with('Buku')
        ->selectRaw('kode_beli, id_buku')
        ->groupBy('kode_beli')
        ->where('kode_beli', '=', $id)
            ->get();
        $Mahasiswas_belum = Mahasiswa::with('Jurusan')
        ->get();
        return view('proses.update1', compact('bookings', 'bukus', 'jurusans', 'Mahasiswas_belum'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $kode_beli = $request->get('kode_beli');
        $nim = $request->input('nim');
        $penerbit = $request->get('penerbit');
        $penulis = $request->get('penulis');
        $harga = $request->get('harga');
        $addstatus = $request->get('addstatus');
        $updateid = $request->get('updateid');
        $nama_buku = $request->get('addnama_buku');
        $addkode_beli = $request->get('addkode_beli');
        $answers1 = array();
        $uuid4 = Uuid::uuid4();
        $uuid4->toString();

        $update_mhs = Booking::where('kode_beli', $kode_beli)->get();
        foreach ($update_mhs as $mhs) {
            # code...
            $mahasiswas = Mahasiswa::where('nim', $mhs->NIM_mhs);
            $mahasiswas->update([
                'status' => 0,
            ]);
        }

        for ($i = 0; $i < count($nim); $i++) {
            $mahasiswas = Mahasiswa::where('nim', $nim[$i]);
            $mahasiswas->update([
                'status' => 1,
            ]);

            
        
        
            $del_Booking = Booking::where('kode_beli', '=', $kode_beli);
            $del_Booking->delete(); //delete the client
            
            $mhs_list = Mahasiswa::where('nim', $nim[$i]);
            $nama_mhs = $mhs_list->value('nama_mhs');
            $emails = $mhs_list->value('email');

            if ($addstatus[$i]==1){
                $details = [
                    'title' => 'Pembelian Buku untuk Perpustakaan',
                    'body' => 'Buku yang anda sumbangkan adalah senagao berikut, silahkan lakukan pembelian buku, lalu hubungi bagian Perpustakaan',
                    'kode' => $kode_beli,
                    'nama' => $nama_buku[0],
                    'penerbit' => $penerbit[0],
                    'penulis' => $penulis[0],
                    'harga' => $harga[0],
                    'nama' => $nama_buku[0],
                    'nama_mhs' => $nama_mhs,
                    'nim' => $nim[$i],
                ];

                
            }
            elseif($addstatus[$i]==2){
                $details = [
                    'title' => 'Pembelian Buku untuk Perpustakaan',
                    'body' => 'sumbangan buku anda telah di VERIFIKASI, silahkan lakukan pembelian buku',
                    'kode' => $kode_beli,
                    'nama' => $nama_buku[0],
                    'penerbit' => $penerbit[0],
                    'penulis' => $penulis[0],
                    'harga' => $harga[0],
                    'nama' => $nama_buku[0],
                    'nama_mhs' => $nama_mhs,
                    'nim' => $nim[$i],
                ];
            }
            else{
                $details = [
                    'title' => 'Pembelian Buku untuk Perpustakaan',
                    'body' => 'Buku Piihan anda di VERIFIKASI, silahkan lakukan pembelian buku',
                    'kode' => $kode_beli,
                    'nama' => $nama_buku[0],
                    'penerbit' => $penerbit[0],
                    'penulis' => $penulis[0],
                    'harga' => $harga[0],
                    'nama' => $nama_buku[0],
                    'nama_mhs' => $nama_mhs,
                    'nim' => $nim[$i],
                ];

            }
            $answers1[] = [
                'kode_beli' => $kode_beli,
                'id_buku' => $request->addid_buku,
                'NIM_mhs' => $nim[$i],
                'status' => $addstatus[$i],
            ];
        }
        Booking::insert($answers1);




        //$tambah_mahasiswa = new Mahasiswa;
        //$tambah_mahasiswa->nama_mhs = $request->addnama;
        //$tambah_mahasiswa->nim = $request->addNIM;
        //$tambah_mahasiswa->id_jurusan = $request->addid_jurusan;
        //$tambah_mahasiswa->no_hp = $request->addno_hp;
        //$tambah_mahasiswa->email = $request->addemail;
        //$tambah_mahasiswa->save();

        //$tambah_booking = new Booking;
        //$tambah_booking->id_buku = $request->addid_buku;
        //$tambah_booking->NIM_mhs = $request->addNIM;
        //$tambah_booking->status = 1;
        //$tambah_booking->save();
        $id_jurusan = $request->user()->id_jurusan;
        if ($id_jurusan == 1) {
            # code...
            return redirect('/proses');
        }
        else{
            return redirect('/proses_fakultas');
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id, $buku)
    {

        $update_mhs=Booking::where('kode_beli', $id)->get();

        foreach ($update_mhs as $mhs) { 
            # code...
            $mahasiswas = Mahasiswa::where('nim', $mhs->NIM_mhs);
            $mahasiswas->update([
                'status' => 0,
            ]);
        }

        Booking::where('kode_beli','=',$id)->delete();
        $id_jurusan = $request->user()->id_jurusan;
        
        $update_buku = Buku::find($buku);
        $update_buku->jumlah = $update_buku->jumlah - 1;
        $update_buku->save();
        if ($id_jurusan == 1) {
            # code...
            return redirect('/proses');
        } else {
            return redirect('/proses_fakultas');
        }
    }

   
  
}
