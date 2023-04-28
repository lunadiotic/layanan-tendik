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
Route::resource('layanan', App\Http\Controllers\LayananController::class)->except(['show'])->middleware('auth');
Route::resource('layanan.syarat', App\Http\Controllers\SyaratLayananController::class)->except(['show'])->middleware('auth');
Route::resource('golongan', App\Http\Controllers\GolonganController::class)->except(['show'])->middleware('auth');
Route::resource('satpen', App\Http\Controllers\SatpenController::class)->except(['show'])->middleware('auth');
Route::resource('tendik', App\Http\Controllers\TendikController::class)->except(['show'])->middleware('auth');

Route::get('/pengajuan/{layanan}', [App\Http\Controllers\PengajuanController::class, 'index'])->name('pengajuan.index');
Route::get('/pengajuan/{layanan}/create', [App\Http\Controllers\PengajuanController::class, 'create'])->name('pengajuan.create');
Route::post('/pengajuan/{layanan}', [App\Http\Controllers\PengajuanController::class, 'store'])->name('pengajuan.store');
