# Proyek Backend

Aplikasi *Book List* adalah aplikasi untuk mengelola buku, penulis, dan rating. Aplikasi ini memungkinkan pengguna untuk menampilkan daftar buku, melihat penulis dengan rating tertinggi, serta menambahkan rating pada setiap buku.

## Requirements
- PHP 8.1
- Laravel 10

## Langkah 1: Clone Repository

Clone repository ini ke komputer Anda dengan perintah berikut:

bash
https://github.com/diahangelika/backend_test_angelika


## Langkah 2: Instalasi Dependensi

Setelah berhasil meng-clone repository, instal semua dependensi yang diperlukan menggunakan composer

bash
composer install


## Langkah 3: Membuat File .env

Salin file .env.example dan beri nama file tersebut .env. 

bash
cp .env.example .env


## Langkah ４: Menjalankan Migrasi

Setelah mengonfigurasi file .env, jalankan migrasi untuk membuat tabel-tabel yang diperlukan di database.

bash
php artisan migrate


## Langkah 5: Menjalankan Seeder

Untuk mengisi database dengan data awal, jalankan seeder.

bash
php artisan db:seed


## Langkah 6: Menjalankan Server

Untuk menjalankan server gunakan kode dibawah.

bash
php artisan serve
