@extends('layout')
@section('title', 'Tambah Barang')
@section('content')

<div class="max-w-2xl mx-auto bg-white p-8 rounded-lg shadow-md">
    <h1 class="text-2xl font-bold text-gray-700 mb-6">Tambah Barang Baru</h1>

    <form action="{{ url('/barang') }}" method="POST" class="space-y-4">
        @csrf
        <div>
            <label class="block text-gray-600 font-semibold mb-2">Nama Barang</label>
            <input type="text" name="nama_barang" required class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 transition">
        </div>
        <div>
            <label class="block text-gray-600 font-semibold mb-2">Stok</label>
            <input type="number" name="stok" required class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 transition">
        </div>
        <div>
            <label class="block text-gray-600 font-semibold mb-2">Harga (Rp)</label>
            <input type="number" name="harga" required class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 transition">
        </div>
        <div>
            <label class="block text-gray-600 font-semibold mb-2">Kategori</label>
            <select name="kategori_id" required class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 bg-white transition">
                <option value="">-- Pilih Kategori --</option>
                @foreach ($kategori as $kat)
                    <option value="{{ $kat->id }}">{{ $kat->nama_kategori }}</option>
                @endforeach
            </select>
        </div>
        <div class="pt-4 flex gap-4">
            <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-6 py-2 rounded-lg font-semibold shadow-md transition">Simpan Data</button>
            <a href="{{ url('/barang') }}" class="bg-gray-400 hover:bg-gray-500 text-white px-6 py-2 rounded-lg font-semibold shadow-md transition">Batal</a>
        </div>
    </form>
</div>
@endsection
