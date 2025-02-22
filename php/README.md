# Desain Program
Atribut Private:
* $id → ID unik untuk setiap produk.
* $name → Nama produk.
* $kategori → Kategori produk.
* $harga → Harga produk.
* $foto → Path gambar produk.

# Alur Umum CRUD dengan Class Product
Tambah Produk
→ Data produk (termasuk gambar) dikirim melalui form, kemudian diproses oleh method addProduct.

Tampilkan Produk
→ Menggunakan getAllProducts() untuk mengambil dan menampilkan semua produk di index.php.

Update Produk
→ Produk diambil menggunakan getProductById(), lalu diperbarui dengan updateProduct().
→ Jika ada gambar baru, gambar lama dihapus dari server.

Hapus Produk
→ Memanggil deleteProduct() berdasarkan ID produk.
→ Gambar terkait juga dihapus dari direktori server.
