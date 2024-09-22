# Cara Instalasi

## Mempersiapkan Laravel

1. Masuk ke Direktori Laravel
2. Copy file `.env.example` dan rename ke `.env` kemudian edit sesuai dengan kebutuhan
3. run command dibawah yang berfungsi untuk menginstall package yang dibutuhkan

```
composer install
npm install
```
4. Run command `npm run build` untuk membuat generate css dan js
5. Run command `php artisan storage:link` untuk mengaktifkan penyimpanan pada Laravel
---
## Mempersiapkan Database dan Seeder (Data Dummy)
### Jika belum membuat database sesuai dengan env
- Jika belum mempunyai Database, run `php artisan migrate` untuk membuat database baru
- Kemudian melakukan mengisi database dengan data dummy dengan run command `php artisan db:seed`

### Jika sudah terdapat databse yang sesuai
- Melakukan run command `php artisan migrate:fresh --seed`
---
## Menjalankan Project
Buka 2 terminal terminal dan jalankan
- Terminal 1 menjalankan `npm run dev`
- Terminal lain menjalankan `php artisan serve`
# Booklap
