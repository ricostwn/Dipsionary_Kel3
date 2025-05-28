<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\View\View;

class PasswordResetLinkController extends Controller
{
    /**
     * Menampilkan halaman form permintaan link reset password (input email)
     */
    public function create(): View
    {
        return view('auth.forgot-password');
    }

    /**
     * Menangani pengiriman link reset password melalui email
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        // Validasi input email
        $request->validate([
            'email' => ['required', 'email'],
        ]);

        // Mencoba mengirim link reset password ke email user
        $status = Password::sendResetLink(
            $request->only('email')
        );

        // Jika berhasil, kembali dengan pesan status sukses
        if ($status === Password::RESET_LINK_SENT) {
            return back()->with('status', __($status));
        }

        // Jika gagal, kembali dengan input email dan error message
        return back()
            ->withInput($request->only('email'))
            ->withErrors(['email' => __($status)]);
    }
}
