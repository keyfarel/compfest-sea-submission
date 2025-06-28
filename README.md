# 🍱 SEA Catering App — Proyek Submission COMPFEST 17

Selamat datang di **SEA Catering App**! Aplikasi web ini merupakan bagian dari proses seleksi untuk **Software Engineering Academy (SEA) COMPFEST 17**. Aplikasi ini dirancang sebagai platform pemesanan dan manajemen layanan katering makanan sehat yang efisien, bertujuan untuk membantu SEA Catering mengelola pesanan, langganan, dan interaksi dengan pelanggan.

---

## ✨ Tautan Aplikasi (Live Demo)

Aplikasi ini sudah di-deploy dan dapat diakses secara publik melalui tautan berikut:

**[https://key-compfest-2025-production.up.railway.app/](https://key-compfest-2025-production.up.railway.app/)**

---

## 🚀 Tumpukan Teknologi (Tech Stack)

| Kategori          | Teknologi                  |
| :---------------- | :------------------------- |
| 🧠 **Backend** | Laravel 12                 |
| ⚡ **Frontend** | Livewire 3                 |
| 🎨 **Styling** | Tailwind CSS 3 & DaisyUI   |
| ✨ **Interaktivitas** | Alpine.js (via Livewire)   |
| 🗄️ **Database** | MySQL                      |
| 🔧 **Dev Server** | Vite                       |

---

## ⭐ Fitur Utama

Aplikasi ini dibangun dengan fungsionalitas yang mencakup berbagai level tantangan, dibagi menjadi fitur untuk pengunjung, pelanggan terdaftar, dan administrator.

### Fitur Umum (Untuk Semua Pengunjung)
- **Halaman Utama Informatif:** Menampilkan nama bisnis, slogan, deskripsi layanan, dan kontak manajer.
- **Navigasi Interaktif & Responsif:** Navbar yang berfungsi baik di desktop maupun mobile, dengan penanda halaman aktif.
- **Tampilan Paket Katering Dinamis:** Menampilkan daftar paket makanan dengan nama, harga, dan deskripsi. Terdapat tombol "See More Details" yang memunculkan pop-up informasi tambahan.
- **Bagian Testimonial:** Menampilkan ulasan pelanggan dalam format carousel/slider dan menyediakan formulir untuk mengirim testimonial baru (nama, pesan, rating 1-5).

### Fitur Pelanggan (Setelah Registrasi & Login)
- **Sistem Autentikasi Pengguna:**
    - Form **registrasi** dengan validasi (nama, email, password minimal 8 karakter dengan kombinasi huruf besar-kecil, angka, dan simbol).
    - Proses **login** dan **logout** yang aman.
- **Formulir Langganan Cerdas:**
    - Input nama, nomor HP aktif, pilihan paket, tipe makanan (minimal 1), dan hari pengiriman.
    - **Kalkulasi Harga Otomatis** berdasarkan `Harga Paket * Jumlah Tipe Makanan * Jumlah Hari * 4.3 minggu`.
- **Dashboard Pengguna:**
    - Melihat detail langganan aktif (paket, meal, hari, harga, status).
    - **Pause Subscription:** Fitur untuk menjeda langganan pada rentang tanggal tertentu.
    - **Cancel Subscription:** Fitur untuk membatalkan langganan secara permanen dengan konfirmasi.

### Fitur Administrator
- **Manajemen Data:** Akses penuh untuk mengelola data paket katering, pelanggan, dan pesanan.
- **Dashboard Analitik:**
    - **Filter berdasarkan Rentang Tanggal** untuk semua metrik.
    - Menampilkan jumlah **langganan baru** pada periode tertentu.
    - Menghitung **Monthly Recurring Revenue (MRR)** dari langganan aktif.
    - Melacak jumlah **Reactivation** (pelanggan yang aktif kembali).
    - Menampilkan total **langganan aktif** saat ini dalam bentuk grafik/tabel sederhana.

### Keamanan Aplikasi
- **Proteksi Terhadap XSS (Cross-Site Scripting):** Semua input dari pengguna di-escape sebelum ditampilkan untuk mencegah eksekusi skrip berbahaya.
- **Proteksi Terhadap SQL Injection:** Menggunakan *prepared statements* (fitur bawaan Laravel Eloquent) untuk semua interaksi database.
- **Implementasi CSRF Token:** Setiap form yang mengubah data (subscription, testimonial) dilindungi oleh CSRF token untuk mencegah serangan dari situs lain.
- **Validasi Input Server-Side & Client-Side:** Memastikan semua data yang masuk ke server sesuai format yang diharapkan (email valid, field wajib terisi, dll).
- **Password Hashing:** Semua password pengguna disimpan dalam bentuk hash menggunakan Bcrypt.

---

### Langkah-langkah Instalasi

#### 1. Clone Repositori
Salin repositori ini ke mesin lokal Anda dan masuk ke dalam direktori proyek.
```bash
git clone https://github.com/keyfarel/compfest-sea-submission.git
cd compfest-sea-submission
```

#### 2. Pasang Dependensi Backend
Instal semua paket PHP yang dibutuhkan oleh Laravel menggunakan Composer.
```bash
composer install
```

#### 3. Konfigurasi Lingkungan
Salin file `.env.example` untuk membuat file konfigurasi `.env` Anda.
```bash
cp .env.example .env
```
Selanjutnya, buat kunci enkripsi unik untuk aplikasi.
```bash
php artisan key:generate
```

#### 4. Siapkan Database
Buka file `.env` dan sesuaikan konfigurasi database (`DB_DATABASE`, `DB_USERNAME`, `DB_PASSWORD`).

> **Contoh Konfigurasi untuk Laragon (Default):**
> ```ini
> DB_CONNECTION=mysql
> DB_HOST=127.0.0.1
> DB_PORT=3306
> DB_DATABASE=sea_catering
> DB_USERNAME=root
> DB_PASSWORD=
> ```

Selanjutnya, buat database baru.

> **Panduan untuk Pengguna Laragon:**
> 1.  Jalankan Laragon dan klik **`Start All`** untuk mengaktifkan Apache & MySQL.
> 2.  Klik tombol **`Database`** pada dashboard. Ini akan membuka alat manajemen (seperti HeidiSQL).
> 3.  Buat database baru. Pastikan namanya **sama persis** dengan nilai `DB_DATABASE` di file `.env` Anda (contoh: `sea_catering`).

#### 5. Pasang Dependensi Frontend
Instal semua paket JavaScript yang dibutuhkan seperti Tailwind CSS dan Vite.
```bash
npm install
```

#### 6. Migrasi dan Seeding Database
Jalankan perintah ini untuk membuat semua tabel dan mengisinya dengan data awal (termasuk akun demo).
```bash
php artisan migrate --seed
```
> 💡 **Catatan:** Jika terjadi error, pastikan konfigurasi dan nama database di file `.env` sudah benar dan layanan database Anda berjalan.

#### 7. Buat Tautan Penyimpanan (Storage Link)
Buat tautan simbolis agar file yang diunggah dapat diakses secara publik.
```bash
php artisan storage:link
```
> ⚠️ **Peringatan:** Perintah ini hanya perlu dijalankan sekali.

#### 8. Jalankan Server Pengembangan
Gunakan perintah `npm start` untuk menjalankan server PHP dan server Vite secara bersamaan.
```bash
npm start
```

#### 9. Buka Aplikasi
Setelah semua server berjalan, aplikasi siap diakses melalui browser Anda.

**Buka alamat:** 👉 **[http://localhost:8001](http://localhost:8001)**

---

### 🔑 Akun Demo untuk Login
Setelah aplikasi berjalan, Anda dapat menggunakan akun demo berikut yang sudah dibuat melalui *seeder* untuk masuk dan menguji fungsionalitas:

**Akun Administrator:**
-   **Username:** `admin@example.com`
-   **Password:** `admin123`

**Akun Pengguna (User):**
-   **Username:** `user@example.com`
-   **Password:** `user1234`

---

Terima kasih telah meninjau proyek ini!
