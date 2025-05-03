<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dipsionary</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Tailwind & Alpine -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <!-- SweetAlert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Karla:wght@400;600&display=swap');
        body { font-family: 'Karla', sans-serif; }
    </style>
</head>
<body class="min-h-screen bg-[#F9F5EA]">
    <nav class="bg-[#3C3B6E] fixed w-full z-10">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-16">
                <!-- Logo -->
                <div>
                    <a href="/" class="flex items-center">
                        <img class="h-10" src="{{ asset('images/logo.png') }}" alt="Dipsionary Logo">
                    </a>
                </div>

                <!-- Search -->
                <div class="flex-grow max-w-3xl w-full">
                    <div class="relative h-10">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3">
                            <svg class="w-5 h-5 text-[#414140]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                            </svg>
                        </div>
                        <input type="text" placeholder="Mau cari apa dips?"
                               class="w-full h-full pl-10 pr-4 rounded-lg bg-[#F9F5EA] text-[#414140] focus:ring-2 focus:ring-[#3C3B6E]">
                    </div>
                </div>

                <!-- Icons -->
                <div class="flex items-center space-x-6">
                    <!-- History -->
                    <button class="text-[#F9F5EA] hover:text-white flex items-center justify-center h-10 w-10"
                            onclick="@auth window.location.href='{{ route('history') }}' @else showLoginAlert() @endauth">
                        <svg class="h-8 w-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </button>

                    <!-- Bookmark -->
                    <button class="text-[#F9F5EA] hover:text-white flex items-center justify-center h-10 w-10"
                            onclick="@auth window.location.href='{{ route('bookmark') }}' @else showLoginAlert() @endauth">
                        <svg class="h-8 w-8" fill="#F9F5EA" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z"/>
                        </svg>
                    </button>

                    <!-- Profile -->
                    <div x-data="{ open: false }" class="relative">
                        <button @click="open = !open" class="text-[#F9F5EA] hover:text-gray-300">
                            <svg class="h-8 w-8" fill="#F9F5EA" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                            </svg>
                        </button>

                        <div x-show="open" @click.away="open = false"
                             class="absolute right-0 mt-2 w-48 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5">
                            <div class="py-1">
                                @auth
                                    <a href="{{ route('profile.edit') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Profil</a>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button type="submit"
                                                class="w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Logout</button>
                                    </form>
                                @else
                                    <a href="{{ route('login') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Login</a>
                                    <a href="{{ route('register') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Register</a>
                                @endauth
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main -->
    <div class="flex flex-col items-center justify-center min-h-screen pt-24 p-4">
        <div class="bg-[#C3B58E] text-center p-6 rounded-xl max-w-3xl mb-6">
            <img src="{{ asset('images/logo-dipsionary.png') }}" class="w-[522.7px] h-[142px] mb-6 mx-auto">
            <p class="text-[17px] text-[#535049]">
                Website Dipsionary merupakan Kamus Daring yang dibuat untuk memudahkan pencarian, penggunaan, dan pembacaan arti kata dalam dunia perkuliahan di Universitas Diponegoro. Kami juga menyediakan fitur markah dan riwayat pencarian.
            </p>
        </div>
        <div class="max-w-3xl w-full grid grid-cols-1 md:grid-cols-2 gap-4">
            <div class="bg-[#C3B58E] p-4 rounded-lg">
                <h2 class="font-semibold text-[17px] mb-2 text-[#535049]">Umum</h2>
                <p class="text-[17px] text-[#535049]">Mata kuliah, Dosen, Magang, …</p>
            </div>
            <div class="bg-[#C3B58E] p-4 rounded-lg">
                <h2 class="font-semibold text-[17px] mb-2 text-[#535049]">Dips!</h2>
                <p class="text-[17px] text-[#535049]">Dipyo, Ganeo, ODM, SIAP, …</p>
            </div>
        </div>
    </div>

    <!-- Alert function -->
    <script>
        function showLoginAlert() {
            Swal.fire({
                title: 'Login Dulu!',
                text: 'Fitur ini hanya bisa digunakan jika kamu sudah login.',
                icon: 'warning',
                confirmButtonText: 'Login Sekarang',
                confirmButtonColor: '#3C3B6E'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "{{ route('login') }}";
                }
            });
        }
    </script>
</body>
</html>
