<?php

use App\Http\Controllers\TablecrudController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome2');
});

Route::get('/poststring', function () {
    return view('poststring');
});

Route::controller(TablecrudController::class)->group(function () {
    Route::get('showdata',  'index')->name('showdata');
    // create
    Route::get('post-data', 'store')->name('post-data');

    Route::post('post-action', 'create')->name('post-action');

    Route::get('edit-send', 'edit')->name('edit-send');
    Route::put('edit-action', 'update')->name('edit-action');

    Route::post('delete', 'destroy')->name('delete');
});

Route::view('/home',  'home');
Route::get('/about', fn () => view('about'));
Route::get('/contact', fn () => view('contact'));
Route::get('/galerry', fn () => view('galerry'));
Route::get('users', function () {
    $users = [
        ['id' => 1, 'name' => 'jhon doe', 'email' => '2aJQz@example.com'],
        ['id' => 2, 'name' => 'Jane Doe', 'email' => '2sferQz@example.com'],
    ];
    return view('users.index', compact('users'));
});
