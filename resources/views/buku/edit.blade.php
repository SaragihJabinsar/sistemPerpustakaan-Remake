@extends('layouts.app') {{-- Ganti sesuai nama file layout utama kamu --}}

@section('content')
<div class="w-full max-w-xl mx-auto bg-white p-8 rounded-2xl shadow-lg animate__animated animate__fadeIn">
    <h2 class="text-2xl font-bold text-blue-600 mb-6 text-center">Edit Data Buku</h2>

    <form action="{{ route('buku.update', $buku->idBuku) }}" method="POST" class="space-y-5">
        @csrf
        @method('PUT')

        <div>
            <label class="block text-sm font-semibold mb-1">Judul Buku</label>
            <input type="text" name="judulBuku" value="{{ $buku->judulBuku }}" class="w-full border border-gray-300 px-4 py-2 rounded focus:outline-none focus:ring-2 focus:ring-blue-400" required>
        </div>

        <div>
            <label class="block text-sm font-semibold mb-1">Kategori</label>
            <input type="text" name="kategori" value="{{ $buku->kategori }}" class="w-full border border-gray-300 px-4 py-2 rounded focus:outline-none focus:ring-2 focus:ring-blue-400" required>
        </div>

        <div>
            <label class="block text-sm font-semibold mb-1">Pengarang</label>
            <input type="text" name="pengarang" value="{{ $buku->pengarang }}" class="w-full border border-gray-300 px-4 py-2 rounded focus:outline-none focus:ring-2 focus:ring-blue-400" required>
        </div>

        <div>
            <label class="block text-sm font-semibold mb-1">Penerbit</label>
            <input type="text" name="penerbit" value="{{ $buku->penerbit }}" class="w-full border border-gray-300 px-4 py-2 rounded focus:outline-none focus:ring-2 focus:ring-blue-400" required>
        </div>

        <div>
            <label class="block text-sm font-semibold mb-1">Status</label>
            <div class="flex flex-wrap gap-4">
                @php
                    $statusOptions = ['Tersedia', 'Dipinjam', 'Hilang', 'Rusak'];
                @endphp
                @foreach ($statusOptions as $status)
                    <label class="inline-flex items-center">
                        <input type="radio" name="status" value="{{ $status }}" {{ $buku->status == $status ? 'checked' : '' }} class="form-radio text-blue-600">
                        <span class="ml-2 text-sm">{{ $status }}</span>
                    </label>
                @endforeach
            </div>
        </div>

        <div class="flex justify-between items-center pt-4">
            <a href="{{ route('buku.index') }}" class="text-sm text-gray-500 hover:text-blue-600 transition">← Kembali</a>
            <button type="submit" class="bg-yellow-500 text-white font-semibold px-5 py-2 rounded hover:bg-yellow-600 transition">Update</button>
        </div>
    </form>
</div>
@endsection
