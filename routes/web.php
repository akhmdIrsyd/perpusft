<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BukuControllers;
use App\Http\Controllers\MahasiswaControllers;
use App\Http\Controllers\ProsesControllers;
use App\Http\Controllers\ProsesFakultasControllers;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\DepanHomeControllers;
use App\Http\Controllers\DashboardControllers;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::resource('buku', BukuControllers::class)->middleware('auth');
Route::get('buku_fakultas', [BukuControllers::class, 'index_fakultas'])->middleware('auth');
//Route::resource('proses_fakultas', ProsesFakultasControllers::class)->middleware('auth');
Route::get('sumbang/{id}', [ProsesFakultasControllers::class, 'show']);
Route::post('sumbang', [ProsesFakultasControllers::class, 'store']);
Route::put('sumbang', [ProsesFakultasControllers::class, 'update']);
Route::resource('mahasiswa', MahasiswaControllers::class)->middleware('auth');
Route::post('mahasiswa_depan', [MahasiswaControllers::class, 'store_depan']);
Route::get('mahasiswa_fakultas', [MahasiswaControllers::class, 'index_fakultas'])->middleware('auth');
Route::resource('proses', ProsesControllers::class)->middleware('auth');
Route::get('proses_fakultas', [ProsesControllers::class, 'index_fakultas'])->middleware('auth');
Route::delete('proses_delete/{id}/{buku}', [ProsesControllers::class, 'destroy'])->name('proses_delete')->middleware('auth');
Route::get('proses_update/{id}', [ProsesControllers::class, 'showupdate'])->name('proses_update');
Route::resource('dashboard', DashboardControllers::class)->middleware('auth');
Route::resource('/', DepanHomeControllers::class);
Route::get('list_buku', [DepanHomeControllers::class, 'buku']);
Route::get('login', [LoginController::class, 'login'])->name('login');
Route::post('loginaksi', [LoginController::class, 'loginaksi']);
Route::get('logoutaksi', [LoginController::class, 'logoutaksi'])->middleware('auth');
Route::get('kirim-email', [MailController::class, 'index']);
Route::get('surat/{id}', [MailController::class, 'surat']);
Route::post('ExportExcel', [BukuControllers::class, 'ExportExcel']);