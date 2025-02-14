#include <iostream>
#include <string>
#include <list>

using namespace std;

class Petshop
{
    private:
        int id;
        string name;
        string kategori;
        int harga;

    public:
        Petshop()
        {
            this->id = 0;
            this->name = "";
            this->kategori = "";
            this->harga = 0;
        }

        Petshop(int id, string name, string kategori, int harga)
        {   
            this->id = id;
            this->name = name;
            this->kategori = kategori;
            this->harga = harga;
        }

        int get_id()
        {
            return this->id;
        }
        
        void set_id(int id)
        {
            this->id = id;
        }

        string get_name()
        {
            return this->name;
        }
        
        void set_name(string name)
        {
            this->name = name;
        }

        string get_kategori()
        {
            return this->kategori;
        }
        
        void set_kategori(string kategori)
        {
            this->kategori = kategori;
        }

        int get_harga()
        {
            return this->harga;
        }
        
        void set_harga(int harga)
        {
            this->harga = harga;
        }

        ~Petshop()
        {
            
        }
};

list<Petshop> daftarproduk;

void addProduk(int id, string name, string kategori, int harga)
{
    daftarproduk.push_back(Petshop(id, name, kategori, harga));
    cout << "Produk berhasil ditambahkan\n";
}

void showProduk()
{
    if(daftarproduk.empty())
    {
        cout << "Tidak ada produk\n";
        return;
    }
    cout << "Daftar Produk\n";
    int i = 0;
    for (auto& produk : daftarproduk)
    {   
        i++;
        cout << "Produk ke-" << i << "\n";
        cout << "ID: " << produk.get_id() << "\nNama: " << produk.get_name() << "\nKategori: " << produk.get_kategori()<< "\nHarga: " << produk.get_harga() << "\n\n";
    }
}

void updateProduk(int id, string name, string kategori, int harga)
{
    for (auto& produk : daftarproduk)
    {
        if (produk.get_id() == id)
        {
            produk.set_name(name);
            produk.set_kategori(kategori);
            produk.set_harga(harga);
            cout << "Produk berhasil diperbarui\n";
            return;
        }
    }
    cout << "Produk tidak ditemukan\n";
}

void deleteProduk(int id) {
    for (auto it = daftarproduk.begin(); it != daftarproduk.end(); it++) {
        if (it->get_id() == id)
        {
            daftarproduk.erase(it);
            cout << "Produk berhasil dihapus\n";
            return;
        }
    }
    cout << "Produk tidak ditemukan\n";
}

void cariProduk(string nama)
{
    bool found = false;
    for (auto& produk : daftarproduk)
    {
        if (produk.get_name() == nama)
        {
            cout << "ID: " << produk.get_id() << "\nNama: " << produk.get_name() << "\nKategori: " << produk.get_kategori()<< "\nHarga: " << produk.get_harga() << "\n\n";
            found = true;
        }
    }
    if (!found)
    {
        cout << "Produk tidak ditemukan.\n";
    }
}

int main()
{
    int pilihan;
    do
    {
        cout << "\nMenu:\n";
        cout << "1. Tambah Produk\n";
        cout << "2. Tampilkan Produk\n";
        cout << "3. Update Produk\n";
        cout << "4. Hapus Produk\n";
        cout << "5. Cari Produk\n";
        cout << "6. Keluar\n";
        cout << "Pilih menu: "; cin >> pilihan;

        int id, harga;
        string name, kategori;

        switch (pilihan)
        {
            case 1:
                cout << "Masukkan ID: "; cin >> id;
                cout << "Masukkan Nama: "; cin.ignore(); getline(cin, name);
                cout << "Masukkan Kategori: "; getline(cin, kategori);
                cout << "Masukkan Harga: "; cin >> harga;
                addProduk(id, name, kategori, harga);
                break;
            case 2:
                showProduk();
                break;
            case 3:
                cout << "Masukkan ID produk yang ingin diupdate: "; cin >> id;
                cout << "Masukkan Nama Baru: "; cin.ignore(); getline(cin, name);
                cout << "Masukkan Kategori Baru: "; getline(cin, kategori);
                cout << "Masukkan Harga Baru: "; cin >> harga;
                updateProduk(id, name, kategori, harga);
                break;
            case 4:
                cout << "Masukkan ID produk yang ingin dihapus: "; cin >> id;
                deleteProduk(id);
                break;
            case 5:
                cout << "Masukkan Nama produk yang ingin dicari: "; cin.ignore(); getline(cin, name);
                cariProduk(name);
                break;
            case 6:
                cout << "Keluar...\n";
                break;
            default:
                cout << "Pilihan tidak valid!\n";
        }
    } while (pilihan != 6);
    
    return 0;
}
