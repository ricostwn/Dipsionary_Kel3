<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class NewPasswordController extends Controller
{
    /**
     * Menampilkan halaman form reset password (input password baru).
     *
     * @param Request $request
     * @param string|null $token
     * @return View
     */
    public function create(Request $request, ?string $token = null): View
    {
        // Mengirim variabel token dan email ke view agar dapat digunakan di form
        return view('auth.reset-password', [
            'token' => $token,
            'email' => $request->email,
        ]);
    }

    /**
     * Menangani permintaan reset password baru dan update password user.
     *
     * @param Request $request
     * @return RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        // Validasi input yang diterima dari form reset password
        $request->validate([
            'token' => ['required'],
            'email' => ['required', 'email'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        // Proses reset password dengan menggunakan broker password Laravel
        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function (User $user) use ($request) {
                // Update password user dan buat remember_token baru
                $user->forceFill([
                    'password' => Hash::make($request->password),
                    'remember_token' => Str::random(60),
                ])->save();

                // Event ketika password berhasil di-reset (bisa dipakai untuk logging, dll)
                event(new PasswordReset($user));
            }
        );

        // Jika proses reset berhasil, redirect ke halaman login dengan pesan sukses
        if ($status === Password::PASSWORD_RESET) {
            return redirect()->route('login')->with('status', __($status));
        }

        // Jika gagal, kembalikan ke halaman reset dengan input dan error yang sesuai
        return back()
            ->withInput($request->only('email'))
            ->withErrors(['email' => __($status)]);
    }
}
