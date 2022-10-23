<?php

namespace App\Http\Controllers;
use App\Models\Buku;
use App\Models\Jurusan;
use App\Models\Mahasiswa;
use App\Models\Booking;

use Ramsey\Uuid\Uuid;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;

class DepanHomeControllers extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jurusans = Jurusan::where('id', '!=', '1')->get();
        return view('DepanHome.index', compact('jurusans'));
    }
    public function buku()
    {
        $bukus = Buku::with('Jurusan')
        ->selectRaw('bukus.id, bukus.nama_buku, penerbit, harga, exemplar, id_jurusan,harga/100000 as orang, jumlah')
        ->leftJoin("bookings", "bukus.id", "=", "bookings.id_buku")
        ->groupBy('bukus.id')
        ->get();
        $jurusans = Jurusan::where('id', '!=', '1')->get();
        return view('DepanHome.buku', compact('bukus', 'jurusans'))->with('i', (request()->input('page', 1) - 1) * 5);
        
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
        $addnama = $request->input('addnama');
        $addNIM = $request->input('addNIM');
        $addid_jurusan = $request->input('addid_jurusan');
        $addno_hp = $request->input('addno_hp');
        $addemail = $request->input('addemail');

        $nama_buku = $request->get('addnama_buku');
        $answers = array();
        $answers1 = array();
        $uuid4 = Uuid::uuid4();
        $uuid4->toString();

        $update_buku = Buku::find($request->addid_buku);
        $update_buku->jumlah = $request->addjumlah + 1;
        $update_buku->save();

        for ($i = 0; $i < count($addNIM); $i++) {
            $answers[] = [
                'nama_mhs' => $addnama[$i],
                'nim' => $addNIM[$i],
                'id_jurusan' => $addid_jurusan[$i],
                'no_hp' => $addno_hp[$i],
                'email' => $addemail[$i],
            ];
        }
        Mahasiswa::insert($answers);

        for ($i = 0; $i < count($addNIM); $i++) {
            $answers1[] = [

                'kode_beli' => $uuid4,
                'id_buku' => $request->addid_buku,
                'NIM_mhs' => $addNIM[$i],
                'status' => 1,
            ];
            
            $details = [
                'title' => 'Pembelian Buku untuk Perpustakaan',
                'body' => 'Selamat anda berhasil melakukan pemilihan buku',
                'kode' => $uuid4,
                'nama' => $nama_buku[$i]
            ];

            Mail::to($addemail[$i])->send(new \App\Mail\MyTestMail($details));
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
        
        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
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
