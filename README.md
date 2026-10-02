# Praktikum Pemrograman Web I - Pertemuan 6

## Identitas

- Nama: Lulu' Khairunnisa Siregar
- NIM: 25012087
- Kelas: 25M31

## Judul

Session, Cookie, Flash Message, dan Keranjang Sederhana

## Deskripsi

Project ini merupakan implementasi praktikum Pemrograman Web I Pertemuan 6 menggunakan PHP Native.

Project menerapkan:

- PHP Session
- Flash Message
- Cookie
- Keranjang sederhana
- Validasi input
- Escape output
- Git dan GitHub

Data produk disimpan secara statis dalam file PHP dan keranjang disimpan menggunakan Session tanpa database.

## Fitur

1. Menampilkan katalog produk.
2. Menambahkan produk ke keranjang.
3. Menampilkan jumlah produk dalam keranjang.
4. Menampilkan subtotal dan total harga.
5. Menghapus produk dari keranjang.
6. Mengosongkan seluruh keranjang.
7. Menampilkan flash message setelah aksi.
8. Mengubah tema terang dan gelap.
9. Menyimpan preferensi tema menggunakan Cookie.
10. Memvalidasi input action dan ID produk.
11. Mengarahkan akses GET ke actions.php kembali ke index.php.
12. Melakukan escape output menggunakan htmlspecialchars().

## Struktur Folder

```text
pertemuan-06/
│
├── actions.php
├── bootstrap.php
├── cart.php
├── functions.php
├── index.php
├── README.md
├── .gitignore
│
├── components/
│   ├── header.php
│   └── footer.php
│
└── data/
    └── products.php