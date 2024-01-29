<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DokterController;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\PenyakitController;
use App\Http\Controllers\PoliController;
use App\Http\Controllers\RekamMedikController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
 */

Route::get('/', function () {
    return view('welcome');
});

Route::redirect('/', '/login');

Route::get('/login', [AuthController::class, 'login']);

Route::get('/admin', [DashboardController::class, 'dashboard']);

//pasien
Route::resource('pasien', PasienController::class);

//dokter
Route::resource('dokter', DokterController::class);

//poli
Route::resource('poli', PoliController::class);
//penyakit
Route::resource('penyakit', PenyakitController::class);

Route::resource('rekam-medik', RekamMedikController::class);

// routes/web.php
Route::get('/get-penyakit/{poliId}', [RekamMedikController::class, 'getPenyakit']);

Route::get('/get-daftar-pasien', [RekamMedikController::class, 'getDaftarPasien']);
Route::get('/cari-pasien', [RekamMedikController::class, 'cariPasien']);
