<?php

namespace App\Http\Controllers;

use App\Models\Kategori_Barang;
use Illuminate\Http\Request;

class KategoriBarangController extends Controller
{
    public function index()
    {
        $kategori = Kategori_Barang::all();
        return view('Kategori_Barang', compact('kategori'));
    }
}
