<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Anggota extends Model
{
    protected $table = 'tbanggota'; // 💡 Nama tabel sesuai DB kamu
    protected $primaryKey = 'idAnggota'; // karena bukan 'id'
    public $incrementing = false; // karena id-nya bukan auto-increment
    protected $keyType = 'string'; // karena idAnggota itu varchar
    protected $fillable = ['idAnggota', 'nama', 'jenisKelamin', 'alamat', 'status'];
    public $timestamps = false;
}
