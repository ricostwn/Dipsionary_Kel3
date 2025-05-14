<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dipsionary - Register</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-[#f2ede3] min-h-screen flex items-center justify-center">

    <div class="relative w-[1050px] h-[650px] bg-cover bg-center"
         style="background-image: url('{{ asset('images/book_frame.png') }}')">

        <!-- Logo di sisi kiri -->
        <div class="absolute top-[40%] left-[5%] text-white text-center z-10">
            <img src="{{ asset('images/logo_dipsionary.png') }}" alt="Logo Dipsionary" class="h-20 mx-auto mb-2">
        </div>

        <!-- Form Register di sisi kanan -->
        <div class="absolute top-[10%] right-[5%] z-10 w-[300px]">

            <div class="bg-[#d9d9d9] rounded-xl px-6 py-5">
                <form id="register" method="POST" action="{{ route('register') }}">
                    @csrf

                    <div class="mb-3">
                        <label for="name" class="block text-sm text-black mt-4">Nama</label>
                        <input id="name" type="text" name="name" value="{{ old('name') }}" required
                               class="w-full text-sm text-black border-0 border-b-2 border-[#5a5a5a] bg-transparent focus:ring-0 focus:outline-none">
                        @error('name')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="email" class="block text-sm text-black mt-4">e-mail</label>
                        <input id="email" type="email" name="email" value="{{ old('email') }}" required
                               class="w-full text-sm text-black border-0 border-b-2 border-[#5a5a5a] bg-transparent focus:ring-0 focus:outline-none">
                        @error('email')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="password" class="block text-sm text-black mt-4">Kata Sandi</label>
                        <input id="password" type="password" name="password" required
                               class="w-full text-sm text-black border-0 border-b-2 border-[#5a5a5a] bg-transparent focus:ring-0 focus:outline-none">
                        @error('password')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="password_confirmation" class="block text-sm text-black mt-4">Konfirmasi Kata Sandi</label>
                        <input id="password_confirmation" type="password" name="password_confirmation" required
                               class="w-full text-sm text-black border-0 border-b-2 border-[#5a5a5a] bg-transparent focus:ring-0 focus:outline-none">
                        @error('password_confirmation')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </form>
            </div>

            <button type="submit" form="register"
                    class="w-full bg-[#d2c291] hover:bg-[#C3b58e] text-black py-2 rounded-full absolute top-[85%] right-0">
                Daftar
            </button>

            <div class="text-xs text-center text-white mt-28">
                Sudah punya akun? <a href="{{ route('login') }}" class="underline text-blue-200">Masuk di sini</a>
            </div>
        </div>
    </div>

</body>
</html>