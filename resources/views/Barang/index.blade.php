@extends('layout')
@section('title', 'Data Barang')
@section('content')

<div class="flex justify-between items-center mb-6">
    <h1 class="text-3xl font-bold text-gray-700">Daftar Barang</h1>
    <a href="{{ url('/barang/create') }}" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded-lg shadow-md transition">
        + Tambah Barang
    </a>
</div>

<div class="bg-white rounded-lg shadow-md overflow-hidden">
    <table class="w-full text-left border-collapse">
        <thead class="bg-gray-800 text-white">
            <tr>
                <th class="py-3 px-4 font-semibold text-sm">No.</th>
                <th class="py-3 px-4 font-semibold text-sm">Nama Barang</th>
                <th class="py-3 px-4 font-semibold text-sm">Stok</th>
                <th class="py-3 px-4 font-semibold text-sm">Harga</th>
                <th class="py-3 px-4 font-semibold text-sm">Kategori</th>
                <th class="py-3 px-4 font-semibold text-sm text-center">Aksi</th>
            </tr>
        </thead>
        <tbody class="text-gray-700">
            @foreach ($barangs as $barang)
            <tr class="hover:bg-gray-50 border-b border-gray-200 transition">
                <td class="py-3 px-4">{{ $loop->iteration }}</td>
                <td class="py-3 px-4 font-medium">{{ $barang->nama_barang }}</td>
                <td class="py-3 px-4">
                    <span class="bg-blue-100 text-blue-800 text-xs font-semibold px-2 py-1 rounded">{{ $barang->stok }} pcs</span>
                </td>
                <td class="py-3 px-4">Rp {{ number_format($barang->harga, 0, ',', '.') }}</td>
                <td class="py-3 px-4">{{ $barang->kategori_barangs?->nama_kategori }}</td>
                <td class="py-3 px-4 text-center">
                    <a href="{{ url('/barang/'.$barang->id.'/edit') }}" class="bg-yellow-400 hover:bg-yellow-500 text-white px-3 py-1 rounded shadow-sm text-sm transition">Edit</a>
                    <form action="{{ url('/barang/'.$barang->id) }}" method="POST" class="inline-block">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Yakin ingin menghapus?')" class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded shadow-sm text-sm transition">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
