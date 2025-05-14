
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

    <!-- Navigation -->
    @include('layouts.navigation')

    <!-- Main Content -->
    <div class="flex flex-col items-center justify-center min-h-screen pt-24 p-4">
        <div class="bg-[#C3B58E] text-center p-6 rounded-xl max-w-3xl mb-6">
            <img src="{{ asset('images/logo.png') }}" class="w-[522.7px] h-[142px] mb-6 mx-auto">
            <p class="text-[17px] text-[#535049]">
                Website Dipsionary merupakan Kamus Daring yang dibuat untuk memudahkan pencarian, penggunaan, dan pembacaan arti kata dalam dunia perkuliahan di Universitas Diponegoro. Kami juga menyediakan fitur markah dan riwayat pencarian.
            </p>
        </div>
        <div class="max-w-3xl w-full grid grid-cols-1 md:grid-cols-2 gap-4">
            <!-- Kategori Umum -->
            <a href="{{ route('kategori-umum') }}" class="bg-[#C3B58E] hover:bg-[#b4a77f] hover:shadow-md transition rounded-lg p-4 block group">
                <div class="flex items-center mb-2">
                    <span class="text-[20px] mr-2">🎓</span>
                    <h2 class="font-semibold text-[17px] text-[#3C3B6E]">Umum</h2>
                </div>
                <p class="text-[15px] text-[#3C3B6E]">Klik di sini untuk melihat istilah dalam kategori umum.</p>
            </a>

            <!-- Kategori Dips -->
            <a href="{{ route('kategori-dips') }}" class="bg-[#C3B58E] p-4 rounded-lg block hover:bg-[#b4a77f] transition">
                <div class="flex items-center mb-2">
                    <img src="{{ asset('images/logo-kotak.png') }}" alt="Dipsionary Logo" class="w-6 h-6 mr-2 object-contain">
                    <h2 class="font-semibold text-[17px] text-[#3C3B6E]">Dips!</h2>
                </div>
                <p class="text-[15px] text-[#3C3B6E]">Klik di sini untuk melihat istilah dalam kategori dips.</p>
            </a>
        </div>
    </div>

    <!-- Login Alert Script -->
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
