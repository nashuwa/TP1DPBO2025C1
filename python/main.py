from mesinpetshop import Petshop

# List untuk menyimpan daftar produk petshop
daftar_produk = [] 

# Fungsi untuk menambahkan produk baru ke daftar
def add_produk(id, name, kategori, harga):
    # Mengecek apakah ID sudah ada dalam daftar
    for produk in daftar_produk:
        if produk.get_id() == id:
            print("Error: ID sudah ada. Gunakan ID unik.")  # Pesan jika ID duplikat
            return
    daftar_produk.append(Petshop(id, name, kategori, harga))  # Membuat objek Petshop dan menambahkannya ke daftar
    print("Produk berhasil ditambahkan")

# Fungsi untuk menampilkan semua produk di daftar
def show_produk():
    if not daftar_produk:
        print("Tidak ada produk")  # Menampilkan pesan jika daftar kosong
        return
    print("Daftar Produk")
    for i, produk in enumerate(daftar_produk, 1):  # Menampilkan semua produk dengan nomor urut
        print(f"Produk ke-{i}\n{produk}")

# Fungsi untuk memperbarui data produk berdasarkan ID
def update_produk(id, name, kategori, harga):
    for produk in daftar_produk:
        if produk.get_id() == id:  # Mencari produk berdasarkan ID
            produk.set_name(name)  # Memperbarui nama
            produk.set_kategori(kategori)  # Memperbarui kategori
            produk.set_harga(harga)  # Memperbarui harga
            print("Produk berhasil diperbarui")
            return
    print("Produk tidak ditemukan")  # Jika ID tidak ditemukan

# Fungsi untuk menghapus produk berdasarkan ID
def delete_produk(id):
    global daftar_produk
    for produk in daftar_produk:
        if produk.get_id() == id:
            daftar_produk.remove(produk)
            del produk  # Memicu destructor __del__
            print("Produk berhasil dihapus")
            return
    print("Produk tidak ditemukan")

# Fungsi untuk mencari produk berdasarkan nama
def cari_produk(nama):
    found = False
    for produk in daftar_produk:
        if produk.get_name().lower() == nama.lower():  # Pencarian nama tidak case-sensitive
            print(produk)
            found = True
    if not found:
        print("Produk tidak ditemukan")  # Pesan jika produk tidak ditemukan

# Fungsi utama untuk menjalankan menu interaktif
def main():
    while True:
        # Menu utama
        print("\nMenu:\n1. Tambah Produk\n2. Tampilkan Produk\n3. Update Produk\n4. Hapus Produk\n5. Cari Produk\n6. Keluar")
        pilihan = input("Pilih menu: ")

        if pilihan == '1':
            # Input data produk baru
            id = int(input("Masukkan ID: "))
            name = input("Masukkan Nama: ")
            kategori = input("Masukkan Kategori: ")
            harga = int(input("Masukkan Harga: "))
            add_produk(id, name, kategori, harga)
        elif pilihan == '2':
            show_produk()  # Menampilkan semua produk
        elif pilihan == '3':
            # Input data untuk memperbarui produk
            id = int(input("Masukkan ID produk yang ingin diupdate: "))
            name = input("Masukkan Nama Baru: ")
            kategori = input("Masukkan Kategori Baru: ")
            harga = int(input("Masukkan Harga Baru: "))
            update_produk(id, name, kategori, harga)
        elif pilihan == '4':
            # Input ID untuk menghapus produk
            id = int(input("Masukkan ID produk yang ingin dihapus: "))
            delete_produk(id)
        elif pilihan == '5':
            # Input nama produk yang ingin dicari
            nama = input("Masukkan Nama produk yang ingin dicari: ")
            cari_produk(nama)
        elif pilihan == '6':
            print("Bye bye :>")  # Keluar dari program
            break
        else:
            print("Pilihan invalid!")  # Pesan untuk input menu yang tidak valid

# Menjalankan fungsi main saat file dieksekusi langsung
if __name__ == "__main__":
    main()
