@extends('layouts.app')

@section('content')
<div class="bg-gradient-to-br from-blue-50 via-white to-blue-100 py-12 px-4">
    <div class="max-w-6xl mx-auto text-center">
        <h1 class="text-4xl md:text-5xl font-extrabold text-blue-800 mb-6 drop-shadow-lg">📚 Selamat Datang di Sistem Informasi Perpustakaan</h1>
        <p class="text-gray-600 text-lg md:text-xl mb-10">Kelola data pegawai, buku, transaksi, dan cetak laporan dengan mudah dan cepat. Akses data kapan saja!</p>

        <!-- Grid untuk Card -->
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8 mt-10">

            <!-- Card Pegawai -->
            <a href="#" class="bg-white border border-blue-200 hover:border-blue-400 hover:shadow-2xl transition duration-300 rounded-xl p-6 group transform hover:scale-105 cursor-default">
                <div class="text-blue-600 text-5xl mb-2 group-hover:text-blue-700 transition-transform">👩‍💼</div>
                <h2 class="text-2xl font-semibold text-blue-800">Data Anggota</h2>
                <p class="text-sm text-gray-500 mt-2">Kelola informasi Anggota perpustakaan dengan mudah.</p>
            </a>

            <!-- Card Buku -->
            <a href="#" class="bg-white border border-green-200 hover:border-green-400 hover:shadow-2xl transition duration-300 rounded-xl p-6 group transform hover:scale-105 cursor-default">
                <div class="text-green-600 text-5xl mb-2 group-hover:text-green-700 transition-transform">📚</div>
                <h2 class="text-2xl font-semibold text-green-800">Data Buku</h2>
                <p class="text-sm text-gray-500 mt-2">Manajemen koleksi buku di perpustakaan.</p>
            </a>

            <!-- Card Transaksi -->
            <a href="#" class="bg-white border border-purple-200 hover:border-purple-400 hover:shadow-2xl transition duration-300 rounded-xl p-6 group transform hover:scale-105 cursor-default">
                <div class="text-purple-600 text-5xl mb-2 group-hover:text-purple-700 transition-transform">🔁</div>
                <h2 class="text-2xl font-semibold text-purple-800">Transaksi</h2>
                <p class="text-sm text-gray-500 mt-2">Kelola peminjaman dan pengembalian buku.</p>
            </a>

        </div>
    </div>
</div>
@endsection
