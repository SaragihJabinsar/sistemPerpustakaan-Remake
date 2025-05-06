<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tbtransaksi', function (Blueprint $table) {
            $table->string('idTransaksi', 10)->primary(); // Set primary key
            $table->string('idAnggota', 10); // Anggota ID
            $table->string('idBuku', 10); // Buku ID
            $table->date('tanggalPeminjaman'); // Tanggal Pinjam
            $table->date('tanggalKembali'); // Tanggal Kembali

            // Foreign Keys
            $table->foreign('idAnggota')->references('idAnggota')->on('anggota'); // Pastikan nama tabel dan kolom benar
            $table->foreign('idBuku')->references('idBuku')->on('buku'); // Pastikan nama tabel dan kolom benar

            $table->timestamps(); // Timestamp created_at & updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbtransaksi');
    }
};
