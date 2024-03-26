<?php

use App\Http\Controllers\RuleController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MasukController;
use App\Http\Controllers\GejalaController;
use App\Http\Controllers\PasienController;
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
Route::get('/login', [MasukController::class, 'index'])->middleware('guest');
Route::post('/login', [MasukController::class, 'authenticate']);
// LOG OUT
Route::post('/logout', [MasukController::class, 'logout']);

Route::resource('/register', RegisterController::class);

// home
Route::get('/home', [HomeController::class, 'index'])->middleware('auth');

// penyakit
Route::resource('/admin/penyakit', PenyakitController::class)->middleware('auth');

// gejala
Route::resource('/admin/gejala', GejalaController::class)->middleware('auth');

// konsultasi
Route::resource('/admin/rule', RuleController::class);


// konsultasi
Route::resource('/konsultasi', KonsultasiController::class);