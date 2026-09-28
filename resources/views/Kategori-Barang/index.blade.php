@extends('layout')
@section('title', 'Kategori Barang')
@section('content')

<div class="flex justify-between items-center mb-6">
    <h1 class="text-3xl font-bold text-gray-700">Kategori Barang</h1>
    <a href="{{ url('/kategori-barang/create') }}" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded-lg shadow-md transition">
        + Tambah Kategori
    </a>
</div>

<!-- Class lg:w-2/3 mx-auto sudah dihapus di sini, tersisa w-full -->
<div class="bg-white rounded-lg shadow-md overflow-hidden w-full">
    <table class="w-full text-left border-collapse">
        <thead class="bg-gray-800 text-white">
            <tr>
                <th class="py-3 px-4 font-semibold text-sm w-16">No.</th>
                <th class="py-3 px-4 font-semibold text-sm">Nama Kategori</th>
                <th class="py-3 px-4 font-semibold text-sm text-center w-48">Aksi</th>
            </tr>
        </thead>
        <tbody class="text-gray-700">
            @foreach ($kategori as $item)
            <tr class="hover:bg-gray-50 border-b border-gray-200 transition">
                <td class="py-3 px-4">{{ $loop->iteration }}</td>
                <td class="py-3 px-4 font-medium">{{ $item->nama_kategori }}</td>
                <td class="py-3 px-4 text-center">
                    <a href="{{ url('/kategori-barang/'.$item->id.'/edit') }}" class="bg-yellow-400 hover:bg-yellow-500 text-white px-3 py-1 rounded shadow-sm text-sm transition">Edit</a>
                    <form action="{{ url('/kategori-barang/'.$item->id) }}" method="POST" class="inline-block">
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
