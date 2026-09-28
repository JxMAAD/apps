<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\KategoriBarang;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    public function index()
    {
        // 1. Eager load the relationship to optimize database queries
        $barangs = Barang::with('kategori_barangs')->get();

        // 2. Define $kategori so compact() doesn't throw an error
        $kategori = KategoriBarang::all();

        return view('Barang.index', compact('barangs', 'kategori'));
    }

    // CREATE: Form Tambah
    public function create()
    {
        // Ambil data kategori untuk ditampilkan di dropdown (select)
        $kategori = KategoriBarang::all();
        return view('Barang.create', compact('kategori'));
    }

    // CREATE: Simpan Data
    public function store(Request $request)
    {
        $request->validate([
            'nama_barang' => 'required|string|max:255',
            'stok' => 'required|integer',
            'harga' => 'required|numeric',
            'kategori_id' => 'required' // Validasi kategori
        ]);

        $barang = new Barang();
        $barang->nama_barang = $request->nama_barang;
        $barang->stok = $request->stok; // Typo 'stokk' sudah diperbaiki
        $barang->harga = $request->harga;
        $barang->kategori_id = $request->kategori_id; // Simpan ID Kategori
        $barang->save();

        return redirect('/barang')->with('success', 'Barang berhasil ditambahkan.');
    }

    // UPDATE: Form Edit
    public function edit($id)
    {
        $barang = Barang::findOrFail($id);
        $kategori = KategoriBarang::all(); // Untuk dropdown edit
        return view('Barang.edit', compact('barang', 'kategori'));
    }

    // UPDATE: Simpan Perubahan
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_barang' => 'required|string|max:255',
            'stok' => 'required|integer',
            'harga' => 'required|numeric',
            'kategori_id' => 'required'
        ]);

        $barang = Barang::findOrFail($id);
        $barang->nama_barang = $request->nama_barang;
        $barang->stok = $request->stok;
        $barang->harga = $request->harga;
        $barang->kategori_id = $request->kategori_id;
        $barang->save();

        return redirect('/barang')->with('success', 'Barang berhasil diperbarui.');
    }

    // DELETE: Hapus Data
    public function destroy($id)
    {
        $barang = Barang::findOrFail($id);
        $barang->delete();

        return redirect('/barang')->with('success', 'Barang berhasil dihapus.');
    }
}
