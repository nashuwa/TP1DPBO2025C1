class Petshop:
    def __init__(self, id=0, name="", kategori="", harga=0):
        self.__id = id
        self.__name = name
        self.__kategori = kategori
        self.__harga = harga
    # bagian constructor untuk inisialisasi default maupun parameterized di python

    def get_id(self):
        return self.__id
    # untuk membaca id

    def set_id(self, id):
        self.__id = id
    # untuk mengubah id

    def get_name(self):
        return self.__name
    # untuk membaca nama

    def set_name(self, name):
        self.__name = name
    # untuk mengubah nama

    def get_kategori(self):
        return self.__kategori
    # untuk membaca kategori

    def set_kategori(self, kategori):
        self.__kategori = kategori
    # untuk mengubah kategori

    def get_harga(self):
        return self.__harga
    # untuk membaca harga

    def set_harga(self, harga):
        self.__harga = harga
    # untuk mengubah harga

    def __str__(self):
        return (f"ID: {self.__id}\n"
                f"Nama: {self.__name}\n"
                f"Kategori: {self.__kategori}\n"
                f"Harga: {self.__harga}\n")
    # untuk menampilkan informasi list petshop dengan tampilan yang mudah untuk dibaca
    
    def __del__(self):
        try:
            print(f"Produk '{self.__name}' dengan ID {self.__id} dihapus dari memori.")
        except AttributeError:
            print("Produk dihapus dari memori.")

    # fungsi destructor

# mengubah modifier di python: public (tidak memakai _)
# protected memakai _
# private memakai __