# iCMS

Ini adalah aplikasi `Content Management System` untuk mengelolaan halaman website

### Teknologi

-   Php 8.x
-   Laravel 12.x
    -   Livewire 3.x
-   Filamentphp 4.x
    -   Filament Tree

### Instalasi

`Clone` repository

```base
git clone <link github>
```

Buat file `.env` salin file `.env.example`

```base
cp .env.example .env
```

Install `vendor`

```base
composer install
```

Setting database pada file `.env`.

Buat `key`, dan `symbolic link` untuk storage

```base
php artisan key:generate

php artisan storage:link
```

Jalankan `migration` dan `seeder`

```base
php artisan migrate

php artisan db:seed
```
