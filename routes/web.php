<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\BookmarkController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Route;

// Halaman utama
Route::get('/', function () {
    return view('home');
})->name('home');

// Kategori & Search
Route::get('/kategori-umum', fn() => view('kategori-umum'));
Route::get('/search', fn() => view('search'));

// Auth routes
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Hanya untuk user yang login
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/history', [HistoryController::class, 'index'])->name('history');
    Route::get('/bookmark', [BookmarkController::class, 'index'])->name('bookmark');
});

// Halaman untuk menguji tampilan history
Route::get('/test-history-ui', function () {
    return view('history');
});

// Halaman untuk menguji tampilan bookmark
Route::get('/test-bookmark-ui', function () {
    return view('bookmark');
});

// Halaman untuk menguji tampilan profile
Route::get('/test-profile-ui', function () {
    return view('profile');
});

// Halaman untuk menguji tampilan kategori umum
Route::get('/test-kategori-umum-ui', function () {
    return view('kategori-umum');
});
// Halaman untuk menguji tampilan kategori dips
Route::get('/test-kategori-dips-ui', function () {
    return view('kategori-dips');
});

// Untuk hapus semua
Route::delete('/history', [HistoryController::class, 'clearAll'])->name('history.delete-all');

// Untuk hapus per item
Route::delete('/history/{id}', [HistoryController::class, 'destroy'])->name('history.delete');
