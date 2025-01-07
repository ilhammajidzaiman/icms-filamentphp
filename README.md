# iCMS Filamentphp

Content Management System

## Teknologi

-   Php 8.2
-   Laravel 11.x
-   Filamentphp v3.2
-   Filament Shield 3.2

## Instalasi

`Clone` project untuk memasang base project

```base
git clone <link github>
```

Install `vendor`

```base
composer install
```

Buat `key`, dan buat `symbolic link` untuk storage

```base
php artisan key:generate

php artisan storage:link
```

Jalankan `migration` dan `seeder`

```base
php artisan migrate

php artisan db:seed
```

## Pengaturan Shield

-   Install `filament-shield`

```base
php artisan shield:setup
```

```base
php artisan shield:install admin
```

-   Setting `filament-shield`

```base
php artisan shield:generate --all
```

```base
php artisan shield:super-admin
```

Buat role jika `belum ada`, anda harus `login` terlebih dahulu

```base
localhost/make-role
```
