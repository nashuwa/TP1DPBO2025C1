<?php // Memulai blok kode PHP
include 'classes/product.php'; // Menyertakan file product.php

$productObj = new Product(); // Membuat objek produk baru
$products = $productObj->getAllProducts(); // Sekarang mengembalikan array objek Product // Mendapatkan semua produk sebagai objek Product

$keyword = ''; // Menginisialisasi variabel keyword kosong

// Proses pencarian
if (isset($_POST['search'])) { // Memeriksa apakah form pencarian telah dikirim
    $keyword = $_POST['keyword']; // Mengambil kata kunci pencarian dari form
    $products = array_filter($products, function($produk) use ($keyword) { // Memfilter array produk berdasarkan kata kunci
        return stripos($produk->getName(), $keyword) !== false; // Gunakan getter getName() // Mencari kata kunci dalam nama produk (case insensitive)
    });
}
?> 

<!DOCTYPE html> 
<html> 
<head> 
    <title>Daftar Produk Petshop</title> 
</head> 
<body> /
    <h1>Daftar Produk Petshop</h1> 
    <a href="add_product.php">Tambah Produk</a> 
    <br><br> 

    <!-- Form Pencarian --> 
    <form method="post" action=""> <!-- Membuat form dengan metode POST dan action ke halaman yang sama -->
        <input type="text" name="keyword" placeholder="Cari produk..." value="<?php echo htmlspecialchars($keyword); ?>" required> <!--Input teks untuk kata kunci pencarian dengan nilai sebelumnya (jika ada) -->
        <button type="submit" name="search">Cari</button> 
        <?php if ($keyword): ?> 
            <a href="index.php">Reset</a>
        <?php endif; ?>
    </form> 
    <br> 

    <!-- Daftar Produk --> 
    <?php if (!empty($products)): ?>
        <?php foreach ($products as $produk): ?>
            <div style="border:1px solid #000; padding:10px; margin-bottom:10px;">
                <img src="<?php echo htmlspecialchars($produk->getFoto()); ?>" width="100"><br> 
                <strong><?php echo htmlspecialchars($produk->getName()); ?></strong><br> 
                Kategori: <?php echo htmlspecialchars($produk->getKategori()); ?><br> 
                Harga: Rp <?php echo number_format($produk->getHarga()); ?><br><br> 

                <a href="update_product.php?id=<?php echo $produk->getId(); ?>">Edit</a> | 
                <a href="delete_product.php?id=<?php echo $produk->getId(); ?>" onclick="return confirm('Yakin hapus produk ini?')">Hapus</a> 
            </div>
        <?php endforeach; ?> 
    <?php else: ?> 
        <p><?php echo $keyword ? "Tidak ada produk yang cocok dengan \"$keyword\"." : "Tidak ada produk tersedia."; ?></p> 
    <?php endif; ?> 
</body> 
</html>