<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $table = 'tbtransaksi'; // Nama tabel sesuai DB kamu
    protected $primaryKey = 'idTransaksi'; // karena bukan 'id'
    public $incrementing = false; // karena id-nya bukan auto-increment
    protected $keyType = 'string'; // karena idTransaksi itu varchar
    protected $fillable = ['idTransaksi', 'idAnggota', 'idBuku', 'tanggalPeminjaman', 'tanggalKembali'];
    public $timestamps = false;

    public function anggota()
    {
        return $this->belongsTo(Anggota::class, 'idAnggota', 'idAnggota');
    }

    public function buku()
    {
        return $this->belongsTo(Buku::class, 'idBuku', 'idBuku');
    }
}
