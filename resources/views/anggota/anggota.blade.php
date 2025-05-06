@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto bg-white shadow-xl rounded-xl p-8 animate__animated animate__fadeIn">
    <h1 class="text-4xl text-center font-bold text-blue-700 mb-8">📋 Data Anggota</h1>

    <div class="flex justify-between items-center mb-6">
        <a href="{{ route('anggota.create') }}"
           class="bg-blue-600 text-white px-5 py-2 rounded-lg hover:bg-blue-700 transition duration-300 shadow">
           + Tambah Anggota
        </a>
    </div>

    <div class="overflow-x-auto">
        <table class="min-w-full border border-gray-300 rounded-md shadow-sm">
            <thead class="bg-gradient-to-r from-blue-100 to-blue-200 text-blue-900">
                <tr>
                    <th class="p-3 border">ID</th>
                    <th class="p-3 border">Nama</th>
                    <th class="p-3 border">Jenis Kelamin</th>
                    <th class="p-3 border">Alamat</th>
                    <th class="p-3 border">Status</th>
                    <th class="p-3 border">Aksi</th>
                </tr>
            </thead>
            <tbody class="text-center">
                @forelse ($data as $anggota)
                    <tr class="hover:bg-gray-50 transition">
                        <td class="p-3 border">{{ $anggota->idAnggota }}</td>
                        <td class="p-3 border">{{ $anggota->nama }}</td>
                        <td class="p-3 border">{{ $anggota->jenisKelamin }}</td>
                        <td class="p-3 border">{{ $anggota->alamat }}</td>
                        <td class="p-3 border">{{ $anggota->status }}</td>
                        <td class="p-3 border">
                            <div class="flex justify-center gap-2">
                                <a href="{{ route('anggota.edit', $anggota->idAnggota) }}"
                                   class="bg-yellow-400 hover:bg-yellow-500 text-white px-3 py-1 rounded transition duration-200 shadow">
                                    ✏️ Edit
                                </a>
                                <form action="{{ route('anggota.destroy', $anggota->idAnggota) }}" method="POST"
                                      onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                            class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded transition duration-200 shadow">
                                        🗑️ Hapus
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="p-4 text-gray-500 italic">Tidak ada data anggota.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-6 text-right">
        <a href="{{ route('anggota.download') }}"
           class="inline-block text-sm text-blue-600 hover:text-blue-800 hover:underline font-semibold">
           📄 Download Data Anggota
        </a>
    </div>
</div>
@endsection
