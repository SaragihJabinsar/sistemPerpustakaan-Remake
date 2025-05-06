@extends('layouts.app')

@section('content')
<div class="w-full max-w-xl mx-auto bg-white p-8 rounded-2xl shadow-lg animate__animated animate__fadeIn">
    <h2 class="text-2xl font-bold text-green-600 mb-6 text-center">Tambah Data Transaksi</h2>

    <form action="{{ route('transaksi.store') }}" method="POST" class="space-y-5">
        @csrf

        <div>
            <label class="block text-sm font-semibold mb-1">ID Transaksi</label>
            <input type="text" name="idTransaksi" value="{{ $newID }}" readonly
                class="w-full bg-gray-100 border border-gray-300 px-4 py-2 rounded text-gray-500 focus:outline-none">
        </div>

        <div>
            <label class="block text-sm font-semibold mb-1">Nama Anggota</label>
            <select name="idAnggota" class="w-full border border-gray-300 px-4 py-2 rounded focus:outline-none focus:ring-2 focus:ring-green-400" required>
                <option value="" disabled selected>-- Pilih Anggota --</option>
                @foreach ($anggota as $a)
                    <option value="{{ $a->idAnggota }}">{{ $a->nama }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label class="block text-sm font-semibold mb-1">Judul Buku</label>
            <select name="idBuku" class="w-full border border-gray-300 px-4 py-2 rounded focus:outline-none focus:ring-2 focus:ring-green-400" required>
                <option value="" disabled selected>-- Pilih Buku --</option>
                @foreach ($buku as $b)
                    <option value="{{ $b->idBuku }}">{{ $b->judulBuku }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label class="block text-sm font-semibold mb-1">Tanggal Peminjaman</label>
            <input type="date" name="tanggalPeminjaman" class="w-full border border-gray-300 px-4 py-2 rounded focus:outline-none focus:ring-2 focus:ring-green-400" required>
        </div>

        <div>
            <label class="block text-sm font-semibold mb-1">Tanggal Kembali</label>
            <input type="date" name="tanggalKembali" class="w-full border border-gray-300 px-4 py-2 rounded focus:outline-none focus:ring-2 focus:ring-green-400" required>
        </div>

        <div class="flex justify-between items-center pt-4">
            <a href="{{ route('transaksi.index') }}" class="text-sm text-gray-500 hover:text-green-600 transition">← Kembali</a>
            <button type="submit" class="bg-green-500 text-white font-semibold px-5 py-2 rounded hover:bg-green-600 transition">Simpan</button>
        </div>
    </form>
</div>
@endsection
