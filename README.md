# Wash Wish Woosh

Wash Wish Woosh adalah aplikasi web pemesanan layanan cuci dan salon mobil panggilan berbasis Laravel. Aplikasi ini menyediakan halaman informasi layanan, daftar harga, form pemesanan, dashboard admin dengan autentikasi, serta fitur ulasan pelanggan.

## Fitur Utama

### Website
- Halaman utama dengan hero section, daftar layanan, dan testimoni pelanggan
- Halaman tentang kami, galeri, harga, dan detail layanan
- Form pemesanan dengan pemilihan paket, ukuran mobil, tanggal, jam, domisili, dan alamat
- Filter jam layanan yang sudah dipesan (anti double booking di client-side)
- Validasi data pemesanan sebelum disimpan
- Konfirmasi pesanan setelah berhasil dikirim
- Form ulasan pelanggan berdasarkan kode pesanan (hanya untuk pesanan yang sudah selesai)

### Admin Panel
- Autentikasi admin dengan session-based login (username + password bcrypt)
- Rate limiting 5 percobaan per menit pada login
- Session regeneration untuk mencegah session fixation
- Dashboard dengan ringkasan status pesanan (warna-coded)
- Mengubah status pesanan (Baru, Dikonfirmasi, Dikerjakan, Selesai, Dibatalkan)
- Menghapus pesanan beserta ulasan terkait
- Menghapus ulasan secara individual
- Melihat daftar ulasan pelanggan

### Keamanan
- CSRF protection pada semua form
- Rate limiting pada admin login
- Session regeneration setelah autentikasi
- Admin credentials dari environment variable (.env)
- APP_DEBUG=false di production

## Teknologi

| Teknologi | Versi |
|-----------|-------|
| PHP | 8.3+ |
| Laravel | 13 |
| Blade Template | - |
| Tailwind CSS | 4.3 |
| Vite | 8.1 |
| MySQL | - |
| Vanilla JavaScript | - |

## Struktur Folder

```text
app/
  Http/
    Controllers/         Controller aplikasi (Home, Page, Order, Review, Service, Admin)
    Middleware/           Middleware AdminAuth (autentikasi admin)
  Models/                Model Order, Review, Service
config/
  admin.php              Konfigurasi admin credentials dari .env
database/
  migrations/            Struktur tabel database
  seeders/               Seeder data awal dari CSV
public/
  assets/
    images/              Gambar website (favicon, layanan, about)
    js/                  JavaScript (navbar, booking, testimonial slider)
  build/                 Compiled CSS dari Vite + Tailwind
resources/
  css/app.css            Tailwind entry point + custom CSS
  views/
    layouts/             Layout utama (app.blade.php, admin.blade.php)
    partials/            Navbar dan footer
    home/                Halaman utama
    pages/               About, gallery, pricing
    services/            Detail layanan
    orders/              Form pesanan dan konfirmasi
    reviews/             Form ulasan
    admin/               Login dan dashboard admin
    errors/              Halaman 404
routes/
  web.php                Semua route web
storage/
  data/                  Data CSV awal (pesanan.csv, ulasan.csv)
  framework/             Compiled views, cache, sessions
```

## Konfigurasi Database

Project ini menggunakan MySQL. Buat database terlebih dahulu, lalu konfigurasi `.env`:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=wash_wish_woosh
DB_USERNAME=root
DB_PASSWORD=
```

## Cara Menjalankan

### 1. Nyalakan MySQL

Jika menggunakan XAMPP, start `MySQL Database` dari XAMPP Manager.

### 2. Install dependency

```bash
composer install
npm install
```

### 3. Siapkan file `.env`

```bash
cp .env.example .env
php artisan key:generate
```

Edit `.env` dan isi konfigurasi database serta admin credentials:

```env
DB_DATABASE=wash_wish_woosh
DB_USERNAME=root
DB_PASSWORD=

