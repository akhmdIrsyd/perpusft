<?php

namespace App\Mail;
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use \app\Mail\MyTestMail;
class MailController extends Controller
{
    public function index()
    {

        $details = [
            'title' => 'Mail from websitepercobaan.com',
            'body' => 'This is for testing email using smtp',
            'kode' => 'This is for testing email using smtp'
        ];

        Mail::to('akhmadirsyad@ft.unmul.ac.id')->send(new \App\Mail\MyTestMail($details));

        return("Email sudah terkirim.");
    }
}
