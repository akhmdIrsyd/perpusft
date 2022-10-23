<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Mahasiswa;
use App\Models\Jurusan;
use App\Models\Buku;

use Illuminate\Support\Facades\Mail;
use Ramsey\Uuid\Uuid;
class ProsesFakultasControllers extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
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
        $update_buku->jumlah = $update_buku->jumlah + 1;
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
            $emails = $mhs_list->value('email');
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

            //Mail::to($emails)->send(new \App\Mail\MyTestMail($details));
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
        return redirect('/buku');
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
        return view('proses.update1', compact('bookings', 'bukus', 'jurusans', 'Mahasiswas_belum'))->with('i', (request()->input('page', 1) - 1) * 5);
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
        $total_tolak = 0;
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

            if ($addstatus[$i] == 2) {
                $details = [
                    'title' => 'Pembelian Buku untuk Perpustakaan',
                    'body' => 'Buku Piihan anda di TOLAK, mohon hubungi prodi anda',
                    'kode' => $kode_beli,
                    'nama' => $nama_buku[0],
                    'penerbit' => $penerbit[0],
                    'penulis' => $penulis[0],
                    'harga' => $harga[0],
                    'nama' => $nama_buku[0],
                    'nama_mhs' => $nama_mhs,
                    'nim' => $nim[$i],
                ];
                $total_tolak = $total_tolak + 1;
                //Mail::to($emails)->send(new \App\Mail\MyTestMail($details));


            } elseif ($addstatus[$i] == 3) {
                $details = [
                    'title' => 'Pembelian Buku untuk Perpustakaan',
                    'body' => 'Buku Piihan anda di SETUJUI, silahkan lakukan pembelian buku',
                    'kode' => $kode_beli,
                    'nama' => $nama_buku[0],
                    'penerbit' => $penerbit[0],
                    'penulis' => $penulis[0],
                    'harga' => $harga[0],
                    'nama' => $nama_buku[0],
                    'nama_mhs' => $nama_mhs,
                    'nim' => $nim[$i],
                ];
            } else {
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

                // Mail::to($emails)->send(new \App\Mail\MyTestMail($details));
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
        return redirect('/proses');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}