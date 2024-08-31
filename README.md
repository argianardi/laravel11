## Mengatasi error php exam linux

buka file bernam 8.2.18
command nano ~bashrc
tambakan code export PATH="/opt/lampp/bin:$PATH"

## mengaktifkan apache dll

-   sudo /opt/lampp/lampp start

## buka pakai ip

php artisan serve --port 2023 --host 0.0.0.0

-   Buat model & DB, controller
    `php artisan mak:model tablecrud -mrc` <br/>
    `php artisan migrate`
-   menghapus table
    `php artisan migrate:rollback`
-   Menampilkan data dalam table

# Membuka Project dengan Menampilkan ip config

`php artisan serve --port 2023 --host 0.0.0.0`

# Menjalankan msql database dan apache

`sudo /opt/lampp/lampp start`
