<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BarangController;
// use App\Http\Controllers\CalcController;
use App\Http\Controllers\KategoriBarangController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/barang', [BarangController::class, 'index']);
// Tambah data (Create)
Route::get('/barang/create', [BarangController::class, 'create']);
Route::post('/barang', [BarangController::class, 'store']); // Saya rapikan dari /barangs jadi /barang

// Edit data (Update)
Route::get('/barang/{id}/edit', [BarangController::class, 'edit']);
Route::put('/barang/{id}', [BarangController::class, 'update']);

// Hapus data (Delete)
Route::delete('/barang/{id}', [BarangController::class, 'destroy']);

Route::get('/kategori-barang', [KategoriBarangController::class, 'index']);
// Tambah data (Create)
Route::get('/kategori-barang/create', [KategoriBarangController::class, 'create']);
Route::post('/kategori-barang', [KategoriBarangController::class, 'store']);
// Edit data (Update)
Route::get('/kategori-barang/{id}/edit', [KategoriBarangController::class, 'edit']);
Route::put('/kategori-barang/{id}', [KategoriBarangController::class, 'update']);
// Hapus data (Delete)
Route::delete('/kategori-barang/{id}', [KategoriBarangController::class, 'destroy']);

// Route::get('/calc', [CalcController::class, 'index']);
// Route::post('/result', [CalcController::class, 'Result']);
