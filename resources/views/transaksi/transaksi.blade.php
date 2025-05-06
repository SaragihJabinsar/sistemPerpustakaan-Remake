@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto bg-white shadow-xl rounded-xl p-8 animate__animated animate__fadeIn">
    <h1 class="text-4xl text-center font-bold text-green-700 mb-8">📃Data Transaksi</h1>

    <div class="flex justify-between items-center mb-6">
        <a href="{{ route('transaksi.create') }}"
           class="bg-green-600 text-white px-5 py-2 rounded-lg hover:bg-green-700 transition duration-300 shadow">
           + Tambah Transaksi
        </a>
    </div>

    <div class="overflow-x-auto">
        <table class="min-w-full border border-gray-300 rounded-md shadow-sm">
            <thead class="bg-gradient-to-r from-green-100 to-green-200 text-green-900">
                <tr>
                    <th class="p-3 border">ID</th>
                    <th class="p-3 border">Nama Anggota</th>
                    <th class="p-3 border">Judul Buku</th>
                    <th class="p-3 border">Tanggal Pinjam</th>
                    <th class="p-3 border">Tanggal Kembali</th>
                    <th class="p-3 border">Aksi</th>
                </tr>
            </thead>
            <tbody class="text-center">
                @forelse ($data as $transaksi)
                    <tr class="hover:bg-gray-50 transition">
                        <td class="p-3 border">{{ $transaksi->idTransaksi }}</td>
                        <td class="p-3 border">{{ $transaksi->anggota->nama ?? 'Tidak ditemukan' }}</td>
                        <td class="p-3 border">{{ $transaksi->buku->judulBuku ?? 'Tidak ditemukan' }}</td>
                        <td class="p-3 border">{{ $transaksi->tanggalPeminjaman }}</td>
                        <td class="p-3 border">{{ $transaksi->tanggalKembali }}</td>
                        <td class="p-3 border">
                            <div class="flex justify-center gap-2">
                                <a href="{{ route('transaksi.edit', $transaksi->idTransaksi) }}"
                                   class="bg-yellow-400 hover:bg-yellow-500 text-white px-3 py-1 rounded transition duration-200 shadow">
                                    ✏️ Edit
                                </a>
                                <form action="{{ route('transaksi.destroy', $transaksi->idTransaksi) }}" method="POST"
                                      onsubmit="return confirm('Yakin ingin menghapus transaksi ini?')">
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
                        <td colspan="6" class="p-4 text-gray-500 italic">Tidak ada data transaksi.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-6 text-right">
        <a href="{{ route('transaksi.download') }}"
           class="inline-block text-sm text-green-600 hover:text-green-800 hover:underline font-semibold">
           📄 Download Data Transaksi
        </a>
    </div>
</div>
@endsection
