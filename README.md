# Proyek Submission Compfest 17: SEA Catering App

Aplikasi web ini dibuat sebagai bagian dari proses seleksi untuk Software Engineering Academy COMPFEST 17. Aplikasi ini
bertujuan untuk menyediakan platform bagi SEA Catering, sebuah layanan katering makanan sehat, untuk mengelola pesanan,
langganan, dan interaksi dengan pelanggan.

---

## 🚀 Tech Stack

- **Framework Backend:** Laravel 12
- **Framework Frontend:** Livewire 3
- **Styling:** Tailwind CSS 3 & Daisy UI
- **Interaktivitas Tambahan:** Alpine.js (via Livewire)
- **Database:** MySQL
- **Server Development:** Vite

---

## 🛠️ Cara Instalasi dan Menjalankan Proyek

Pastikan Anda sudah memiliki PHP, Composer, dan Node.js/NPM di lingkungan Anda.

1. **Clone Repositori**
   ```bash
   git clone [https://github.com/keyfarel/compfest-sea-submission.git](https://github.com/keyfarel/compfest-sea-submission.git)
   cd compfest-sea-submission
   ```

2. **Install Dependensi Backend**
   ```bash
   composer install
   ```

3. **Setup File Environment**
   Salin file `.env.example` menjadi `.env`.
   ```bash
   cp .env.example .env
   ```

4. **Generate Kunci Aplikasi**
   ```bash
   php artisan key:generate
   ```

5. **Install Dependensi Frontend**
   ```bash
   npm install
   ```

6. **Jalankan Semua Server Development**
   Jalankan perintah ini di **satu terminal**. Perintah ini akan menyalakan server Vite dan server Laravel (
   `php artisan serve --port=8001`) secara bersamaan.
   ```bash
   npm start
   ```

7. **Buka di Browser**
   Buka browser Anda dan kunjungi alamat berikut:
   [http://localhost:8001](http://localhost:8001)
