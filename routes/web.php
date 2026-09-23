<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\CalcController;
use App\Http\Controllers\KategoriBarangController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/barang', [BarangController::class, 'index']);
Route::get('/barang/create', [BarangController::class, 'create']);
Route::post('/barangs', [BarangController::class, 'store']);

Route::get('/kategori-barang', [KategoriBarangController::class, 'index']);

Route::get('/calc', [CalcController::class, 'index']);
Route::post('/result', [CalcController::class, 'Result']);
