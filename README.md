# WaruMa (Warung Mama)

WaruMa adalah aplikasi **Point of Sale (POS) dan manajemen inventaris** untuk membantu operasional warung: mengelola barang dan stok, mencatat penjualan, melihat katalog publik, serta memantau pemasukan dan biaya operasional.

## Fitur Utama

- **Kasir / POS** — cari dan filter barang, kelola keranjang, hitung total dan uang kembalian, simpan transaksi, kurangi stok, serta cetak struk.
- **Manajemen barang dan inventaris** — tambah, ubah, dan hapus barang; cari/filter katalog; pantau stok minimum; serta lakukan restock.
- **Kategori dan satuan** — kategori dan satuan menjadi data referensi yang dapat dipilih pada barang dan digunakan untuk mengelompokkan atau memfilter katalog. Kode saat ini tidak menyediakan halaman CRUD kategori atau satuan tersendiri.
- **Katalog publik** — pengunjung dapat mencari dan memfilter barang berdasarkan kategori tanpa masuk ke halaman admin.
- **Pencatatan operasional** — catat, ubah, dan hapus biaya operasional toko.
- **Dashboard dan laporan keuangan** — ringkasan omzet, HPP, laba, stok kritis, dan transaksi terbaru; laporan dapat difilter berdasarkan rentang tanggal.
- **Riwayat transaksi** — telusuri transaksi dan rincian barang terjual pada halaman laporan, termasuk pencarian berdasarkan nomor struk.
- **Manajemen profil** — lihat dan ubah username, unggah foto profil, serta ubah password.

## Tech Stack

| Teknologi | Versi/ketentuan di manifest |
|---|---|
| PHP | `^8.2` (PHP 8.2 atau kompatibel) |
| Laravel Framework | `^11.0` |
| Livewire | `^4.4` |
| Tailwind CSS | `^3.4.19` |
| Vite | `^5.0` |
| Database | SQLite adalah koneksi default di konfigurasi proyek dan `.env.example`; koneksi MySQL juga tersedia di konfigurasi Laravel. |

Versi di atas adalah batas versi yang ditentukan oleh `composer.json` dan `package.json`, bukan klaim versi patch yang terpasang.

## Struktur Database

Migrasi aplikasi membuat tabel berikut:

| Tabel | Fungsi |
|---|---|
| `users` | Akun pengguna aplikasi, username, password, dan foto profil. |
| `kategori` | Referensi kategori barang. |
| `satuan` | Referensi satuan barang, misalnya PCS atau KG. |
| `barang` | Data barang, foto, kode, harga beli/jual, stok, batas minimum, serta relasi kategori dan satuan. |
| `transaksi` | Data utama transaksi penjualan: kode transaksi, pengguna, total, pembayaran, kembalian, dan waktu transaksi. |
| `detail_transaksi` | Rincian barang, jumlah, harga beli/jual, dan subtotal untuk setiap transaksi. |
| `operasional` | Catatan biaya operasional, nominal, tanggal, catatan, dan pengguna pencatat. |
| `cache` dan `cache_locks` | Penyimpanan cache dan lock ketika driver database digunakan. |
| `jobs`, `job_batches`, dan `failed_jobs` | Antrean pekerjaan, kelompok pekerjaan, dan catatan pekerjaan yang gagal. |

Laravel juga membuat tabel `migrations` untuk melacak migrasi yang telah dijalankan.

## Instalasi dan Konfigurasi Lokal

### Prasyarat

- PHP **8.2 atau lebih baru yang kompatibel dengan `^8.2`**, beserta ekstensi PHP yang dibutuhkan Laravel.
- Composer.
- Node.js dan npm.
- MySQL jika ingin menggunakan MySQL (atau gunakan SQLite yang menjadi koneksi default proyek).
- Git.

### Langkah instalasi

1. **Clone repository**:

   ```bash
   git clone https://github.com/FairuzzIslami/waruma-app.git
   cd waruma-app
   ```

2. **Pasang dependensi PHP dan JavaScript**:

   ```bash
   composer install
   npm install
   ```

3. **Siapkan konfigurasi aplikasi**:

   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

   Atur nilai konfigurasi database di `.env` lokal. Jangan memasukkan kredensial database atau nilai rahasia lainnya ke README atau repository.

   **Untuk MySQL**, buat database terlebih dahulu, misalnya:

   ```sql
   CREATE DATABASE waruma_app CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
   ```

   Lalu atur variabel berikut di `.env` lokal menggunakan nilai milik lingkungan Anda:

   ```dotenv
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=waruma_app
   DB_USERNAME=isi_username_mysql_lokal
   DB_PASSWORD=isi_password_mysql_lokal
   ```

   Koneksi bawaan proyek adalah SQLite. Jika menggunakan SQLite, biarkan `DB_CONNECTION=sqlite` dan pastikan file `database/database.sqlite` tersedia.

   Migrasi proyek tidak membuat tabel `sessions`, sedangkan konfigurasi contoh memilih penyimpanan sesi database. Untuk instalasi lokal standar, tambahkan konfigurasi berikut ke `.env` agar sesi menggunakan file:

   ```dotenv
   SESSION_DRIVER=file
   ```

4. **Jalankan migrasi dan seeder**:

   `DatabaseSeeder` memanggil `UserSeeder`, `KategoriSeeder`, `SatuanSeeder`, dan `BarangSeeder`. Jalankan:

   ```bash
   php artisan migrate --seed
   ```

   Seeder membuat akun lokal berikut:

   | Username | Password |
   |---|---|
   | `ani` | `admin123` |

   Kredensial ini berasal dari seeder untuk keperluan pengembangan lokal. Segera ganti password setelah login dan jangan gunakan kredensial seed untuk lingkungan produksi.

5. **Buat tautan storage**:

   ```bash
   php artisan storage:link
   ```

   Langkah ini diperlukan karena aplikasi menyimpan foto barang dan foto profil pada disk `public`.

6. **Jalankan aplikasi**. Buka dua terminal di direktori proyek:

   ```bash
   npm run dev
   ```

   ```bash
   php artisan serve
   ```

   Buka alamat lokal yang ditampilkan oleh `php artisan serve` di browser.

## Tim Pengembang

- **Fairuz Aqila Islami** — Backend Developer & Database Architecture
- **Muhammad Hanif Irsyad** — Project Manager, Architecture Coordinator & Use Case Designer
- **Taufiq Agustian** — System Requirements Analyst & Frontend Developer
- **Asyfa Rainy** — Business Analyst & Requirements Identification
- **Rizky** — Backend Support & Initial Layout Designer
