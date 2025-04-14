
# 📊 Sistem Informasi Keuangan Kas Sekolah

Aplikasi berbasis web untuk mengelola pemasukan dan pengeluaran kas sekolah secara digital. Sistem ini membantu pihak sekolah mencatat transaksi keuangan, menampilkan grafik kas, serta mencetak laporan dalam bentuk PDF dan Excel.

---

## 🚀 Fitur Aplikasi

- ✅ Login Admin
- ✅ Dashboard Admin dengan AdminLTE
- ✅ Manajemen Kas Masuk
- ✅ Manajemen Kas Keluar
- ✅ Manajemen Kegiatan
- ✅ Laporan Keuangan (PDF & Excel)
- ✅ Grafik Kas (Public Dashboard)
- ✅ QRIS Tersedia di Halaman Utama
- ✅ CRUD Admin (Non Multi-user)
- ✅ Desain Responsif & Modern
- ✅ Siap dikonversi menjadi APK Android

---

## ⚙️ Teknologi yang Digunakan

| Kategori         | Teknologi                        |
|------------------|----------------------------------|
| Backend          | PHP 7.4+                         |
| Framework        | CodeIgniter 4.x                 |
| Frontend         | HTML, CSS, JavaScript           |
| Styling & UI     | Bootstrap 5, AdminLTE, Lucide Icons, Animate.css |
| Database         | MySQL                           |
| Grafik           | Chart.js                         |
| Laporan Export   | DomPDF (PDF), PhpSpreadsheet (Excel) |
| Web Server       | XAMPP / Apache                   |

---

## 📦 Requirement Sistem

- PHP 7.4 atau lebih baru
- MySQL / MariaDB
- Composer
- Web Server (Apache/Nginx, disarankan XAMPP)
- Ekstensi PHP berikut:
  - `intl`
  - `mbstring`
  - `json`
  - `xml`
  - `curl`
  - `gd`
  - `zip`

---

## 🛠️ Instalasi Proyek

1. **Clone atau download repositori:**
   ```bash
   git clone https://github.com/nama-kamu/kas-sekolah.git
   cd kas-sekolah
   ```

2. **Install dependency dengan Composer:**
   ```bash
   composer install
   ```

3. **Salin file konfigurasi environment:**
   ```bash
   cp .env.example .env
   ```

4. **Atur konfigurasi `.env`:**
   - Database:
     ```
     database.default.hostname = localhost
     database.default.database = kas_sekolah
     database.default.username = root
     database.default.password =
     database.default.DBDriver = MySQLi
     ```

5. **Import database:**
   - Gunakan `phpMyAdmin` atau MySQL CLI
   - Import file `kas_sekolah.sql` (tersedia di folder `database/`)

6. **Set base URL di `.env` (jika belum):**
   ```
   app.baseURL = 'http://localhost/kas_sekolah/'
   ```

7. **Pindahkan file index.php & .htaccess (opsional jika ingin menghapus /public dari URL):**
   - Pindahkan `public/index.php` dan `public/.htaccess` ke root project
   - Edit file `index.php`:
     ```php
     $pathsPath = realpath(__DIR__ . '/app/Config/Paths.php');
     ```
     ubah:
     ```php
     $publicPath = __DIR__;
     ```

8. **Jalankan di browser:**
   ```
   http://localhost/kas_sekolah/
   ```

---

## 👨‍💼 Akun Login Admin (Default)

| Username | Password |
|----------|----------|
| admin    | admin123 |

> Ganti password segera setelah login pertama!

---

## 🗂️ Struktur Folder Penting

```bash
├── app/
│   ├── Controllers/
│   ├── Models/
│   ├── Views/
│   │   ├── kas_masuk/
│   │   ├── kas_keluar/
│   │   ├── kegiatan/
│   │   ├── laporan/
│   │   └── layouts/     # Template AdminLTE
├── public/
│   ├── assets/          # AdminLTE, Bootstrap, Chart.js, dll
│   └── images/          # Logo, QRIS
├── writable/
└── .env
```

---

## 📤 Fitur Laporan

- 📄 Export Laporan PDF menggunakan DomPDF
- 📊 Export Laporan Excel menggunakan PhpSpreadsheet
- Filter tanggal dan jenis kas untuk cetak laporan

---

## 📱 Siap APK

Proyek ini siap dikonversi ke APK Android menggunakan:
- WebView + Android Studio
- Framework seperti **Capacitor.js**, **Flutter WebView**, atau **PWA**

---

## 🧑‍💻 Kontributor

**👨‍💻 Mohammad Diky Pradana**  
> GitHub: [@nama-kamu](https://github.com/nama-kamu)

---

## 📃 Lisensi

Aplikasi ini open source dan bebas dimodifikasi sesuai kebutuhan sekolah Anda.

---
