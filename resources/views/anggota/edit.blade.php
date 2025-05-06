@extends('layouts.app') {{-- Ganti sesuai nama file layout utama kamu --}}

@section('content')
<div class="w-full max-w-xl mx-auto bg-white p-8 rounded-2xl shadow-lg animate__animated animate__fadeIn">
    <h2 class="text-2xl font-bold text-blue-600 mb-6 text-center">Edit Data Anggota</h2>

    <form action="{{ route('anggota.update', $anggota->idAnggota) }}" method="POST" class="space-y-5">
        @csrf
        @method('PUT')

        <div>
            <label class="block text-sm font-semibold mb-1">Nama Lengkap</label>
            <input type="text" name="nama" value="{{ $anggota->nama }}" class="w-full border border-gray-300 px-4 py-2 rounded focus:outline-none focus:ring-2 focus:ring-blue-400" required>
        </div>

        <div>
            <label class="block text-sm font-semibold mb-1">Alamat</label>
            <textarea name="alamat" class="w-full border border-gray-300 px-4 py-2 rounded focus:outline-none focus:ring-2 focus:ring-blue-400" required>{{ $anggota->alamat }}</textarea>
        </div>

        <div>
            <label class="block text-sm font-semibold mb-1">Jenis Kelamin</label>
            <select name="jenisKelamin" class="w-full border border-gray-300 px-4 py-2 rounded focus:outline-none focus:ring-2 focus:ring-blue-400" required>
                <option value="Laki-laki" {{ $anggota->jenisKelamin == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                <option value="Perempuan" {{ $anggota->jenisKelamin == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
            </select>
        </div>

        <div>
            <label class="block text-sm font-semibold mb-1">Status</label>
            <div class="flex flex-wrap gap-4">
                @php
                    $statusOptions = ['VIP', 'Mahasiswa', 'Umum', 'Pelajar'];
                @endphp
                @foreach ($statusOptions as $status)
                    <label class="inline-flex items-center">
                        <input type="radio" name="status" value="{{ $status }}" {{ $anggota->status == $status ? 'checked' : '' }} class="form-radio text-blue-600">
                        <span class="ml-2 text-sm">{{ $status }}</span>
                    </label>
                @endforeach
            </div>
        </div>

        <div class="flex justify-between items-center pt-4">
            <a href="{{ route('anggota.index') }}" class="text-sm text-gray-500 hover:text-blue-600 transition">← Kembali</a>
            <button type="submit" class="bg-yellow-500 text-white font-semibold px-5 py-2 rounded hover:bg-yellow-600 transition">Update</button>
        </div>
    </form>
</div>
@endsection
