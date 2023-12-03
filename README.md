# Tes Junior Programmer Fast Print
## By Muhamad Zakaria Saputra


## Penggunaan
Aktifkan terlebih dahulu MySQL menggunakan XAMPP<br>
Lalu jalankan perintah:
```bash
php artisan migrate
php artisan db:seed --class=KategoriSeeder
php artisan db:seed --class=StatusSeeder
php artisan serve
```
Secara default aplikasi akan berjalan pada URL http://localhost:8000

## Dokumentasi
Tabel produk berada pada '/produk'<br>
Jadi, setelah anda selesai menjalankan perintah diatas, salinlah URL yang tertera di terminal<br>
(Secara default URL adalah http://localhost:8000)<br>
Lalu, tambahkan '/produk' di belakang URL tersebut (Contoh: http://localhost:8000/produk)<br>
Dan anda akan disuguhkan dengan halaman sebagai berikut:
![My Image](table.jpg)
