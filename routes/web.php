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

// Route::get('dashboard', [KonsultasiController::class, 'dashboard'])->name('konsultasi.dashboard')->middleware('auth');
Route::get('/home', [HomeController::class, 'index'])->name('home.index')->middleware('auth');

// Route::get('/admin', function () {
//     return view('admin.layouts.main' ,[
//         'title'=> 'Home',
//     ]);
// })->middleware('auth','admin');

// LOGIN
// Route::resource('/login',LoginController::class);

// LOGIN WITH SESI
Route::resource('/daftar', SesiController::class);


// LOGIN With Breeze
Route::get('/login', [MasukController::class, 'index'])->middleware('guest');
Route::post('/login', [MasukController::class, 'login']); 
Route::post('/logout', [MasukController::class, 'logout']);
// HOME
Route::get('/home', [HomeController::class, 'index'])->middleware('auth');
// PENYAKIT
Route::resource('/admin/penyakit', PenyakitController::class)->middleware('auth');
// GEJALA
Route::resource('/admin/gejala', GejalaController::class)->middleware('auth');
// KONSULTASI
Route::resource('/admin/rule', RuleController::class)->middleware('auth');
// HASIL
Route::resource('/admin/hasil', ResultController::class)->middleware('auth');

// PDF 
Route::middleware(['auth'])->prefix('pdf')->name('pdf.')->group(function () {
    Route::get('/download', [PdfController::class, 'downloadPdf'])->name('downloadPdf');
    Route::get('/dataGejala', [PdfController::class, 'dataGejala'])->name('dataGejala');
    Route::get('/hasilKonsultasi', [PdfController::class, 'konsultasi'])->name('konsultasi');
    Route::get('/dataPenyakit', [PdfController::class, 'dataPenyakit'])->name('dataPenyakit');
});

// KONSULTASI
Route::middleware(['auth'])->name('konsultasi.')->group(function () {
    Route::get('konsultasi', [KonsultasiController::class, 'index'])->name('index');
    Route::post('konsultasi/diagnosa', [KonsultasiController::class, 'diagnosa'])->name('diagnosa');
    Route::post('konsultasi/store', [KonsultasiController::class, 'store'])->name('store');
    Route::get('/riwayatKonsultasi', [KonsultasiController::class, 'riwayatKonsultasi'])->name('riwayat');
    // Route::post('/printpdf', [KonsultasiController::class, 'printDiagnosaPDF'])->name('printDiagnosaPDF');
    Route::post('/konsultasi/print', [KonsultasiController::class, 'printDiagnosaPDF'])->name('printDiagnosaPDF');


    
});
