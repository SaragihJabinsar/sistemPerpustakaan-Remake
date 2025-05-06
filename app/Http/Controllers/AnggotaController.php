<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class AnggotaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (!session()->has('username')) {
        return redirect()->route('login');
        }

        $data = Anggota::all();
        return view('anggota.anggota', compact('data')); // Menampilkan daftar anggota
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (!session()->has('username')) {
        return redirect()->route('login');
        }

        // Mengambil ID terakhir dan membuat ID anggota baru
        $lastID = Anggota::max('idAnggota');
        $newID = 'A001'; // ID default jika tidak ada data anggota

        if ($lastID) {
            $number = (int)substr($lastID, 1) + 1;
            $newID = 'A' . str_pad($number, 3, '0', STR_PAD_LEFT); // Membuat ID baru
        }

        return view('anggota.create', compact('newID')); // Mengirim ID baru ke view create
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (!session()->has('username')) {
        return redirect()->route('login');
        }

        // Validasi input
        $request->validate([
            'idAnggota' => 'required',
            'nama' => 'required',
            'alamat' => 'required',
            'status' => 'required',
            'jenisKelamin' => 'required',
        ]);

        // Menyimpan data anggota baru
        Anggota::create([
            'idAnggota' => $request->idAnggota,
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'status' => $request->status,
            'jenisKelamin' => $request->jenisKelamin,
        ]);

        // Redirect setelah berhasil menambahkan data
        return redirect()->route('anggota.index')->with('success', 'Data berhasil ditambahkan!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        if (!session()->has('username')) {
        return redirect()->route('login');
        }

        $anggota = Anggota::findOrFail($id); // Mencari anggota berdasarkan ID
        return view('anggota.edit', compact('anggota')); // Mengirim data anggota ke view edit
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
        'nama' => 'required',
        'alamat' => 'required',
        'status' => 'required',
        'jenisKelamin' => 'required',
        ]);

        // Ambil anggota berdasarkan ID
        $anggota = Anggota::findOrFail($id);

        // Update data anggota tanpa mengubah idAnggota
        $anggota->update([
        'nama' => $request->nama,
        'alamat' => $request->alamat,
        'status' => $request->status,
        'jenisKelamin' => $request->jenisKelamin,
        ]);

        // Redirect setelah berhasil memperbarui data
        return redirect()->route('anggota.index')->with('success', 'Data berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        if (!session()->has('username')) {
        return redirect()->route('login');
        }

        // Menghapus data anggota berdasarkan ID
        Anggota::destroy($id);

        // Redirect setelah berhasil menghapus data
        return redirect()->route('anggota.index')->with('success', 'Data berhasil dihapus');
    }


    // Method untuk menampilkan detail anggota berdasarkan ID
    public function show($id)
    {
        if (!session()->has('username')) {
        return redirect()->route('login');
        }
        
           // Ambil data anggota yang ingin ditampilkan di PDF
           $data = Anggota::all();

           // Generate PDF menggunakan view
           $pdf = PDF::loadView('anggota.pdf', compact('data'));

           // Mendownload PDF
           return $pdf->download('data anggota.pdf'); // Mengunduh file PDF dengan nama 'data_anggota.pdf'

    }


    // Fungsi untuk mengunduh data anggota dalam format CSV
    // public function download()
    // {
    // Ambil data anggota dari database
    // $anggota = Anggota::all();

    // Membuat header CSV
    // $csvHeader = ['ID Anggota', 'Nama', 'Alamat', 'Status', 'Jenis Kelamin'];

    // Membuat data untuk diunduh (menggabungkan header dan data anggota)
    // $csvData = [];
    // foreach ($anggota as $item) {
    // $csvData[] = [
    // $item->idAnggota,
    // $item->nama,
    // $item->alamat,
    // $item->status,
    // $item->jenisKelamin
    // ];
    // }

    // Menggabungkan header dan data anggota menjadi satu array
    // array_unshift($csvData, $csvHeader);

    // Nama file yang akan diunduh
    // $filename = 'data_anggota.csv';

    // Membuat file CSV dan mendownloadnya
    // $handle = fopen('php://output', 'w');
    // foreach ($csvData as $row) {
    // fputcsv($handle, $row);
    // }
    // fclose($handle);

    // Mengatur header agar browser tahu ini adalah file CSV
    // return response()->stream(
    // function () use ($csvData) {
    // $handle = fopen('php://output', 'w');
    // foreach ($csvData as $row) {
    // fputcsv($handle, $row);
    // }
    // fclose($handle);
    // },
    // 200,
    // [
    // "Content-Type" => "text/csv",
    // "Content-Disposition" => "attachment; filename=$filename",
    // ]
    // );
    // }

    // public function download()
    //     {

    //     }

}
