<?php
include 'classes/product.php';

$productManager = new Product();

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    if ($productManager->deleteProduct($id)) {
        header('Location: index.php');
        exit;
    } else {
        echo "Gagal menghapus produk atau ID produk tidak ditemukan.";
    }
} else {
    echo "ID produk tidak ditemukan.";
}
?>