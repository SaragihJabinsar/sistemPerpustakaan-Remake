<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    protected $table = 'tbBuku';
    protected $primaryKey = 'idBuku';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = ['idBuku', 'judulBuku', 'kategori', 'pengarang', 'penerbit', 'status'];
    public $timestamps = false;
}
