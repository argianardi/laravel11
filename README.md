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

## Mengorganisasi Komponen dengan Baik

Untuk menjaga struktur kode tetap rapi dan mudah dikelola, kita bisa memecah setiap bagian dari aplikasi menjadi komponen-komponen yang lebih kecil. Dengan demikian, setiap komponen memiliki tanggung jawab spesifik dan kode menjadi lebih modular [ref](https://www.youtube.com/watch?v=ayErMS6A4bk&list=PLRKMmwY3-5MyxehZjs_S_KBvI3pnPk0mi&index=3). Misalnya, dalam contoh ini komponen navbar dipecah menjadi Navbar, Link, dan DropdownLink. Setiap komponen ditempatkan dalam folder navbar untuk mengelompokkan semua komponen terkait navbar.

1. Buat Komponen Navbar<br/>
   Buat sebuah folder `/resources/viewscomponents/navbar` yang berisi beberapa file Blade seperti `navbar.blade.php`, `link.blade.php`, dan `dropdown-link.blade.php`. Setiap file mewakili komponen kecil dari navbar.

    - Code component link

        ```php
        {{-- resources/views/components/navbar/link.blade.php --}}

        <a {{ $attributes }} class="hover:bg-gray-700 hover:text-white px-3 py-2 text-sm font-medium text-gray-300 rounded-md">{{ $slot }}</a>
        ```

    - Code Component DropdownLink

        ```php
        {{-- resources/views/components/navbar/dropdown-link.blade.php --}}

        <a {{ $attributes }} class="block px-3 py-2 text-base font-medium text-white bg-gray-900 rounded-md">{{ $slot }}</a>
        ```

    - Code Component Navbar

        ```php
        {{-- resources/views/components/navbar/navbar.blade.php --}}

        <nav class="bg-gray-800">
            <div class="max-w-7xl sm:px-6 lg:px-8 px-4 mx-auto">
                <div class="flex items-center justify-between h-16">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <img class="w-8 h-8" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=500" alt="Your Company">
                        </div>
                        <div class="md:block hidden">
                            <div class="flex items-baseline ml-10 space-x-4">
                                <x-navbar.link href="/">Home</x-navbar.link>
                                <x-navbar.link href="/about">About</x-navbar.link>
                                <x-navbar.link href="/contact">Contact</x-navbar.link>
                                <x-navbar.link href="/galerry">Gallery</x-navbar.link>
                            </div>
                        </div>
                    </div>
                    <div class="md:hidden flex -mr-2">
                        <button type="button" class="hover:bg-gray-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800 relative inline-flex items-center justify-center p-2 text-gray-400 bg-gray-800 rounded-md" aria-controls="mobile-menu" aria-expanded="false">
                            <span class="absolute -inset-0.5"></span>
                            <span class="sr-only">Open main menu</span>
                            <svg class="block w-6 h-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                            </svg>
                            <svg class="hidden w-6 h-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

            <div class="md:hidden" id="mobile-menu">
                <div class="sm:px-3 px-2 pt-2 pb-3 space-y-1">
                    <x-navbar.dropdown-link href="/">Home</x-navbar.dropdown-link>
                    <x-navbar.dropdown-link href="/about">About</x-navbar.dropdown-link>
                    <x-navbar.dropdown-link href="/contact">Contact</x-navbar.dropdown-link>
                    <x-navbar.dropdown-link href="/galerry">Gallery</x-navbar.dropdown-link>
                </div>
            </div>
        </nav>
        ```

2. Menggunakan Komponen dalam Layout<br/>
   Setelah komponen dibuat, kita bisa memanggilnya dalam layout utama (`layout.blade.php`) menggunakan sintaks Blade seperti `<x-navbar.navbar />`.

    ```php
    {{-- resources/views/layouts/layout.blade.php --}}

    <!DOCTYPE html>
    <html class="h-full bg-gray-100">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://cdn.tailwindcss.com"></script>
        <title>@yield('title', 'Laravel 11')</title>
    </head>
    <body class="h-full">
        <div class="min-h-full">
            <x-navbar.navbar /> <!-- Menggunakan komponen Navbar -->
            @hasSection('heading')
                <header class="bg-white shadow">
                    <div class="max-w-7xl sm:px-6 lg:px-8 px-4 py-6 mx-auto">
                        <h1 class="text-3xl font-bold tracking-tight text-red-900">@yield('heading')</h1>
                    </div>
                </header>
            @endif

            <main>
                <div class="max-w-7xl sm:px-6 lg:px-8 px-4 py-6 mx-auto">
                    @yield('content')
                </div>
            </main>
        </div>
    </body>
    </html>
    ```
