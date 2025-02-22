# Desain Program
Program ini terdiri dari 2 file utama:

# mesinpetshop.py
Berisi class Petshop yang memiliki 4 atribut privat:
* ID
* Nama Produk
* Kategori
* Harga

Fitur pada class ini:
* Constructor untuk inisialisasi atribut (baik default maupun parameterized).
* Getter dan Setter untuk masing-masing atribut agar dapat diakses dan dimodifikasi secara aman.
* Method __str__ untuk menampilkan informasi produk dalam format yang rapi.
* Destructor __del__ untuk menampilkan pesan saat objek produk dihapus dari memori.

# main.py
* Berisi alur program utama untuk mengelola produk petshop dengan sistem menu interaktif.

# Alur Program
Program langsung menampilkan menu utama saat dijalankan, data produk disimpan dalam sebuah list bernama daftar_produk.

6 menu utama tersedia untuk pengguna:
1. Tambah Produk → Menambah produk baru ke dalam daftar.
2. Tampilkan Produk → Menampilkan semua produk dalam daftar.
3. Update Produk → Memperbarui data produk berdasarkan ID.
4. Hapus Produk → Menghapus produk berdasarkan ID.
5. Cari Produk → Mencari produk berdasarkan Nama (tidak case-sensitive).
6. Keluar → Mengakhiri program.

# Aturan Program
ID sebagai acuan utama:
* Saat melakukan Tambah Produk, program memeriksa apakah ID sudah ada. Jika iya, akan muncul pesan: Error: ID sudah ada. Gunakan ID unik.
* Saat melakukan Update atau Hapus Produk, program memastikan ID yang dimasukkan ada dalam daftar. Jika tidak ditemukan, muncul pesan: Produk tidak ditemukan.

# Fitur Pencarian:
Pencarian menggunakan Nama Produk dan bersifat case-insensitive.
