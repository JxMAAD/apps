<?php

namespace App\Http\Controllers;

use App\Models\KategoriBarang;
use Illuminate\Http\Request;

class KategoriBarangController extends Controller
{
    public function index()
    {
        $kategori = KategoriBarang::all();
        return view('Kategori-Barang.index', compact('kategori'));
    }

    // CREATE: Menampilkan form tambah
    public function create()
    {
        return view('Kategori-Barang.create');
    }

    // CREATE: Menyimpan data ke database
    public function store(Request $request)
    {
        $request->validate([
            'nama_kategori' => 'required|string|max:255'
        ]);

        KategoriBarang::create([
            'nama_kategori' => $request->nama_kategori
        ]);

        return redirect('/kategori-barang')->with('success', 'Kategori berhasil ditambahkan!');
    }

    // UPDATE: Menampilkan form edit
    public function edit($id)
    {
        $kategori = KategoriBarang::findOrFail($id);
        return view('Kategori-Barang.edit', compact('kategori'));
    }

    // UPDATE: Menyimpan perubahan ke database
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_kategori' => 'required|string|max:255'
        ]);

        $kategori = KategoriBarang::findOrFail($id);
        $kategori->update([
            'nama_kategori' => $request->nama_kategori
        ]);

        return redirect('/kategori-barang')->with('success', 'Kategori berhasil diperbarui!');
    }

    // DELETE: Menghapus data
    public function destroy($id)
    {
        $kategori = KategoriBarang::findOrFail($id);
        $kategori->delete();

        return redirect('/kategori-barang')->with('success', 'Kategori berhasil dihapus!');
    }
}
