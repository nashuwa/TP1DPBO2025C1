<?php // Memulai blok kode PHP
class Product { // Mendefinisikan kelas Product
    private $dataFile = 'produk.json'; // File JSON untuk menyimpan data produk
    private $id; 
    private $name; 
    private $kategori; 
    private $harga;  
    private $foto; // Properti private untuk menyimpan path data produk

    public function __construct() { // Metode konstruktor yang berjalan ketika objek Product baru dibuat
        // Cek apakah file JSON ada, jika tidak buat file kosong
        if (!file_exists($this->dataFile)) {
            file_put_contents($this->dataFile, json_encode([])); // Membuat file JSON kosong jika belum ada
        }
    }

    // Getter Methods
    public function getId() { // Metode untuk mendapatkan ID produk
        return $this->id; 
    }

    public function getName() { // Metode untuk mendapatkan nama produk
        return $this->name; 
    }

    public function getKategori() { // Metode untuk mendapatkan kategori produk
        return $this->kategori;
    }

    public function getHarga() { // Metode untuk mendapatkan harga produk
        return $this->harga; 
    }

    public function getFoto() { // Metode untuk mendapatkan path foto produk
        return $this->foto; 
    }

    // Setter Methods
    public function setId($id) { // Metode untuk mengatur ID produk
        $this->id = $id; 
        return $this; 
    }

    public function setName($name) { // Metode untuk mengatur nama produk
        $this->name = $name;
        return $this; 
    }

    public function setKategori($kategori) { // Metode untuk mengatur kategori produk
        $this->kategori = $kategori; 
        return $this; 
    }

    public function setHarga($harga) { // Metode untuk mengatur harga produk
        $this->harga = $harga; 
        return $this; 
    }

    public function setFoto($foto) { // Metode untuk mengatur path foto produk
        $this->foto = $foto; 
        return $this; 
    }
    
    // Method untuk mengubah array produk menjadi array objek Product
    public function convertToProductObjects($productArray) { // Metode untuk mengkonversi array produk menjadi array objek Product
        $objects = []; // Inisialisasi array kosong untuk menyimpan objek produk
        foreach ($productArray as $item) { // Melakukan iterasi melalui setiap item dalam array produk
            $product = new Product(); // Membuat objek Product baru
            $product->setId($item['id']) // Mengatur ID produk dari item array
                   ->setName($item['name']) // Mengatur nama produk dari item array
                   ->setKategori($item['kategori']) // Mengatur kategori produk dari item array
                   ->setHarga($item['harga']) // Mengatur harga produk dari item array
                   ->setFoto($item['foto']); // Mengatur foto produk dari item array
            $objects[] = $product; // Menambahkan objek produk ke array objects
        }
        return $objects; // Mengembalikan array objek produk
    }
    
    // Ambil semua produk sebagai array objek Product
    public function getAllProducts() { // Metode untuk mendapatkan semua produk sebagai array objek Product
        $json = file_get_contents($this->dataFile); // Membaca isi file JSON
        $productArray = json_decode($json, true); // Mendekode JSON menjadi array asosiatif
        return $this->convertToProductObjects($productArray); // Mengkonversi array produk menjadi array objek Product
    }

    // Ambil semua produk sebagai array mentah 
    public function getAllProductsRaw() { // Metode untuk mendapatkan semua produk sebagai array mentah
        $json = file_get_contents($this->dataFile); // Membaca isi file JSON
        return json_decode($json, true); // Mendekode JSON menjadi array asosiatif dan mengembalikannya
    }
    
    // Ambil produk berdasarkan ID sebagai objek Product
    public function getProductById($id) { // Metode untuk mendapatkan produk berdasarkan ID sebagai objek Product
        $products = $this->getAllProductsRaw(); // Mendapatkan semua produk sebagai array mentah
        foreach ($products as $product) { // Melakukan iterasi melalui setiap produk
            if ($product['id'] == $id) { // Memeriksa apakah ID produk cocok dengan ID yang dicari
                $productObj = new Product(); // Membuat objek Product baru
                $productObj->setId($product['id']) // Mengatur ID produk
                          ->setName($product['name']) // Mengatur nama produk
                          ->setKategori($product['kategori']) // Mengatur kategori produk
                          ->setHarga($product['harga']) // Mengatur harga produk
                          ->setFoto($product['foto']); // Mengatur foto produk
                return $productObj; // Mengembalikan objek produk
            }
        }
        return null; // Mengembalikan null jika produk tidak ditemukan
    }
    
    // Ambil produk mentah berdasarkan ID (untuk kompatibilitas)
    public function getProductByIdRaw($id) { // Metode untuk mendapatkan produk mentah berdasarkan ID
        $products = $this->getAllProductsRaw(); // Mendapatkan semua produk sebagai array mentah
        foreach ($products as $product) { // Melakukan iterasi melalui setiap produk
            if ($product['id'] == $id) { // Memeriksa apakah ID produk cocok dengan ID yang dicari
                return $product; // Mengembalikan produk jika ditemukan
            }
        }
        return null; // Mengembalikan null jika produk tidak ditemukan
    }
    
