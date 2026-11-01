# Portofolio Fillial Anugrah M (PHP)

Tampilan sama seperti portofolio HTML sebelumnya. Bedanya, bagian foto sekarang berupa
**kartu ID yang tergantung pada tali (lanyard)**: bisa ditarik, diayun, dan diklik untuk dibalik.

## Cara menjalankan
Butuh PHP 7.4 atau lebih baru.

    cd portfolio-php
    php -S localhost:8000

Lalu buka http://localhost:8000. Bisa juga ditaruh di folder `htdocs` (XAMPP) atau `www` (Laragon).

## Struktur
- `index.php` – halaman utama, merangkai semua bagian
- `includes/data.php` – **semua teks & link** (nama, skill, proyek, kontak). Edit di sini.
- `includes/helpers.php` – fungsi kecil (escape HTML, ikon, versi aset)
- `partials/` – potongan tampilan (nav, hero, about, jobs, skills, projects, contact, footer)
- `partials/lanyard.php` – markup kartu ID
- `assets/js/lanyard.js` – fisika tali + kartu (tanpa library)
- `assets/css/lanyard.css` – gaya kartu & tali
- `assets/img/foto.jpg` – ganti file ini untuk mengganti foto di kartu

## Ganti foto / teks kartu
- Foto: timpa `assets/img/foto.jpg` (rasio potret 3:4 paling pas).
- Nama & jabatan di kartu diambil dari `profile` di `includes/data.php`.
- Teks di tali: ubah `'FILLIAL'` di `assets/js/lanyard.js`.
