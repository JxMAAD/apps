@extends('layout')
@section('title', 'Edit Kategori')
@section('content')

<div class="max-w-xl mx-auto bg-white p-8 rounded-lg shadow-md">
    <h1 class="text-2xl font-bold text-gray-700 mb-6">Edit Kategori</h1>

    <form action="{{ url('/kategori-barang/'.$kategori->id) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')
        <div>
            <label class="block text-gray-600 font-semibold mb-2">Nama Kategori</label>
            <input type="text" name="nama_kategori" value="{{ $kategori->nama_kategori }}" required class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 transition">
        </div>
        <div class="pt-4 flex gap-4">
            <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-6 py-2 rounded-lg font-semibold shadow-md transition">Update</button>
            <a href="{{ url('/kategori-barang') }}" class="bg-gray-400 hover:bg-gray-500 text-white px-6 py-2 rounded-lg font-semibold shadow-md transition">Batal</a>
        </div>
    </form>
</div>
@endsection