    // Tambah produk baru
    public function addProduct($id, $name, $kategori, $harga, $foto) { // Metode untuk menambahkan produk baru
        $products = $this->getAllProductsRaw(); // Mendapatkan semua produk sebagai array mentah
        $newProduct = [ // Membuat array untuk produk baru
            'id' => $id, // Menetapkan ID produk
            'name' => $name, // Menetapkan nama produk
            'kategori' => $kategori, // Menetapkan kategori produk
            'harga' => $harga, // Menetapkan harga produk
            'foto' => $foto // Menetapkan foto produk
        ];
        $products[] = $newProduct; // Menambahkan produk baru ke array produk
        $this->saveProducts($products); // Menyimpan array produk yang diperbarui ke file JSON
        
        // Set properties untuk instance ini
        $this->setId($id) // Mengatur ID produk untuk instance saat ini
             ->setName($name) // Mengatur nama produk untuk instance saat ini
             ->setKategori($kategori) // Mengatur kategori produk untuk instance saat ini
             ->setHarga($harga) // Mengatur harga produk untuk instance saat ini
             ->setFoto($foto); // Mengatur foto produk untuk instance saat ini

        return $this; // Mengembalikan instance saat ini
    }
    
    // Update produk
    public function updateProduct($id, $name, $kategori, $harga, $foto = null) { // Metode untuk memperbarui produk
        $products = $this->getAllProductsRaw(); // Mendapatkan semua produk sebagai array mentah
        foreach ($products as &$product) { // Melakukan iterasi melalui setiap produk dengan referensi
            if ($product['id'] == $id) { // Memeriksa apakah ID produk cocok dengan ID yang diperbarui
                $product['name'] = $name; // Memperbarui nama produk
                $product['kategori'] = $kategori; // Memperbarui kategori produk
                $product['harga'] = $harga; // Memperbarui harga produk
                
                if ($foto) { // Memeriksa apakah foto baru disediakan
                    if ($product['foto'] !== $foto && file_exists($product['foto'])) { // Memeriksa apakah foto lama ada dan berbeda
                        unlink($product['foto']); // Menghapus file foto lama
                    }
                    $product['foto'] = $foto; // Memperbarui path foto produk
                }
                
                // Update instance properties
                $this->setId($id) // Mengatur ID produk untuk instance saat ini
                     ->setName($name) // Mengatur nama produk untuk instance saat ini
                     ->setKategori($kategori) // Mengatur kategori produk untuk instance saat ini
                     ->setHarga($harga); // Mengatur harga produk untuk instance saat ini
                if ($foto) { // Memeriksa apakah foto baru disediakan
                    $this->setFoto($foto); // Mengatur foto baru untuk instance saat ini
                } else {
                    $this->setFoto($product['foto']); // Mengatur foto yang ada untuk instance saat ini
                }
                
                break; // Keluar dari loop setelah produk ditemukan dan diperbarui
            }
        }
        $this->saveProducts($products); // Menyimpan array produk yang diperbarui ke file JSON
        return $this; // Mengembalikan instance saat ini
    }
    
    // Hapus produk
    public function deleteProduct($id) { // Metode untuk menghapus produk
        $products = $this->getAllProductsRaw(); // Mendapatkan semua produk sebagai array mentah
        $newProducts = []; // Inisialisasi array kosong untuk menyimpan produk yang tidak dihapus
        $deleted = false; // Inisialisasi flag untuk melacak apakah produk telah dihapus
        
        foreach ($products as $product) { // Melakukan iterasi melalui setiap produk
            if ($product['id'] == $id) { // Memeriksa apakah ID produk cocok dengan ID yang dihapus
                if (file_exists($product['foto'])) { // Memeriksa apakah file foto ada
                    unlink($product['foto']); // Menghapus file foto
                }
                $deleted = true; // Mengatur flag dihapus menjadi true
            } else {
                $newProducts[] = $product; // Menambahkan produk yang tidak dihapus ke array baru
            }
        }
        
        $this->saveProducts($newProducts); // Menyimpan array produk yang diperbarui ke file JSON
        return $deleted; // Mengembalikan status apakah produk telah dihapus
    }
    
    // Simpan data ke file JSON
    private function saveProducts($products) { // Metode privat untuk menyimpan data produk ke file JSON
        file_put_contents($this->dataFile, json_encode($products, JSON_PRETTY_PRINT)); // Menulis array produk ke file JSON dengan format yang rapi
    }
    
    // Konversi objek ke array (untuk kompatibilitas)
    public function toArray() { // Metode untuk mengkonversi objek Product menjadi array
        return [ // Mengembalikan array asosiatif dengan properti produk
            'id' => $this->id, // Menambahkan ID produk ke array
            'name' => $this->name, // Menambahkan nama produk ke array
            'kategori' => $this->kategori, // Menambahkan kategori produk ke array
            'harga' => $this->harga, // Menambahkan harga produk ke array
            'foto' => $this->foto // Menambahkan foto produk ke array
        ];
    }
}
?>