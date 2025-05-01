<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/kategori-umum', function () {
    return view('kategori-umum');
});

Route::get('/bookmark', function () {
    return view('bookmark');
});

Route::get('/search', function () {
    return view('search');
});

Route::get('/login', function () {
    return view('login');
});
