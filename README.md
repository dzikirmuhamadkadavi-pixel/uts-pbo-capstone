# UTS PBO - Aplikasi CRUD Data Barang (Laravel 13)

Aplikasi pengelolaan data barang berbasis Laravel 13 yang menyimpan data pada **session** (`SESSION_DRIVER=file`), tanpa database.

- **Nama:** Dzikir Muhammad Kadavi
- **NIM:** 20251020058
- **Mata kuliah:** Pemrograman Berorientasi Objek (UCIC)

## Fitur

CRUD data barang dengan enam atribut: kode, nama, kategori, lokasi, jumlah, dan kondisi.
Pola yang dipakai: Route -> Controller -> Blade, dengan named routes, `@csrf`, dan `@method`.

| Method | URI | Nama Route | Aksi |
|---|---|---|---|
| GET | /barang | barang.index | index |
| GET | /barang/create | barang.create | create |
| POST | /barang | barang.store | store |
| GET | /barang/{kode} | barang.show | show |
| GET | /barang/{kode}/edit | barang.edit | edit |
| PUT | /barang/{kode} | barang.update | update |
| DELETE | /barang/{kode} | barang.destroy | destroy |

## Persyaratan

- PHP sesuai kebutuhan Laravel 13
- Composer

## Cara Menjalankan

1. Clone repositori:
   `git clone https://github.com/dzikirmuhamadkadavi-pixel/uts-pbo-capstone.git`
2. Masuk ke folder proyek: `cd uts-pbo-capstone`
3. Pasang dependensi: `composer install`
4. Siapkan file environment: `cp .env.example .env`
5. Buat application key: `php artisan key:generate`
6. Pastikan di file `.env` tertulis `SESSION_DRIVER=file`
7. Pastikan folder `storage` dan `bootstrap/cache` dapat ditulisi
8. Jalankan server: `php artisan serve`
9. Buka `http://127.0.0.1:8000/barang` di browser

## Catatan

- Data tersimpan di file session (`storage/framework/sessions/`), sehingga akan hilang jika session dihapus.
- Folder `vendor` dan file `.env` tidak disertakan di repositori.
