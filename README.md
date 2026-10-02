# Mini Café Cart - Pertemuan 6

Aplikasi PHP sederhana untuk praktikum Pemrograman Web I Pertemuan 6.

## Identitas
- Nama: LulU' Khairunnisa Siregar
- NIM: 25012087
- Kelas: 25M31

## Tujuan
Menerapkan PHP Session untuk state keranjang, flash message untuk notifikasi satu kali, Cookie untuk preferensi tema non-sensitif, validasi input, escaping output, serta workflow Git/GitHub.

## Fitur
- Katalog produk
- Tambah produk ke session cart
- Hapus item
- Kosongkan keranjang
- Perhitungan kuantitas, subtotal, dan total
- Flash message satu kali
- Tema terang/gelap menggunakan cookie 30 hari
- Validasi action dan ID produk
- Escaping output dengan htmlspecialchars()

## Struktur Folder
pertemuan-06/
├── index.php
├── cart.php
├── actions.php
├── bootstrap.php
├── functions.php
├── README.md
├── .gitignore
├── data/
│   └── products.php
└── components/
    ├── header.php
    └── footer.php

## Cara Menjalankan
1. Simpan folder `pertemuan-06` di dalam `web1`.
2. Jalankan XAMPP Apache, atau gunakan PHP built-in server.
3. Jika memakai PHP built-in server:
   `php -S localhost:8000`
4. Buka `http://localhost:8000/index.php`.

## Pengujian
1. Buka halaman katalog: cart = 0.
2. Tambah produk yang sama dua kali: jumlah menjadi 2 dan flash tampil.
3. Refresh: flash tidak muncul lagi.
4. Tambah dua produk berbeda: subtotal dan total sesuai.
5. Hapus satu jenis produk.
6. Kosongkan keranjang.
7. Uji ID produk asing: harus ditolak tanpa fatal error.
8. Akses `actions.php` dengan GET: diarahkan ke index.php.
9. Pilih tema gelap lalu buka ulang browser: tema tetap.
10. Ubah cookie theme ke nilai asing: aplikasi kembali ke light.

## Keamanan Dasar
- Tidak menyimpan password/token/data sensitif di cookie.
- Action perubahan state hanya menerima POST.
- ID produk divalidasi.
- Output dinamis di-escape.
- `.env`, `vendor/`, `.idea/`, dan `.vscode/` tidak di-commit.

## Workflow Commit
1. docs: inisialisasi proyek dan petunjuk praktikum
2. feat: tambahkan bootstrap session
3. feat: tambahkan dataset dan fungsi bantuan
4. feat: tampilkan katalog produk
5. feat: proses tambah produk ke session
6. feat: tampilkan ringkasan keranjang
7. feat: tambahkan hapus item dan kosongkan keranjang
8. feat: simpan preferensi tema dalam cookie
9. fix: tangani input tidak valid dan escape output
10. docs: lengkapi README dan bukti pengujian
