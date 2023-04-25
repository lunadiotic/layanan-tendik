<?php

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
Route::resource('layanan', App\Http\Controllers\LayananController::class)->middleware('auth');
Route::resource('layanan.syarat', App\Http\Controllers\SyaratLayananController::class)->middleware('auth');
Route::resource('golongan', App\Http\Controllers\GolonganController::class)->middleware('auth');
Route::resource('satpen', App\Http\Controllers\SatpenController::class)->middleware('auth');