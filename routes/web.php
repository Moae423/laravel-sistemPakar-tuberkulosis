<?php

use Dompdf\Dompdf;
use App\Http\Controllers\Diagnose;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RuleController;
use App\Http\Controllers\SesiController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MasukController;
use App\Http\Controllers\GejalaController;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\ResultController;
use App\Http\Controllers\PenyakitController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\KonsultasiController;

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
    return view('welcome' ,[

        'title'=> 'Home',
    ]);
});
Route::get('/admin', function () {
    return view('admin.layouts.main' ,[

        'title'=> 'Home',
    ]);
})->middleware('auth','admin');

// LOGIN
// Route::resource('/login',LoginController::class);

// LOGIN WITH SESI
Route::resource('/daftar', SesiController::class);


// LOGIN With Breeze
Route::get('/login', [MasukController::class, 'index'])->middleware('guest');
Route::post('/login', [MasukController::class, 'login']); 
Route::post('/logout', [MasukController::class, 'logout']);
// LOG OUT
// Route::resource('/register', RegisterController::class);
// home
Route::get('/home', [HomeController::class, 'index'])->middleware('auth');
// penyakit
Route::resource('/admin/penyakit', PenyakitController::class)->middleware('auth');
// gejala
Route::resource('/admin/gejala', GejalaController::class)->middleware('auth');
// konsultasi
Route::resource('/admin/rule', RuleController::class)->middleware('auth');
// konsultasiA
// Route::resource('/konsultasi', KonsultasiController::class)->middleware('auth');
// hasil
Route::resource('/admin/hasil', ResultController::class)->middleware('auth');

// Route::resource('/riwayat', ResultController::class)->middleware('auth');

Route::get('/download', [PdfController::class, 'downloadPdf'])->name('pdf.downloadPdf')->middleware('auth');
Route::get('/dataGejala', [PdfController::class, 'dataGejala'])->name('pdf.dataGejala')->middleware('auth');
// diagnose
Route::get('konsultasi', [KonsultasiController::class, 'index'])->name('konsultasi.index')->middleware('auth');
Route::post('konsultasi/diagnosa', [KonsultasiController::class, 'diagnosa'])->name('konsultasi.diagnosa')->middleware('auth');
// Rute untuk menyimpan hasil konsultasi dengan metode POST
Route::post('konsultasi/store', [KonsultasiController::class, 'store'])->name('konsultasi.store')->middleware('auth');
Route::get('/riwayatKonsultasi', [KonsultasiController::class, 'riwayatKonsultasi'])->name('konsultasi.riwayat');

// pdf
// Route::get('/download', [KonsultasiController::class, 'downloadPdf'])->name('konsutlasi.downloadPdf');
// Route::get('/download', [ResultController::class, 'downloadPdf'])->name('result.downloadPdf');