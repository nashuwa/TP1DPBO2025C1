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