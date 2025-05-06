<div align="center">
  <h1>📚 Aplikasi Manajemen Perpustakaan Laravel</h1>
  <p>Sistem sederhana untuk mengelola data anggota, buku, dan transaksi perpustakaan berbasis Laravel 10 + Tailwind CSS</p>
</div>

---

## 🎬 Demo Aplikasi

Klik gambar di bawah untuk menonton demo lengkap aplikasi ini di YouTube:

[![Tonton Demo Sistem Perpustakaan](https://img.youtube.com/vi/hxBPT5g6Upw/0.jpg)](https://www.youtube.com/watch?v=hxBPT5g6Upw)

---

## ✨ Fitur Utama

- ✅ **Manajemen Anggota**: Tambah, edit, hapus anggota perpustakaan.
- ✅ **Manajemen Buku**: CRUD buku lengkap dengan input judul.
- ✅ **Transaksi Peminjaman**:
  - Pilih anggota dan buku dari dropdown.
  - ID transaksi otomatis (`T0001`, `T0002`, dst).
  - Tanggal pinjam dan kembali tercatat.
- ✅ **Laporan PDF**:
  - Cetak data anggota ke dalam PDF.
  - Desain rapi dan waktu cetak otomatis.

---

## 🗃️ Struktur Database

### 🔸 Tabel `tbanggota`

| Kolom         | Tipe    | Keterangan                |
|---------------|---------|---------------------------|
| idAnggota     | string  | Primary key (ex: A001)    |
| nama          | string  | Nama lengkap anggota      |
| alamat        | string  | Alamat anggota            |
| status        | string  | VIP / Mahasiswa / Umum / Pelajar |
| jenisKelamin  | string  | Laki-laki / Perempuan     |

---

### 🔸 Tabel `tbbuku`

| Kolom       | Tipe   | Keterangan               |
|-------------|--------|--------------------------|
| idBuku      | string | Primary key (ex: B001)   |
| judulBuku   | string | Judul buku               |

---

### 🔸 Tabel `tbtransaksi`

| Kolom          | Tipe    | Keterangan                                      |
|----------------|---------|-------------------------------------------------|
| idTransaksi    | string  | Primary key (ex: T0001)                         |
| idAnggota      | string  | Foreign key ke `tbanggota`                      |
| idBuku         | string  | Foreign key ke `tbbuku`                         |
| tanggalPinjam  | date    | Tanggal meminjam buku                           |
| tanggalKembali | date    | Tanggal pengembalian buku                       |

---

## 🔄 Relasi Eloquent

### 📁 `Transaksi.php`
```php
public function anggota()
{
    return $this->belongsTo(Anggota::class, 'idAnggota', 'idAnggota');
}

public function buku()
{
    return $this->belongsTo(Buku::class, 'idBuku', 'idBuku');
}
