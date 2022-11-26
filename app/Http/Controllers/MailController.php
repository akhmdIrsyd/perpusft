<?php

namespace App\Mail;
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use \app\Mail\MyTestMail;
use App\Models\Jurusan;
use App\Models\Mahasiswa;
use App\Models\Booking;
use Carbon\Carbon;
use Mockery\Generator\StringManipulation\Pass\Pass;

class MailController extends Controller
{
    public function index()
    {

        $details = [
            'title' => 'Mail from websitepercobaan.com',
            'body' => 'This is for testing email using smtp',
            'kode' => 'This is for testing email using smtp'
        ];
        $answers = [
            'nama_mhs' => 'This is for testing email using smtp',
            'nim' => 'This is for testing email using smtp',
            'id_jurusan' => 'This is for testing email using smtp',
            'email' => 'This is for testing email using smtp',
            'status' => 'This is for testing email using smtp',
        ];

        Mail::to('akhmadirsyad@ft.unmul.ac.id')->send(new \App\Mail\MyTestMail( $answers, $details,));

        return("Email sudah terkirim.");
    }

    public function surat(Request $request, $id)
    {
        $date =Carbon::now()->locale('id')->isoFormat('LL'); 
        //$formatedDate = Carbon::now()->locale('id')->isoFormat('LL'); ;
        
            //code...
            $Bookings = Booking::with('Buku', 'Mahasiswa')
            ->selectRaw('bukus.id, bukus.nama_buku, bukus.penulis, bukus.penerbit, mahasiswas.nama_mhs, mahasiswas.nim, jurusans.nama_jurusan, bookings.status')
            ->Join('bukus', 'bukus.id', '=', 'bookings.id_buku')
            ->Join('mahasiswas', 'mahasiswas.nim', '=', 'bookings.NIM_mhs')
            ->Join('jurusans', 'mahasiswas.id_jurusan', '=', 'jurusans.id')
            ->where('kode_beli', '=', $id)
            ->where('bookings.status', '=', 3)
            ->get();
        
        
        
        return view('emails.surat', compact('Bookings', 'date'));
    }
}
