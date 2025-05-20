<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <title>{{ config('app.name', 'Dipsionary') }}</title>

    <!-- Tailwind CSS & Alpine.js -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" rel="stylesheet" />

    <!-- Fonts -->
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Karla:wght@400;600&display=swap');
        body {
            font-family: 'Karla', sans-serif;
        }
    </style>

    <!-- Custom Styles -->
    <style>
        .card {
            background: #f8f9fa;
            border-radius: 8px;
            padding: 20px;
            margin: 10px 0;
        }
    </style>

    <!-- Vite Assets -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen bg-[#F9F5EA]">
    <div class="min-h-screen bg-[#F9F5EA]">
        @include('layouts.navigation')

        <!-- Page Heading -->
        @isset($header)
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endisset

        <!-- Page Content -->
        <main>
            @yield('content')
        </main>
    </div>

    <!-- Login Alert Script -->
    <script>
        function showLoginAlert() {
            Swal.fire({
                title: 'Login Dulu!',
                text: 'Fitur ini hanya bisa digunakan jika kamu sudah login.',
                icon: 'warning',
                showConfirmButton: false,
                timer: 2000,
                timerProgressBar: true
            });
        }
    </script>

    <!-- Flash Message Alert -->
    <script>
        @if(session('success'))
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: @json(session('success')),
                showConfirmButton: false,
                timer: 2000
            });
        @endif

        @if(session('error'))
            Swal.fire({
                icon: 'error',
                title: 'Oops!',
                text: @json(session('error')),
                showConfirmButton: false,
                timer: 2000
            });
        @endif
    </script>

    <!-- Additional scripts from child views -->
    @stack('scripts')
</body>
</html>
