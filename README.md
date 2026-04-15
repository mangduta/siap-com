# SIAP.COM — Sistem Informasi Aduan Publik

Aplikasi berbasis Laravel untuk mengelola dan menyalurkan aduan masyarakat secara digital.

---

## Fitur

* Login Admin
* Form Pengaduan Masyarakat
* Manajemen Kategori Aduan
* Dashboard Admin
* Upload Foto Pendukung
* Pengiriman kode verifikasi email

---

## Cara Instalasi

1. Clone repository

```bash
git clone https://github.com/username/siap.com.git
cd siap.com
```

2. Install dependency

```bash
composer install
```

3. Copy file environment

```bash
cp .env.example .env
```

4. Generate application key

```bash
php artisan key:generate
```

5. Atur database di file `.env`

```env
DB_DATABASE=siap_com
DB_USERNAME=root
DB_PASSWORD=
```

6. Jalankan migration dan seeder

```bash
php artisan migrate --seed
```

7. Jalankan server

```bash
php artisan serve
```

---

## Demo Login Admin

Email: [contohadmin@gmail.com](mailto:contohadmin@gmail.com)
Password: Admin123

Akun admin dibuat otomatis melalui seeder.

---

## Konfigurasi Email (Opsional)

Untuk fitur pengiriman email, atur di file `.env`:

```env
MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=your_email@gmail.com
MAIL_PASSWORD=your_app_password
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=your_email@gmail.com
MAIL_FROM_NAME="SIAP.com"
```

Jika tidak diatur, email akan masuk ke log (tidak benar-benar dikirim).

---

## Teknologi

* Laravel
* MySQL
* Blade
* Alpine.js
* Bootstrap

---

## Catatan

Pastikan konfigurasi `.env` sudah sesuai sebelum menjalankan aplikasi.
