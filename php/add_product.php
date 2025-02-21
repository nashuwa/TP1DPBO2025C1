<?php
session_start(); // Memastikan session sudah dimulai
include 'classes/product.php';

$productManager = new Product();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = uniqid();  // Auto-generate ID
    $name = $_POST['name'];
    $kategori = $_POST['kategori'];
    $harga = $_POST['harga'];

    // Upload gambar
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["foto"]["name"]);
    if (move_uploaded_file($_FILES["foto"]["tmp_name"], $target_file)) {
        $productManager->addProduct($id, $name, $kategori, $harga, $target_file);
        header('Location: index.php');
        exit;
    } else {
        echo "Gagal mengupload gambar.";
    }
}
?>

<h2>Tambah Produk</h2>
<form action="add_product.php" method="post" enctype="multipart/form-data">
    <label>Nama:</label><input type="text" name="name" required><br>
    <label>Kategori:</label><input type="text" name="kategori" required><br>
    <label>Harga:</label><input type="number" name="harga" required><br>
    <label>Foto:</label><input type="file" name="foto" required><br><br>
    <button type="submit">Tambah Produk</button>
</form>