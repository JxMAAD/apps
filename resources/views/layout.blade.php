<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'CMS Gudang')</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans antialiased text-gray-800">

    <!-- Wrapper untuk Sidebar + Konten -->
    <div class="flex h-screen overflow-hidden">

        <!-- Sidebar Kiri -->
        <aside class="w-64 bg-gray-900 text-white flex flex-col shadow-xl">
            <!-- Logo / Judul CMS -->
            <div class="h-16 flex items-center justify-center border-b border-gray-800 mt-2">
                <h2 class="text-2xl font-bold text-blue-400">📦 MyGudang</h2>
            </div>

            <!-- Menu Navigasi Sidebar -->
            <nav class="flex-1 px-4 py-6 space-y-3 overflow-y-auto">
                <p class="text-xs font-semibold text-gray-500 uppercase tracking-wider mb-2">Menu Utama</p>

                <!-- Menu Barang -->
                <a href="{{ url('/barang') }}" class="flex items-center gap-3 px-4 py-3 bg-gray-800 text-gray-100 rounded-lg hover:bg-blue-600 transition border border-gray-700 hover:border-blue-500 shadow-sm">
                    <span class="text-xl">📦</span>
                    <span class="font-medium">Data Barang</span>
                </a>

                <!-- Menu Kategori -->
                <a href="{{ url('/kategori-barang') }}" class="flex items-center gap-3 px-4 py-3 bg-gray-800 text-gray-100 rounded-lg hover:bg-blue-600 transition border border-gray-700 hover:border-blue-500 shadow-sm">
                    <span class="text-xl">🏷️</span>
                    <span class="font-medium">Kategori Barang</span>
                </a>
            </nav>

            <!-- Footer Sidebar -->
            <div class="p-4 border-t border-gray-800 text-sm text-center text-gray-500">
                &copy; {{ date('Y') }} Admin Panel
            </div>
        </aside>

        <!-- Area Konten Utama (Sebelah Kanan) -->
        <div class="flex-1 flex flex-col w-full relative">

            <!-- Topbar (Header Atas) -->
            <header class="h-16 bg-white shadow-sm flex items-center justify-between px-8 border-b border-gray-200 z-10">
                <!-- Judul Halaman Otomatis Berubah -->
                <h1 class="text-xl font-bold text-gray-700">@yield('title', 'Dashboard')</h1>

                <!-- Profil Admin Semu -->
                <div class="flex items-center gap-4 cursor-pointer hover:bg-gray-50 p-2 rounded-lg transition">
                    <div class="text-right">
                        <p class="text-sm font-semibold text-gray-700">Admin Ganteng</p>
                        <p class="text-xs text-gray-500">Administrator</p>
                    </div>
                    <div class="w-10 h-10 rounded-full bg-blue-500 text-white flex items-center justify-center font-bold shadow-md">
                        AG
                    </div>
                </div>
            </header>

            <!-- Area Konten yang Bisa Di-scroll -->
            <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-50 p-8">

                <!-- Alert Pesan Sukses -->
                @if(session('success'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg mb-6 shadow-sm flex items-center gap-2">
                        <span>✅</span>
                        <div>
                            <strong>Berhasil!</strong> {{ session('success') }}
                        </div>
                    </div>
                @endif

                <!-- Di sinilah tabel dan form kamu akan muncul -->
                @yield('content')

            </main>
        </div>

    </div>

</body>
</html>
