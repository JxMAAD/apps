<?php

use App\Http\Controllers\Api\BarangController;
use App\Http\Controllers\Api\KategoriBarangController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::get('/barang', [BarangController::class, 'index']);
// Tambah data (Create)
Route::post('/barang', [BarangController::class, 'store']); // Saya rapikan dari /barangs jadi /barang

Route::get('/barang/{id}', [BarangController::class, 'show']);
// Edit data (Update)
Route::put('/barang/{id}', [BarangController::class, 'update']);

// Hapus data (Delete)
Route::delete('/barang/{id}', [BarangController::class, 'destroy']);

Route::get('/kategori-barang', [KategoriBarangController::class, 'index']);
// Tambah data (Create)
Route::post('/kategori-barang', [KategoriBarangController::class, 'store']);

Route::get('/kategori-barang/{id}', [KategoriBarangController::class, 'show']);
// Edit data (Update)
Route::put('/kategori-barang/{id}', [KategoriBarangController::class, 'update']);
// Hapus data (Delete)
Route::delete('/kategori-barang/{id}', [KategoriBarangController::class, 'destroy']);
