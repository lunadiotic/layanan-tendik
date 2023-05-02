<?php

use Illuminate\Support\Facades\Auth;
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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::group(['middleware' => ['role:admin', 'auth']], function () {
    Route::resource('layanan', App\Http\Controllers\LayananController::class)->except(['show']);;
    Route::resource('layanan.syarat', App\Http\Controllers\SyaratLayananController::class)->except(['show']);
    Route::resource('golongan', App\Http\Controllers\GolonganController::class)->except(['show']);
    Route::resource('satpen', App\Http\Controllers\SatpenController::class)->except(['show']);
    Route::resource('tendik', App\Http\Controllers\TendikController::class)->except(['show']);
});

Route::get('/pengajuan/{layanan}', [App\Http\Controllers\PengajuanController::class, 'index'])->name('pengajuan.index');
Route::get('/pengajuan/{layanan}/create', [App\Http\Controllers\PengajuanController::class, 'create'])->name('pengajuan.create');
Route::post('/pengajuan/{layanan}', [App\Http\Controllers\PengajuanController::class, 'store'])->name('pengajuan.store');

Route::get('daftar/pengajuan/{layanan}', [App\Http\Controllers\DaftarPengajuanController::class, 'index'])->name('daftar.pengajuan.index');
Route::get('daftar/pengajuan/{layanan}/proses/{pengajuan_id}', [App\Http\Controllers\DaftarPengajuanController::class, 'proses'])->name('daftar.pengajuan.proses');
Route::post('daftar/pengajuan/{layanan}/proses/{pengajuan_id}', [App\Http\Controllers\DaftarPengajuanController::class, 'storeProses'])->name('daftar.pengajuan.proses.store');