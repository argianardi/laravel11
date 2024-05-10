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
});
