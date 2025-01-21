<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KabkotaController;
use App\Http\Controllers\ProvinsiController;
use App\Http\Controllers\TentangKamiController;
use App\Http\Controllers\PetaController;
use App\Http\Controllers\IndustriController;
use App\Http\Controllers\BencanaController;

Route::get('/', function () {
    return view('welcome');

});
Route::get('/provinsi', [ProvinsiController::class, 'index'])->name('provinsi');
Route::get('/kabkota', [KabkotaController::class, 'index'])->name('kabkota');
Route::get('/tentang', [TentangKamiController::class, 'index'])->name('tentang');

Route::get('/api/provinsi', [ProvinsiController::class, 'getData']);
Route::get('/api/kabkota', [KabkotaController::class, 'getData']);
Route::get('/populasi', [PetaController::class, 'index']);
Route::get('/industri', [IndustriController::class, 'index']);
Route::get('/bencana', [BencanaController::class, 'index']);