ADMIN_USERNAME=admin
ADMIN_PASSWORD=$2y$12$...    # bcrypt hash dari passwordmu
```

Generate hash password admin:

```bash
php artisan tinker
# Ketik di tinker:
echo \Illuminate\Support\Facades\Hash::make('passwordmu');
# Copy hasilnya ke ADMIN_PASSWORD di .env
```

### 4. Jalankan migration dan seeder

```bash
php artisan migrate
php artisan db:seed
```

### 5. Build frontend assets

```bash
npm run build
```

### 6. Jalankan server

```bash
php artisan serve
```

Buka: `http://127.0.0.1:8000`

## Admin Panel

Buka: `http://127.0.0.1:8000/admin`

Login dengan credentials yang sudah dikonfigurasi di `.env`.

## Route

| URL | Method | Fungsi |
|-----|--------|--------|
| `/` | GET | Halaman utama |
| `/about` | GET | Halaman tentang kami |
| `/galeri` | GET | Halaman galeri |
| `/harga` | GET | Halaman daftar harga |
| `/kontak` | GET | Form pemesanan |
| `/pesanan` | POST | Menyimpan pesanan |
| `/ulasan` | GET | Form ulasan |
| `/ulasan` | POST | Menyimpan ulasan |
| `/cuci` | GET | Detail layanan cuci mobil |
| `/interior` | GET | Detail layanan interior |
| `/eksterior` | GET | Detail layanan eksterior |
| `/kaca` | GET | Detail layanan kaca |
| `/mesin` | GET | Detail layanan mesin |
| `/ban` | GET | Detail layanan ban & velg |
| `/admin/login` | GET | Halaman login admin |
| `/admin/login` | POST | Proses login admin |
| `/admin` | GET | Dashboard admin |
| `/admin` | POST | Update/hapus pesanan & ulasan |
| `/admin/logout` | POST | Logout admin |

## Tabel Database

| Tabel | Fungsi |
|-------|--------|
| `orders` | Data pesanan pelanggan (kode, nama, telepon, layanan, jadwal, status, dll) |
| `reviews` | Ulasan pelanggan (kode pesanan, rating 1-5, ulasan) |
| `users` | User bawaan Laravel |
| `sessions` | Penyimpanan session (digunakan untuk admin auth) |
| `cache` | Penyimpanan cache Laravel |
| `jobs` | Queue jobs Laravel |

## Deploy ke Hostinger

Lihat panduan lengkap di:

```text
DEPLOY_HOSTINGER.md
```

Atau jalankan script deploy:

```bash
bash deploy-hostinger.sh
```

## Troubleshooting

### Database tidak terhubung

Pastikan MySQL sudah menyala, lalu cek `.env` dan jalankan:

```bash
php artisan config:clear
php artisan migrate
```

### CSS/JS tidak muncul

Build ulang frontend assets:

```bash
npm run build
```

### Tab title salah

Clear compiled views:

```bash
php artisan view:clear
php artisan view:cache
```

### Admin login gagal

Pastikan `ADMIN_PASSWORD` berisi bcrypt hash, bukan plain text:

```bash
php artisan tinker
echo \Illuminate\Support\Facades\Hash::make('passwordmu')
```

### 500 Internal Server Error

```bash
php artisan config:clear
php artisan route:clear
php artisan view:clear
php artisan key:generate
```

Cek log error di `storage/logs/laravel.log`.

### Hard refresh browser

```text
Mac:     Cmd + Shift + R
Windows: Ctrl + Shift + R
```

## Dokumentasi Tambahan

- `DEPLOY_HOSTINGER.md` — Panduan deploy ke Hostinger
- `LAPORAN_PROJECT.md` — Laporan project
- `STRUKTUR_FOLDER_PROJECT.md` — Penjelasan struktur folder

## License

Project ini untuk keperluan UAS (Ujian Akhir Semester) mata kuliah Pemrograman Web.
