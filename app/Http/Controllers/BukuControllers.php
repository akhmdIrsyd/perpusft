<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Jurusan;
use App\Models\Mahasiswa;

use Illuminate\Http\Request;

use App\Imports\BukuImport;
use Maatwebsite\Excel\Facades\Excel;
use Session;
class BukuControllers extends Controller
{



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { {
            
            $bukus = Buku::with('Jurusan')
                ->selectRaw('bukus.id, bukus.nama_buku, penulis,penerbit, harga, exemplar, id_jurusan,harga/100000 as orang, jumlah')
                ->leftJoin("bookings", "bukus.id", "=", "bookings.id_buku")
                ->groupBy('bukus.id')
                ->get();
            $jurusans = Jurusan::where('id', '!=', '1')->get();
            $Mahasiswas_belum = Mahasiswa::with('Jurusan')
            ->where('status', '=', '0')
            ->get();
            return view('bukus.index', compact('bukus', 'jurusans', 'Mahasiswas_belum'))->with('i', (request()->input('page', 1) - 1) * 5);
        }
    }

    public function index_fakultas(Request $request)
    { {
            $id_jurusan = $request->user()->id_jurusan;
            $bukus = Buku::with('Jurusan')
            ->selectRaw('bukus.id, bukus.nama_buku, penulis,penerbit, harga, exemplar, id_jurusan, jumlah')
            ->where('id_jurusan','=', $id_jurusan)
            ->get();
            $jurusans = Jurusan::where('id', '!=', '1')->get();
            $Mahasiswas_belum = Mahasiswa::with('Jurusan')
            ->where('status', '=', '0')
            ->where('id_jurusan', '=',$id_jurusan)
            ->get();
            return view('bukus.index', compact('bukus', 'jurusans', 'Mahasiswas_belum'))->with('i', (request()->input('page', 1) - 1) * 5);
        }
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
        $tambah_buku = new Buku;
        $tambah_buku->nama_buku = $request->addnama_buku;
        $tambah_buku->penulis = $request->addpenulis;
        $tambah_buku->penerbit = $request->addpenerbit;
        $tambah_buku->harga = $request->addharga;
        $tambah_buku->exemplar = $request->addexemplar;
        $tambah_buku->jumlah = 0;
        $tambah_buku->id_jurusan = $request->addid_jurusan;
        $tambah_buku->save();
        
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
        //
        $bukus = Buku::with('Jurusan')
        ->selectRaw('bukus.id, bukus.nama_buku, penulis,penerbit, harga, exemplar, jumlah')
        ->leftJoin("bookings", "bukus.id", "=", "bookings.id_buku")
        ->where('bukus.id','=', $id)
        ->get();
        $jurusans = Jurusan::where('id', '!=', '1')->get();
        $Mahasiswas_belum = Mahasiswa::with('Jurusan')
        ->where('status', '=', '0')
        ->get();
        return view('bukus.create_beli1', compact('bukus', 'jurusans', 'Mahasiswas_belum'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
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
        $update_buku = Buku::find($id);
        $update_buku->nama_buku = $request->update_buku;
        $update_buku->penulis = $request->updatepenulis;
        $update_buku->penerbit = $request->updatepenerbit;
        $update_buku->harga = $request->updateharga;
        $update_buku->exemplar = $request->updateexemplar;
        $update_buku->id_jurusan = $request->updateid_jurusan;
        $update_buku->save();
        $id_jurusan = $request->user()->id_jurusan;
        if ($id_jurusan == 1) {
            # code...
            return redirect('/buku');
        } else {
            return redirect('/buku_fakultas');
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
        Buku::destroy($id);
        $id_jurusan = $request->user()->id_jurusan;
        if ($id_jurusan == 1) {
            # code...
            return redirect('/buku');
        } else {
            return redirect('/buku_fakultas');
        }
    }

    public function ExportExcel(Request $request)
    {
        Excel::import(new BukuImport, $request->file('nama_files')->store('temp'));
        return back();

        // alihkan halaman kembali
        //return redirect('/buku');
    }

}
