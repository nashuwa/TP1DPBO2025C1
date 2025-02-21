public class Petshop {
    private int id;
    private String name;
    private String kategori;
    private int harga; // menunjukkan bahwa atribut-atribut ini adalah private

    public Petshop() {
        this.id = 0;
        this.name = "";
        this.kategori = "";
        this.harga = 0;
    } // default constructor untuk inisialisasi atribut ke nilai default, contoh Petshop produk1;

    public Petshop(int id, String name, String kategori, int harga) {
        this.id = id;
        this.name = name;
        this.kategori = kategori;
        this.harga = harga;
    } // parameterized constructor untuk inisialisasi atribut langsung ke nilai yang dibutuhkan di parameter, contoh Petshop produk2(1, "Kandang Kucing", "Kandang", 300000);

    public int getId() {
        return id;
    } // membaca id

    public void setId(int id) {
        this.id = id;
    } // mengisi id

    public String getName() {
        return name;
    } // membaca nama

    public void setName(String name) {
        this.name = name;
    } // mengisi nama

    public String getKategori() {
        return kategori;
    } // membaca kategori

    public void setKategori(String kategori) {
        this.kategori = kategori;
    } // mengisi kategori

    public int getHarga() {
        return harga;
    } // membaca harga

    public void setHarga(int harga) {
        this.harga = harga;
    } // mengisi harga
}
