<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Barang;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    // READ: Tampilkan semua data
    public function index()
    {
        $barangs = Barang::with('kategori_barangs')->get();

        try {
            return response()->json([
                'success' => true,
                'message' => 'Daftar semua barang',
                'data'    => $barangs
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan: ' . $e->getMessage()
            ], 500);
        }
    }

    // CREATE: Simpan Data
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama_barang' => 'required|string|max:255',
            'stok'        => 'required|integer',
            'harga'       => 'required|numeric',
            // Pastikan kategori_id benar-benar ada di tabel kategori_barangs
            'kategori_id' => 'required|exists:kategori_barangs,id'
        ]);

        if ($request->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validasi gagal.',
                'errors'  => $request->errors()
            ], 422);
        }

        // Simpan ke database
        $barang = Barang::create([
            'nama_barang' => $request->nama_barang,
            'stok'        => $request->stok,
            'harga'       => $request->harga,
            'kategori_id' => $request->kategori_id,
        ]);

        try {
            return response()->json([
                'success' => true,
                'message' => 'Barang berhasil ditambahkan.',
                'data'    => $barang
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan: ' . $e->getMessage()
            ], 500);
        }
    }

    // READ: Tampilkan satu data (Detail)
    public function show($id)
    {
        $barang = Barang::with('kategori_barangs')->find($id);

        if (!$barang) {
            return response()->json([
                'success' => false,
                'message' => 'Barang tidak ditemukan.'
            ], 404);
        }

        try {
            return response()->json([
                'success' => true,
                'message' => 'Detail data barang',
                'data'    => $barang
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan: ' . $e->getMessage()
            ], 500);
        }
    }

    // UPDATE: Simpan Perubahan
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_barang' => 'required|string|max:255',
            'stok'        => 'required|integer',
            'harga'       => 'required|numeric',
            'kategori_id' => 'required|exists:kategori_barangs,id'
        ]);

        if ($request->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validasi gagal.',
                'errors'  => $request->errors()
            ], 422);
        }

        $barang = Barang::find($id);

        if (!$barang) {
            return response()->json([
                'success' => false,
                'message' => 'Barang tidak ditemukan.'
            ], 404);
        }

        $barang->update([
            'nama_barang' => $request->nama_barang,
            'stok'        => $request->stok,
            'harga'       => $request->harga,
            'kategori_id' => $request->kategori_id,
        ]);

        try {
            return response()->json([
                'success' => true,
                'message' => 'Barang berhasil diperbarui.',
                'data'    => $barang
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan: ' . $e->getMessage()
            ], 500);
        }
    }

    // DELETE: Hapus Data
    public function destroy($id)
    {
        $barang = Barang::find($id);

        if (!$barang) {
            return response()->json([
                'success' => false,
                'message' => 'Barang tidak ditemukan.'
            ], 404);
        }

        $barang->delete();

        try {
            return response()->json([
                'success' => true,
                'message' => 'Barang berhasil dihapus.'
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan: ' . $e->getMessage()
            ], 500);
        }
    }
}
