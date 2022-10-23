<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Jurusan;
use App\Models\Mahasiswa;

class MahasiswaControllers extends Controller
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
        return view('mahasiswa.index', compact('Mahasiswas', 'jurusans'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function index_fakultas(Request $request)
    {
        $id_jurusan = $request->user()->id_jurusan;
        $Mahasiswas = Mahasiswa::with('Jurusan')->latest()->get();
        $jurusans = Jurusan::where('id', '=', $id_jurusan)->get();
        return view('mahasiswa.index', compact('Mahasiswas', 'jurusans'))->with('i', (request()->input('page', 1) - 1) * 5);
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
        $tambah_mahasiswa = new Mahasiswa;
        $tambah_mahasiswa->nama_mhs = $request->addnama;
        $tambah_mahasiswa->nim = $request->addNIM;
        $tambah_mahasiswa->id_jurusan = $request->addid_jurusan;
        $tambah_mahasiswa->no_hp = $request->addno_hp;
        $tambah_mahasiswa->email = $request->addemail;
        $tambah_mahasiswa->save();
        
        $id_jurusan = $request->user()->id_jurusan;
        if ($id_jurusan == 1) {
            # code...
            return redirect('/mahasiswa');
        } else {
            return redirect('/mahasiswa_fakultas');
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
        $update_mahasiswa = Mahasiswa::find($id);
        $update_mahasiswa->nama_mhs = $request->updatenama;
        $update_mahasiswa->nim = $request->updatenim;
        $update_mahasiswa->id_jurusan = $request->updateid_jurusan;
        $update_mahasiswa->no_hp = $request->updateno_hp;
        $update_mahasiswa->email = $request->updateemail;
        $update_mahasiswa->status = $request->updatestatus;
        $update_mahasiswa->save();
        
        $id_jurusan = $request->user()->id_jurusan;
        if ($id_jurusan == 1) {
            # code...
            return redirect('/mahasiswa');
        } else {
            return redirect('/mahasiswa_fakultas');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        Mahasiswa::destroy($id);
        $id_jurusan = $request->user()->id_jurusan;
        if ($id_jurusan == 1) {
            # code...
            return redirect('/mahasiswa');
        } else {
            return redirect('/mahasiswa_fakultas');
        }
    }
}
