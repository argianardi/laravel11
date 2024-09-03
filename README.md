## Mengatasi error php exam linux

buka file bernam 8.2.18
command nano ~bashrc
tambakan code export PATH="/opt/lampp/bin:$PATH"

## mengaktifkan apache dll

-   sudo /opt/lampp/lampp start

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

## Routing dan View

Ketika kita memulai belajar tentang framework apapun, salah satu hal pertama yang ingin kita pelajari adalah bagaimana cara routing di framework tersebut. Di sini, kita akan membahas routing dan view [ref](https://www.youtube.com/watch?v=ePRf2VrKuj8&list=PLRKMmwY3-5MyxehZjs_S_KBvI3pnPk0mi&index=2).

### Memahami Dasar Routing di Laravel

Routing adalah proses menghubungkan URL yang diakses oleh user dengan kode yang akan dieksekusi. Dalam Laravel, file web.php di dalam folder routes digunakan untuk mendefinisikan rute-rute aplikasi kita. Sebagai contoh, jika kita memiliki rute seperti ini di `routes/web.php`:

```php
Route::get('/', function () {
    return view('welcome');
});
```

Kode di atas mengarahkan user yang mengakses `/` (halaman utama) ke view welcome, yang merujuk pada file `welcome.blade.php` di dalam folder `resources/views`.

Jika kita mengganti rute ini menjadi:

```php
Route::get('/home', function () {
    return view('home');
});
```

Maka, saat mengakses `/home`, Laravel akan mencari file `home.blade.php` di folder `resources/views`. Jika file tersebut tidak ada, kita akan mendapatkan error View `[home]` not found.

### Menggunakan Routing View

Laravel menyediakan cara yang lebih cepat untuk membuat rute yang langsung mengarahkan ke view, tanpa harus menulis function yang mengembalikan view. Berikut contohnya:

```php
Route::view('/about', 'about');
```

Dengan cara ini, saat kita mengakses `/about`, Laravel akan langsung menampilkan view `about.blade.php`. Ini sangat berguna jika kita hanya perlu menampilkan halaman tanpa logika tambahan.

### Menangani Error View

Terkadang, ketika mencoba mengakses view yang tidak ada, seperti `/welcome` tanpa adanya file `welcome.blade.php`, kita akan melihat error View `[welcome]` not found. Untuk memperbaikinya, kita hanya perlu memastikan bahwa file view tersebut ada, atau mengubah rute untuk mengarah ke view yang benar.

### Menggunakan Data dalam View

Selain menampilkan halaman statis, sering kali kita ingin menampilkan data yang dinamis. Misalnya, kita dapat mengirimkan data ke view dengan cara berikut:

```php
Route::get('/users', function () {
    $users = [
        ['id' => 1, 'name' => 'John', 'email' => 'john@domain.com'],
        ['id' => 2, 'name' => 'Jane', 'email' => 'jane@domain.com']
    ];
    return view('users.index', compact('users'));
});
```

Dalam view `users.index.blade.php`, kita bisa melakukan loop untuk menampilkan data tersebut:

```php
@foreach ($users as $user)
    <p>{{ $user['name'] }} - {{ $user['email'] }}</p>
@endforeach
```

### Blade Templating Engine

Laravel menggunakan Blade sebagai templating engine, yang memungkinkan kita menulis kode PHP dalam view dengan sintaks yang lebih bersih dan mudah dibaca. Misalnya, kita bisa mengganti sintaks PHP tradisional seperti ini:

```php
<?php foreach ($users as $user): ?>
    <p><?php echo $user['name']; ?></p>
<?php endforeach; ?>
```

Dengan Blade, menjadi:

```php
@foreach ($users as $user)
    <p>{{ $user['name'] }}</p>
@endforeach
```

### Menggunakan Layout dengan Blade

Blade juga memungkinkan kita untuk menggunakan layout dan komponen, yang sangat berguna untuk menyusun template yang lebih kompleks. Misalnya, kita memiliki layout umum untuk seluruh halaman aplikasi kita. kita bisa membuat file `layout.blade.php` di folder `resources/views/layouts`:

```php
//  resources/views/layouts/layout.blade.php

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Laravel 11')</title>
</head>
<body>
    <nav>
        <a href="{{ url('/') }}">Home</a>
        <a href="{{ url('/about') }}">About</a>
        <a href="{{ url('/contact') }}">Contact</a>
    </nav>
    <div class="container">
        @yield('content')
    </div>
</body>
</html>
```

Kemudian, untuk halaman about, Anda bisa menggunakan layout ini:

```php
@extends('components.layout-component')

@section('title', 'About Us')

@section('content')
    <h1>About Us</h1>
    <p>Ini adalah halaman about.</p>
@endsection
```
