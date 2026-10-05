<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\KategoriBarang;
use Illuminate\Http\Request;

class KategoriBarangController extends Controller
{
    // READ: Menampilkan semua data
    public function index()
    {
        try {
            $kategori = KategoriBarang::all();

            // Cek apakah data kosong
            if ($kategori->isEmpty()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Data kategori masih kosong.',
                    'data'    => []
                ], 404);
            }

            return response()->json([
                'success' => true,
                'message' => 'Daftar data kategori',
                'data'    => $kategori
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan pada server saat mengambil data.',
                'error'   => $e->getMessage()
            ], 500);
        }
    }

    // CREATE: Menyimpan data ke database
    public function store(Request $request)
    {
        try {
            // Validasi
            $request->validate([
                'nama_kategori' => 'required|string|max:255'
            ]);

            // Simpan Data
            $kategori = KategoriBarang::create([
                'nama_kategori' => $request->nama_kategori
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Kategori berhasil ditambahkan!',
                'data'    => $kategori
            ], 201); // 201 status code untuk Created

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal menyimpan data kategori.',
                'error'   => $e->getMessage()
            ], 500);
        }
    }

    // READ: Menampilkan satu data spesifik
    public function show($id)
    {
        try {
            $kategori = KategoriBarang::find($id);

            // Cek jika kategori tidak ditemukan
            if (!$kategori) {
                return response()->json([
                    'success' => false,
                    'message' => 'Kategori tidak ditemukan.'
                ], 404);
            }

            return response()->json([
                'success' => true,
                'message' => 'Detail data kategori',
                'data'    => $kategori
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan pada server.',
                'error'   => $e->getMessage()
            ], 500);
        }
    }

    // UPDATE: Menyimpan perubahan ke database
    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'nama_kategori' => 'required|string|max:255'
            ]);

            $kategori = KategoriBarang::find($id);

            if (!$kategori) {
                return response()->json([
                    'success' => false,
                    'message' => 'Kategori tidak ditemukan untuk diperbarui.'
                ], 404);
            }

            $kategori->update([
                'nama_kategori' => $request->nama_kategori
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Kategori berhasil diperbarui!',
                'data'    => $kategori
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal memperbarui data kategori.',
                'error'   => $e->getMessage()
            ], 500);
        }
    }

    // DELETE: Menghapus data
    public function destroy($id)
    {
        try {
            $kategori = KategoriBarang::find($id);

            if (!$kategori) {
                return response()->json([
                    'success' => false,
                    'message' => 'Kategori tidak ditemukan untuk dihapus.'
                ], 404);
            }

            $kategori->delete();

            return response()->json([
                'success' => true,
                'message' => 'Kategori berhasil dihapus!'
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal menghapus data kategori (mungkin data ini masih dipakai di tabel barang).',
                'error'   => $e->getMessage()
            ], 500);
        }
    }
}
