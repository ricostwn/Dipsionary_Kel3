<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\BookmarkController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

// ==========================
// Halaman Home — Bebas Akses
// ==========================
Route::get('/', function () {
    return view('home');
})->name('home');

// ==========================
// Kategori & Search — Bebas Akses
// ==========================
Route::get('/kategori-umum', fn() => view('kategori-umum'));
Route::get('/search', fn() => view('search'));

// ==========================
// Autentikasi
// ==========================
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// ==========================
// Verifikasi Email
// ==========================
Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    return redirect()->route('home');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
    return back()->with('message', 'Link verifikasi telah dikirim!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

// ==========================
// Fitur yang butuh login & verifikasi
// ==========================
Route::middleware(['auth', 'verified'])->group(function () {
    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Update Password (fix error: Route [password.update] not defined)
    Route::put('/password', function (Request $request) {
        $request->validate([
            'current_password' => ['required', 'current_password'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $user = $request->user();
        $user->update([
            'password' => Hash::make($request->password),
        ]);

        return back()->with('status', 'Password berhasil diperbarui!');
    })->name('password.update');

    // History
    Route::get('/history', [HistoryController::class, 'index'])->name('history');
    Route::delete('/history', [HistoryController::class, 'clearAll'])->name('history.delete-all');
    Route::delete('/history/{id}', [HistoryController::class, 'destroy'])->name('history.delete');

    // Bookmark
    Route::get('/bookmark', [BookmarkController::class, 'index'])->name('bookmark');
});

// ==========================
// Halaman Testing UI — Opsional (untuk dev)
// ==========================
Route::get('/test-history-ui', fn() => view('history'));
Route::get('/test-bookmark-ui', fn() => view('bookmark'));
Route::get('/test-profile-ui', fn() => view('profile'));
Route::get('/test-kategori-umum-ui', fn() => view('kategori-umum'));
Route::get('/test-kategori-dips-ui', fn() => view('kategori-dips'));
