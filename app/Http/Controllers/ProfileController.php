<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $user = $request->user();

        // Mengisi data user dengan data yang sudah tervalidasi
        $user->fill($request->validated());

        // Jika ada perubahan pada email, reset email_verified_at
        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }

        $user->save();

        // Kembalikan ke halaman edit dengan status
        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        // Validasi password saat penghapusan akun
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        // Logout pengguna sebelum menghapus akun
        Auth::logout();

        // Hapus akun pengguna
        $user->delete();

        // Hapus sesi dan token CSRF untuk keamanan
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // Redirect ke halaman utama setelah penghapusan akun
        return Redirect::to('/');
    }
}
