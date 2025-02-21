<?php
include 'classes/product.php';

$productManager = new Product();

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $productObject = $productManager->getProductById($id); // Mendapatkan objek Product
    
    if (!$productObject) {
        echo "Produk tidak ditemukan.";
        exit;
    }
    
    $product = $productObject->toArray();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $kategori = $_POST['kategori'];
    $harga = $_POST['harga'];

    $foto = null;
    if (!empty($_FILES['foto']['name'])) {
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["foto"]["name"]);
        if (move_uploaded_file($_FILES["foto"]["tmp_name"], $target_file)) {
            $foto = $target_file;
        }
    }

    $productManager->updateProduct($id, $name, $kategori, $harga, $foto);
    header('Location: index.php');
    exit;
}
?>

<h2>Edit Produk</h2>
<form action="update_product.php" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?php echo $product['id']; ?>">
    <label>Nama:</label><input type="text" name="name" value="<?php echo $product['name']; ?>" required><br>
    <label>Kategori:</label><input type="text" name="kategori" value="<?php echo $product['kategori']; ?>" required><br>
    <label>Harga:</label><input type="number" name="harga" value="<?php echo $product['harga']; ?>" required><br>
    <label>Foto Lama:</label><br>
    <img src="<?php echo $product['foto']; ?>" width="100"><br><br>
    <label>Foto Baru:</label><input type="file" name="foto"><br><br>
    <button type="submit">Update Produk</button>
</form>