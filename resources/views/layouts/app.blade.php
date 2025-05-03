<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dipsionary</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Karla:wght@400;600&display=swap');
        body {
            font-family: 'Karla', sans-serif;
        }
    </style>
</head>

<body class="min-h-screen" style="background-color: #F9F5EA;">
    <!-- Navbar -->
    <!-- Navbar -->
    <nav class="bg-[#3C3B6E] fixed w-full z-10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">

                <!-- Logo -->
                <div class="flex-shrink-0">
                    <a href="/" class="flex items-center">
                        <img class="h-10 w-auto" src="{{ asset('images/logo.png') }}" alt="Dipsionary Logo">
                    </a>
                </div>

                <!-- Search Bar -->
                <div class="flex-grow max-w-3xl w-full">
                    <div class="relative h-10 w-full mx-auto">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <svg class="w-5 h-5 text-[#414140]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                            </svg>
                        </div>
                        <input type="text"
                            class="w-full h-full pl-10 pr-4 rounded-lg bg-[#F9F5EA] text-[#414140] placeholder:text-[#414140]/70 focus:outline-none focus:ring-2 focus:ring-[#3C3B6E]"
                            placeholder="Mau cari apa dips?">
                    </div>
                </div>

                <!-- Icons Section -->
                <div class="flex items-center space-x-6">
                    <!-- History Icon -->
                    <a href="#" class="text-[#F9F5EA] hover:text-white flex items-center justify-center h-10 w-10">
                        <svg class="h-8 w-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </a>

                    <!-- Bookmark Icon -->
                    <a href="#" class="text-[#F9F5EA] hover:text-white flex items-center justify-center h-10 w-10">
                        <svg class="h-8 w-8" fill="#F9F5EA" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z"/>
                        </svg>
                    </a>

                    <!-- Profile Dropdown -->
                    <div class="relative flex items-center justify-center h-10 w-10" x-data="{ open: false }">
                        <button @click="open = !open" class="text-[#F9F5EA] hover:text-gray-300 focus:outline-none">
                            <svg class="h-8 w-8" fill="#F9F5EA" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                            </svg>
                        </button>

                        <!-- Dropdown Menu -->
                        <div x-show="open" @click.away="open = false" class="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5">
                            <div class="py-1">
                                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Profil</a>
                                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Logout</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="flex flex-col items-center justify-center min-h-screen bg-[#FAF5E9] p-4 pt-0">
        @yield('content')
    </div>

    <!-- Alpine.js -->
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
</body>
</html>
