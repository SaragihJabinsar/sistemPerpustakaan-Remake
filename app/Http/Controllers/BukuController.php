<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (!session()->has('username')) {
        return redirect()->route('login');
        }

        $data = Buku::all();
        return view('buku.buku', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (!session()->has('username')) {
        return redirect()->route('login');
        }

        // Mengambil ID terakhir dan membuat ID buku baru
        $lastID = Buku::max('idBuku'); // Mengambil ID terakhir dari tabel buku
        $newID = 'B001'; // ID default jika tidak ada data buku
        if ($lastID) {
            $number = (int)substr($lastID, 1) + 1;
            $newID = 'B' . str_pad($number, 3, '0', STR_PAD_LEFT); // Membuat ID baru
        }

        return view('buku.create', compact('newID')); // Mengirim ID baru ke view create
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (!session()->has('username')) {
        return redirect()->route('login');
        }

        // vali
        $request->validate([
            'idBuku' => 'required',
            'judulBuku' => 'required',
            'kategori' => 'required',
            'pengarang' => 'required',
            'penerbit' => 'required',
            'status' => 'required',
        ]);

        // Menyimpan data buku baru
        Buku::create([
            'idBuku' => $request->idBuku,
            'judulBuku' => $request->judulBuku,
            'kategori' => $request->kategori,
            'pengarang' => $request->pengarang,
            'penerbit' => $request->penerbit,
            'status' => $request->status,
        ]);

        // Redirect setelah berhasil menambahkan data
        return redirect()->route('buku.index')->with('success', 'Data berhasil ditambahkan!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        if (!session()->has('username')) {
        return redirect()->route('login');
        }

        $buku = Buku::findOrFail($id);
        return view('buku.edit', compact('buku'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        if (!session()->has('username')) {
        return redirect()->route('login');
        }

        // Validasi data yang diterima
        $request->validate([
            'judulBuku' => 'required',
            'kategori' => 'required',
            'pengarang' => 'required',
            'penerbit' => 'required',
            'status' => 'required',
        ]);

        // Ambil buku berdasarkan ID
        $buku = Buku::findOrFail($id);

        // Update data buku tanpa mengubah idBuku
        $buku->update([
            'judulBuku' => $request->judulBuku,
            'kategori' => $request->kategori,
            'pengarang' => $request->pengarang,
            'penerbit' => $request->penerbit,
            'status' => $request->status,
        ]);

        // Redirect setelah berhasil memperbarui data
        return redirect()->route('buku.index')->with('success', 'Data berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        if (!session()->has('username')) {
        return redirect()->route('login');
        }

        // Menghapus buku berdasarkan ID
        Buku::destroy($id);

        // Redirect setelah berhasil menghapus data
        return redirect()->route('buku.index')->with('success', 'Data berhasil dihapus');
    }

        public function show($id)
        {
            if (!session()->has('username')) {
        return redirect()->route('login');
        }
        
        // Ambil data Buku yang ingin ditampilkan di PDF
        $data = Buku::all();

        // Generate PDF menggunakan view
        $pdf = PDF::loadView('buku.pdf', compact('data'));

        // Mendownload PDF
        return $pdf->download('data buku.pdf'); // Mengunduh file PDF dengan nama 'data buku.pdf'

        }
}
