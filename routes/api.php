<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/select/satpen', [\App\Http\Controllers\Api\SelectController::class, 'selectSatpen'])->name('api.select2.satpen');
Route::get('/select/golongan', [\App\Http\Controllers\Api\SelectController::class, 'selectGolongan'])->name('api.select.golongan');