@extends('layouts.app') {{-- Ganti 'layouts.app' sesuai nama layout kamu --}}

@section('content')
<div class="w-full max-w-xl mx-auto bg-white p-8 rounded-2xl shadow-lg animate__animated animate__fadeIn">
    <h2 class="text-2xl font-bold text-blue-600 mb-6 text-center">Tambah Data Anggota</h2>

    <form action="{{ route('anggota.store') }}" method="POST" class="space-y-5">
        @csrf
        <div>
            <label class="block text-sm font-semibold mb-1">ID Anggota</label>
            <input type="text" name="idAnggota" value="{{ $newID }}" readonly class="w-full bg-gray-100 border border-gray-300 px-4 py-2 rounded text-gray-500 focus:outline-none">
        </div>

        <div>
            <label class="block text-sm font-semibold mb-1">Nama Lengkap</label>
            <input type="text" name="nama" placeholder="Contoh: Jabin Saragih" class="w-full border border-gray-300 px-4 py-2 rounded focus:outline-none focus:ring-2 focus:ring-blue-400" required>
        </div>

        <div>
            <label class="block text-sm font-semibold mb-1">Jenis Kelamin</label>
            <div class="flex space-x-6">
                <label class="inline-flex items-center">
                    <input type="radio" name="jenisKelamin" value="Laki-laki" class="form-radio text-blue-600" required>
                    <span class="ml-2 text-sm">Laki-laki</span>
                </label>
                <label class="inline-flex items-center">
                    <input type="radio" name="jenisKelamin" value="Perempuan" class="form-radio text-blue-600" required>
                    <span class="ml-2 text-sm">Perempuan</span>
                </label>
            </div>
        </div>

        <div>
            <label class="block text-sm font-semibold mb-1">Alamat</label>
            <textarea name="alamat" placeholder="Contoh: Jl. Mawar No. 123" class="w-full border border-gray-300 px-4 py-2 rounded focus:outline-none focus:ring-2 focus:ring-blue-400" required></textarea>
        </div>

        <div>
            <label class="block text-sm font-semibold mb-1">Status</label>
            <div class="flex flex-wrap gap-4">
                @php
                    $statusOptions = ['VIP', 'Mahasiswa', 'Umum', 'Pelajar'];
                @endphp
                @foreach ($statusOptions as $status)
                    <label class="inline-flex items-center">
                        <input type="radio" name="status" value="{{ $status }}" class="form-radio text-blue-600" required>
                        <span class="ml-2 text-sm">{{ $status }}</span>
                    </label>
                @endforeach
            </div>
        </div>

        <div class="flex justify-between items-center pt-4">
            <a href="{{ route('anggota.index') }}" class="text-sm text-gray-500 hover:text-blue-600 transition">← Kembali</a>
            <button type="submit" class="bg-blue-500 text-white font-semibold px-5 py-2 rounded hover:bg-blue-600 transition">Simpan</button>
        </div>
    </form>
</div>
@endsection
