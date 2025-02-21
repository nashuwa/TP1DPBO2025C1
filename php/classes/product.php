<?php
class Product {
    private $id;
    private $name;
    private $kategori;
    private $harga;
    private $foto;

    public function __construct() {
        // Inisialisasi session jika belum dimulai
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        
        // Inisialisasi array produk di session jika belum ada
        if (!isset($_SESSION['products'])) {
            $_SESSION['products'] = [];
        }
    }

    // Getter Methods
    public function getId() {
        return $this->id;
    }

    public function getName() {
        return $this->name;
    }

    public function getKategori() {
        return $this->kategori;
    }

    public function getHarga() {
        return $this->harga;
    }

    public function getFoto() {
        return $this->foto;
    }

    // Setter Methods
    public function setId($id) {
        $this->id = $id;
        return $this;
    }

    public function setName($name) {
        $this->name = $name;
        return $this;
    }

    public function setKategori($kategori) {
        $this->kategori = $kategori;
        return $this;
    }

    public function setHarga($harga) {
        $this->harga = $harga;
        return $this;
    }

    public function setFoto($foto) {
        $this->foto = $foto;
        return $this;
    }
    
    // Method untuk mengubah array produk menjadi array objek Product
    public function convertToProductObjects($productArray) {
        $objects = [];
        foreach ($productArray as $item) {
            $product = new Product();
            $product->setId($item['id'])
                   ->setName($item['name'])
                   ->setKategori($item['kategori'])
                   ->setHarga($item['harga'])
                   ->setFoto($item['foto']);
            $objects[] = $product;
        }
        return $objects;
    }
    
    // Ambil semua produk sebagai array objek Product
    public function getAllProducts() {
        return $this->convertToProductObjects($_SESSION['products']);
    }

    // Ambil semua produk sebagai array mentah
    public function getAllProductsRaw() {
        return $_SESSION['products'];
    }
    
    // Ambil produk berdasarkan ID sebagai objek Product
    public function getProductById($id) {
        $products = $this->getAllProductsRaw();
        foreach ($products as $product) {
            if ($product['id'] == $id) {
                $productObj = new Product();
                $productObj->setId($product['id'])
                          ->setName($product['name'])
                          ->setKategori($product['kategori'])
                          ->setHarga($product['harga'])
                          ->setFoto($product['foto']);
                return $productObj;
            }
        }
        return null;
    }
    
    // Ambil produk mentah berdasarkan ID (untuk kompatibilitas)
    public function getProductByIdRaw($id) {
        $products = $this->getAllProductsRaw();
        foreach ($products as $product) {
            if ($product['id'] == $id) {
                return $product;
            }
        }
        return null;
    }
    
    // Tambah produk baru
    public function addProduct($id, $name, $kategori, $harga, $foto) {
        $products = $this->getAllProductsRaw();
        $newProduct = [
            'id' => $id,
            'name' => $name,
            'kategori' => $kategori,
            'harga' => $harga,
            'foto' => $foto
        ];
        $products[] = $newProduct;
        $this->saveProducts($products);
        
        // Set properties untuk instance ini
        $this->setId($id)
             ->setName($name)
             ->setKategori($kategori)
             ->setHarga($harga)
             ->setFoto($foto);

        return $this;
    }
    
    // Update produk
    public function updateProduct($id, $name, $kategori, $harga, $foto = null) {
        $products = $this->getAllProductsRaw();
        foreach ($products as &$product) {
            if ($product['id'] == $id) {
                $product['name'] = $name;
                $product['kategori'] = $kategori;
                $product['harga'] = $harga;
                
                if ($foto) {
                    if ($product['foto'] !== $foto && file_exists($product['foto'])) {
                        unlink($product['foto']);
                    }
                    $product['foto'] = $foto;
                }
                
                // Update instance properties
                $this->setId($id)
                     ->setName($name)
                     ->setKategori($kategori)
                     ->setHarga($harga);
                if ($foto) {
                    $this->setFoto($foto);
                } else {
                    $this->setFoto($product['foto']);
                }
                
                break;
            }
        }
        $this->saveProducts($products);
        return $this;
    }
    
    // Hapus produk
    public function deleteProduct($id) {
        $products = $this->getAllProductsRaw();
        $newProducts = [];
        $deleted = false;
        
        foreach ($products as $product) {
            if ($product['id'] == $id) {
                if (file_exists($product['foto'])) {
                    unlink($product['foto']);
                }
                $deleted = true;
            } else {
                $newProducts[] = $product;
            }
        }
        
        $this->saveProducts($newProducts);
        return $deleted;
    }
    
    // Simpan data ke session
    private function saveProducts($products) {
        $_SESSION['products'] = $products;
    }
    
    // Konversi objek ke array (untuk kompatibilitas)
    public function toArray() {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'kategori' => $this->kategori,
            'harga' => $this->harga,
            'foto' => $this->foto
        ];
    }
}
?>