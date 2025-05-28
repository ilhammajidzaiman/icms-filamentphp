# iCMS

Ini adalah aplikasi `Content Management System` untuk mengelolaan halaman website

### Teknologi

-   Php
-   Bootstrap
-   Laravel
    -   Livewire
    -   Laravel Trend
    -   Sweet Alert
-   Filamentphp
    -   Filament Shield
    -   Themes
    -   Filament Tree
    -   Image Optimizer

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

### Filament Shield

```base
php artisan shield:generate --all
```

```base
php artisan shield:super-admin
```

### Buat Role jika belum ada

```base
localhost/developer/generate-role
```
