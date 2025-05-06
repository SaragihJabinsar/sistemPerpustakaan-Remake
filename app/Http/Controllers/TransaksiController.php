<?php

namespace App\Http\Controllers;

use App\Models\Transaksi; // Pastikan untuk mengimpor model
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (!session()->has('username')) {
        return redirect()->route('login');
        }

        $data = Transaksi::all();
        return view('transaksi.transaksi', compact('data'));

        $data = Transaksi::with(['anggota', 'buku'])->get();
        return view('transaksi.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (!session()->has('username')) {
        return redirect()->route('login');
        }

        // Ambil data anggota dan buku
        $anggota = \App\Models\Anggota::all();
        $buku = \App\Models\Buku::all();

        // Generate ID Transaksi otomatis
        $last = \App\Models\Transaksi::orderBy('idTransaksi', 'desc')->first();
        $newID = $last ? 'T' . str_pad((int)substr($last->idTransaksi, 1) + 1, 3, '0', STR_PAD_LEFT) : 'T0001';

        // Kirim ke view
        return view('transaksi.create', compact('anggota', 'buku', 'newID'));
    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (!session()->has('username')) {
        return redirect()->route('login');
        }

        $request->validate([
        'idTransaksi' => 'required',
        'idAnggota' => 'required',
        'idBuku' => 'required',
        'tanggalPeminjaman' => 'required',
        'tanggalKembali' => 'required',
        ]);

        Transaksi::create([
        'idTransaksi' => $request->idTransaksi,
        'idAnggota' => $request->idAnggota,
        'idBuku' => $request->idBuku,
        'tanggalPeminjaman' => $request->tanggalPeminjaman,
        'tanggalKembali' => $request->tanggalKembali,
        ]);

        return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil ditambahkan!');
    }
    /**
     * Show the form for creating a new resource.
     */

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        if (!session()->has('username')) {
        return redirect()->route('login');
        }

        // Tampilkan detail dari post tertentu
        $data = Transaksi::all();

        // Jika ingin menampilkan PDF
        $pdf = PDF::loadView('transaksi.pdf', compact('data'));

        return $pdf->download('transaksi.pdf'); // Mengirim PDF ke browser
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        if (!session()->has('username')) {
        return redirect()->route('login');
        }

        $transaksi = Transaksi::findOrFail($id);
        $anggota = \App\Models\Anggota::all();
        $buku = \App\Models\Buku::all();

        return view('transaksi.edit', compact('transaksi', 'anggota', 'buku'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        if (!session()->has('username')) {
        return redirect()->route('login');
        }

        // Simpan perubahan post ke database
        $request->validate([
            'idAnggota' => 'required',
            'idBuku' => 'required',
            'tanggalPeminjaman' => 'required',
            'tanggalKembali' => 'required',
        ]);

        $transaksi = Transaksi::findOrFail($id);

        $transaksi->update([
            'idAnggota' => $request->idAnggota,
            'idBuku' => $request->idBuku,
            'tanggalPeminjaman' => $request->tanggalPeminjaman,
            'tanggalKembali' => $request->tanggalKembali,
        ]);

        return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        if (!session()->has('username')) {
        return redirect()->route('login');
        }
        
        // Hapus post dari database
        Transaksi::destroy($id);

        return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil dihapus!');
    }
}
