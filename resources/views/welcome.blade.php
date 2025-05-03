<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Welcome to Laravel Blade</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet" />
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>
<body class="bg-gray-50 min-h-screen flex flex-col justify-center items-center p-6">
    <header class="mb-12 text-center">
        <h1 class="text-4xl font-bold text-gray-900 mb-2">Welcome to Laravel Blade</h1>
        <p class="text-gray-600 text-lg">A simple modern frontend with Tailwind CSS, Google Fonts, and Font Awesome</p>
    </header>
    <main class="max-w-xl w-full bg-white rounded-lg shadow-md p-8">
        <section class="text-center">
            <i class="fas fa-laptop-code text-indigo-600 text-6xl mb-4"></i>
            <h2 class="text-2xl font-semibold mb-2">Build your web app with Laravel & Blade</h2>
            <p class="text-gray-700 mb-6">This is a starter template using Laravel Blade templating engine with modern frontend tools.</p>
            <a href="https://laravel.com/docs/12.x/blade" target="_blank" class="inline-block bg-indigo-600 text-white px-6 py-3 rounded-md hover:bg-indigo-700 transition">Learn More</a>
        </section>
    </main>
    <footer class="mt-12 text-center text-gray-500 text-sm">
        &copy; {{ date('Y') }} Laravel Blade Starter. All rights reserved.
    </footer>
</body>
</html>
