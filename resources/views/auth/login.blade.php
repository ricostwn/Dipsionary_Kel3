<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Dipsionary - Login</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-[#f2ede3] min-h-screen flex items-center justify-center">

    <div class="relative w-[950px] h-[600px] bg-cover bg-center"
        style="background-image: url('{{ asset('images/book_frame.png') }}')">

        <!-- Logo dan Judul di sisi kiri -->
        <div class="absolute top-[40%] left-[5%] text-white text-center z-10">
            <img src="{{ asset('images/logo_dipsionary.png') }}" alt="Logo Dipsionary" class="h-20 mx-auto mb-2">
        </div>

        <!-- Form Login di sisi kanan buku -->
        <div class="absolute top-[15%] right-[5%] z-10 w-[300px]">

            @if (session('status'))
                <div class="mb-2 text-green-500 text-sm">
                    {{ session('status') }}
                </div>
            @endif

            <div class="bg-[#d9d9d9] rounded-xl px-6 py-5">
                <form id="login" method="POST" action="{{ route('login') }}">
                    @csrf

                    <!-- Input Email -->
                    <div class="mb-3">
                        <label for="email" class="block text-sm text-black mt-4">e-mail</label>
                        <input id="email" type="email" name="email" value="{{ old('email') }}" required
                            class="w-full text-sm text-black border-0 border-b-2 border-[#5a5a5a] bg-transparent focus:ring-0 focus:outline-none">
                        @error('email')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Input Kata Sandi -->
                    <div class="mb-3">
                        <label for="password" class="block text-sm text-black mt-4">Kata Sandi</label>
                        <input id="password" type="password" name="password" required
                            class="w-full text-sm text-black border-0 border-b-2 border-[#5a5a5a] bg-transparent focus:ring-0 focus:outline-none">
                        @error('password')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </form>
            </div>

            <!-- Tombol Masuk -->
            <button type="submit" form="login"
                class="w-full bg-[#d2c291] hover:bg-[#C3b58e] text-black py-2 rounded-full mt-6">
                Masuk
            </button>

            <!-- Link untuk "Belum punya akun?" dan "Lupa password?" tepat di bawah tombol Masuk -->
            <div class="text-xs text-center text-white mt-4 space-y-1">
                <div>
                    Belum punya akun? <a href="{{ route('register') }}" class="underline text-blue-200">Daftar di sini</a>
                </div>
                <div>
                    <a href="{{ route('password.request') }}" class="underline text-blue-200">Lupa password?</a>
                </div>
            </div>

        </div>
    </div>

</body>

</html>
