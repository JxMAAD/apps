<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\CalcController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/barang', [BarangController::class, 'index']);

Route::get('/calc', [CalcController::class, 'index']);
Route::post('/result', [CalcController::class, 'Result']);
