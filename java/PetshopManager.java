import java.util.ArrayList;
import java.util.Scanner;

// Deklarasi ArrayList untuk menyimpan daftar produk
static ArrayList<Petshop> daftarProduk = new ArrayList<>();
// Scanner untuk input pengguna
static Scanner scanner = new Scanner(System.in);

// Method untuk menambah produk baru ke daftar
public static void addProduk(int id, String name, String kategori, int harga) {
    daftarProduk.add(new Petshop(id, name, kategori, harga));
    System.out.println("Produk berhasil ditambahkan");
}

// Method untuk menampilkan semua produk
public static void showProduk() {
    if (daftarProduk.isEmpty()) {
        System.out.println("Tidak ada produk");
        return;
    }
    System.out.println("Daftar Produk");
    int i = 1;
    for (Petshop produk : daftarProduk) {
        System.out.println("Produk ke-" + i);
        System.out.println("ID: " + produk.getId());
        System.out.println("Nama: " + produk.getName());
        System.out.println("Kategori: " + produk.getKategori());
        System.out.println("Harga: " + produk.getHarga());
        System.out.println("----------------------");
        i++;
    }
}

// Method untuk memperbarui informasi produk berdasarkan ID
public static void updateProduk(int id, String name, String kategori, int harga) {
    for (Petshop produk : daftarProduk) {
        if (produk.getId() == id) {
            produk.setName(name);
            produk.setKategori(kategori);
            produk.setHarga(harga);
            System.out.println("Produk berhasil diperbarui");
            return;
        }
    }
    System.out.println("Produk tidak ditemukan");
}

// Method untuk menghapus produk berdasarkan ID
public static void deleteProduk(int id) {
    // Menghapus produk yang memiliki ID yang sesuai
    daftarProduk.removeIf(produk -> produk.getId() == id);
    System.out.println("Produk berhasil dihapus");
}

// Method untuk mencari produk berdasarkan nama
public static void cariProduk(String nama) {
    boolean found = false;
    for (Petshop produk : daftarProduk) {
        if (produk.getName().equalsIgnoreCase(nama)) {
            System.out.println("Produk Ditemukan:");
            System.out.println("ID: " + produk.getId());
            System.out.println("Nama: " + produk.getName());
            System.out.println("Kategori: " + produk.getKategori());
            System.out.println("Harga: " + produk.getHarga());
            System.out.println("----------------------");
            found = true;
        }
    }
    if (!found) {
        System.out.println("Produk tidak ditemukan");
    }
}

// Method utama untuk menjalankan program
public static void main(String[] args) {
    int pilihan;
    do {
        // Menampilkan menu utama
        System.out.println(
                "\nMenu:\n1. Tambah Produk\n2. Tampilkan Produk\n3. Update Produk\n4. Hapus Produk\n5. Cari Produk\n6. Keluar");
        System.out.print("Pilih menu: ");
        pilihan = scanner.nextInt();
        scanner.nextLine(); // Membersihkan buffer

        int id, harga;
        String name, kategori;

        // Switch case untuk memilih menu
        switch (pilihan) {
            case 1:
                // Input data untuk produk baru
                System.out.print("Masukkan ID: ");
                id = scanner.nextInt();
                scanner.nextLine();
                System.out.print("Masukkan Nama: ");
                name = scanner.nextLine();
                System.out.print("Masukkan Kategori: ");
                kategori = scanner.nextLine();
                System.out.print("Masukkan Harga: ");
                harga = scanner.nextInt();
                addProduk(id, name, kategori, harga);
                break;
            case 2:
                // Menampilkan semua produk
                showProduk();
                break;
            case 3:
                // Memperbarui data produk
                System.out.print("Masukkan ID produk yang ingin diupdate: ");
                id = scanner.nextInt();
                scanner.nextLine();
                System.out.print("Masukkan Nama Baru: ");
                name = scanner.nextLine();
                System.out.print("Masukkan Kategori Baru: ");
                kategori = scanner.nextLine();
                System.out.print("Masukkan Harga Baru: ");
                harga = scanner.nextInt();
                updateProduk(id, name, kategori, harga);
                break;
            case 4:
                // Menghapus produk berdasarkan ID
                System.out.print("Masukkan ID produk yang ingin dihapus: ");
                id = scanner.nextInt();
                deleteProduk(id);
                break;
            case 5:
                // Mencari produk berdasarkan nama
                System.out.print("Masukkan Nama produk yang ingin dicari: ");
                name = scanner.nextLine();
                cariProduk(name);
                break;
            case 6:
                // Keluar dari program
                System.out.println("Bye bye :>");
                break;
            default:
                // Penanganan input yang tidak valid
                System.out.println("Pilihan invalid!");
        }
    } while (pilihan != 6);

    // Menutup scanner setelah program selesai
    scanner.close();
}