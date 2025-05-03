<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Dipsionary') }}</title>

    <!-- Tailwind & Alpine -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <!-- SweetAlert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Fonts -->
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Karla:wght@400;600&display=swap');
        body {
            font-family: 'Karla', sans-serif;
        }
    </style>

    <!-- Custom Style -->
    <style>
        .card {
            background: #f8f9fa;
            border-radius: 8px;
            padding: 20px;
            margin: 10px 0;
        }
    </style>
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen bg-[#F9F5EA]">
    <div class="min-h-screen bg-[#F9F5EA]"
        @include('layouts.navigation')

        <!-- Page Heading -->
        @hasSection('header')
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    @yield('header')
                </div>
            </header>
        @endif

        <!-- Page Content -->
        <main>
            @yield('content')
        </main>
    </div>
</body>
</html>
