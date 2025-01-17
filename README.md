<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Sistem Aplikasi untuk Mempermudah Pendataan Data Mahasiswa

Aplikasi ini bertujuan untuk mempermudah pendataan data mahasiswa dengan fitur-fitur sebagai berikut:

1. **Sistem Login**: Membuat sistem login untuk membedakan peran (kaprodi, dosen, mahasiswa).
2. **Fitur Kaprodi**: Kaprodi dapat melakukan CRUD data dosen dan kelas, serta melakukan ploting mahasiswa dan dosen, namun tidak dapat mengubah data mahasiswa.
3. **Fitur Dosen**: Dosen dapat melakukan CRUD data mahasiswa yang menjadi wali kelasnya, namun tidak dapat mengubah data mahasiswa kelas lain. Permintaan edit data dari mahasiswa akan dihapus setelah disetujui atau ditolak oleh dosen wali.
4. **Fitur Mahasiswa**: Mahasiswa hanya dapat melihat datanya sendiri dan dapat mengajukan permintaan edit data kepada dosen wali jika terjadi kesalahan pendataan. Hak akses akan hilang setelah selesai mengedit.
5. **Batas Kapasitas Kelas**: Isi kelas tidak boleh melebihi kapasitas yang ditentukan.
6. **Data Dummy**: Sistem diisi dengan data dummy yang terdiri dari 1 kaprodi, 5 dosen, dan 20 mahasiswa per kelas (10 mahasiswa per kelas), dengan 2 dosen wali dan 3 dosen biasa yang tidak memiliki akses ke data 1 kelas.
7. **Teknologi yang Digunakan**: Menggunakan Tailwind dan Laravel 10, bukan Laravel 11, meskipun referensi menggunakan Bootstrap.
[Schema Database](https://dbdiagram.io/d/Data-Mahasiswa-66a99f438b4bb5230eccaaef)

## Cara Penggunaan Aplikasi

1. **Clone Repository**
    ```bash
    git clone https://github.com/Azrxr/sistem_management_mahasiswa
    cd to/namefile
    code .
    ```

2. **Konfigurasi Database**
    - Salin file `.env.example` menjadi `.env`
    - Sesuaikan konfigurasi database di file `.env`
      ```env
      DB_CONNECTION=mysql
      DB_HOST=127.0.0.1
      DB_PORT=3306
      DB_DATABASE=nama_database
      DB_USERNAME=username_database
      DB_PASSWORD=password_database
      ```

3. **Instalasi Dependensi Laravel**
    ```bash
    composer install
    ```

4. **Instalasi Dependensi NPM**
    ```bash
    npm install
    ```

5. **Migrasi dan Seed Database**
    - Jalankan migrasi database
      ```bash
      php artisan migrate:fresh
      ```
    - Jalankan migrasi dengan data dummy
      ```bash
      php artisan migrate:fresh --seed
      ```

6. **Menjalankan Aplikasi**
    - Jalankan server Laravel or xampp
      ```bash
      php artisan serve
      ```
    - Jalankan Vite untuk asset bundling
      ```bash
      npm run dev
      ```

7. **Login dengan Kredensial**
- **Akses URL**: [http://127.0.0.1:8000/login]
    - **Dosen**: dosen@example.com / password
    - **Dosen wali 1**: dosenw1@example.com / password
    - **Dosen wali 2**: dosenw2@example.com / password
    - **Kaprodi**: kaprodi@example.com / password
    - **Mahasiswa**: dosen@example.com / password