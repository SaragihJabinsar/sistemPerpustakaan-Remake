@extends('layouts.app')

@section('content')
<div class="w-full max-w-xl mx-auto bg-white p-8 rounded-2xl shadow-lg animate__animated animate__fadeIn">
    <h2 class="text-2xl font-bold text-yellow-600 mb-6 text-center">Edit Data Transaksi</h2>

    <form action="{{ route('transaksi.update', $transaksi->idTransaksi) }}" method="POST" class="space-y-5">
        @csrf
        @method('PUT')

        <div>
            <label class="block text-sm font-semibold mb-1">ID Transaksi</label>
            <input type="text" value="{{ $transaksi->idTransaksi }}" readonly
                   class="w-full bg-gray-100 border border-gray-300 px-4 py-2 rounded text-gray-500 focus:outline-none">
        </div>

        <div>
            <label class="block text-sm font-semibold mb-1">Nama Anggota</label>
            <select name="idAnggota" class="w-full border border-gray-300 px-4 py-2 rounded focus:outline-none focus:ring-2 focus:ring-yellow-400" required>
                <option value="" disabled>-- Pilih Anggota --</option>
                @foreach ($anggota as $a)
                    <option value="{{ $a->idAnggota }}" {{ $transaksi->idAnggota == $a->idAnggota ? 'selected' : '' }}>
                        {{ $a->nama }}
                    </option>
                @endforeach
            </select>
        </div>

        <div>
            <label class="block text-sm font-semibold mb-1">Judul Buku</label>
            <select name="idBuku" class="w-full border border-gray-300 px-4 py-2 rounded focus:outline-none focus:ring-2 focus:ring-yellow-400" required>
                <option value="" disabled>-- Pilih Buku --</option>
                @foreach ($buku as $b)
                    <option value="{{ $b->idBuku }}" {{ $transaksi->idBuku == $b->idBuku ? 'selected' : '' }}>
                        {{ $b->judulBuku }}
                    </option>
                @endforeach
            </select>
        </div>

        <div>
            <label class="block text-sm font-semibold mb-1">Tanggal Peminjaman</label>
            <input type="date" name="tanggalPeminjaman" value="{{ $transaksi->tanggalPeminjaman }}"
                   class="w-full border border-gray-300 px-4 py-2 rounded focus:outline-none focus:ring-2 focus:ring-yellow-400" required>
        </div>

        <div>
            <label class="block text-sm font-semibold mb-1">Tanggal Kembali</label>
            <input type="date" name="tanggalKembali" value="{{ $transaksi->tanggalKembali }}"
                   class="w-full border border-gray-300 px-4 py-2 rounded focus:outline-none focus:ring-2 focus:ring-yellow-400" required>
        </div>

        <div class="flex justify-between items-center pt-4">
            <a href="{{ route('transaksi.index') }}" class="text-sm text-gray-500 hover:text-yellow-600 transition">← Kembali</a>
            <button type="submit" class="bg-yellow-500 text-white font-semibold px-5 py-2 rounded hover:bg-yellow-600 transition">Update</button>
        </div>
    </form>
</div>
@endsection
