<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    public function index()
    {
        $barangs = Barang::all();
        return view('Barang', compact('barangs'));
    }

    public function create()
    {
        return view('barang.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_barang' => 'required|string|max:255',
            'stok' => 'required|integer',
            'harga' => 'required|numeric',
        ]);

        // Create a new Barang instance and save it to the database
        $barang = new Barang();
        $barang->nama_barang = $validatedData['nama_barang'];
        $barang->stokk = $validatedData['stok'];
        $barang->harga = $validatedData['harga'];
        $barang->save();

        return redirect()->route('barang.index')->with('success', 'Barang berhasil ditambahkan.');
    }
}
