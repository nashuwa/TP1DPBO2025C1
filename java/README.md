# Deskripsi Kode
Terdapat 1 class Petshop yang memiliki 4 atribut utama:

* ID (unik untuk setiap produk)
* Nama Produk
* Kategori
* Harga
Class ini berfungsi sebagai blueprint untuk membuat objek produk petshop dengan metode getter dan setter untuk mengakses dan memodifikasi atributnya.

# Alur Program
* Program dimulai dengan menampilkan menu utama.
* Tidak ada batasan jumlah data yang bisa dimasukkan. Pengguna bebas menambah produk sebanyak yang diinginkan.
* Program menyediakan 6 menu utama yang dapat dipilih pengguna:

1. Tambah Produk → Menambah data produk baru.
2. Tampilkan Produk → Menampilkan semua data produk yang tersedia.
3. Update Produk → Mengubah data produk berdasarkan ID.
4. Hapus Produk → Menghapus produk berdasarkan ID.
5. Cari Produk → Mencari produk berdasarkan Nama.
6. Keluar → Mengakhiri program.

# Aturan Program
* ID sebagai acuan utama. Saat melakukan Tambah Produk, program akan memeriksa apakah ID sudah ada di daftar. Jika ada, maka akan muncul pesan error: Error: ID sudah ada. Gunakan ID unik.
* Saat melakukan Update atau Hapus Produk, program memastikan ID yang dimasukkan ada dalam daftar. Jika tidak ditemukan, muncul pesan: Produk tidak ditemukan.
* Fitur Pencarian: Pencarian menggunakan Nama Produk yang bersifat case-insensitive (tidak membedakan huruf kapital dan kecil).
