<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Dipsionary - Verifikasi Email</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-[#f2ede3] min-h-screen flex items-center justify-center">

    <div class="relative w-[950px] h-[600px] bg-cover bg-center"
        style="background-image: url('{{ asset('images/book_frame.png') }}')">

        <!-- Logo dan Judul di sisi kiri -->
        <div class="absolute top-[40%] left-[5%] text-white text-center z-10">
            <img src="{{ asset('images/logo_dipsionary.png') }}" alt="Logo Dipsionary" class="h-20 mx-auto mb-2">
        </div>

        <!-- Form Verifikasi di sisi kanan buku -->
        <div class="absolute top-[15%] right-[5%] z-10 w-[300px]">

            @if (session('status'))
                <div class="mb-2 text-green-500 text-sm">
                    {{ session('status') }}
                </div>
            @endif

            <div class="bg-[#d9d9d9] rounded-xl px-6 py-5">
                <!-- Pesan Verifikasi -->
                <p class="text-lg text-black mb-4">
                    {{ __('Terima kasih sudah mendaftar! Sebelum mulai, yuk cek email kamu dan klik link verifikasi yang kami kirim. Belum dapat emailnya? Tenang, kami bisa kirim ulang kok!') }}
                </p>

                @if (session('status') == 'verification-link-sent')
                    <div class="mb-4 font-medium text-sm text-green-600">
                        {{ __('Link verifikasi baru sudah kami kirim ke email yang kamu pakai saat mendaftar.') }}
                    </div>
                @endif

                <!-- Tombol Kirim Ulang Email Verifikasi -->
                <form method="POST" action="{{ route('verification.send') }}">
                    @csrf
                    <button type="submit" class="w-full bg-[#d2c291] hover:bg-[#C3b58e] text-black py-2 rounded-full mb-4">
                        {{ __('Kirim Ulang Email Verifikasi') }}
                    </button>
                </form>

                <!-- Tombol Keluar -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        {{ __('Log Out') }}
                    </button>
                </form>
            </div>
        </div>
    </div>

</body>

</html>
