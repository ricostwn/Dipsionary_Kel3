<x-guest-layout>
    <div class="flex justify-center my-6 mb-6">
        <img src="{{ asset('images/logo.png') }}" alt="Dipsionary Logo" class="w-32 h-auto">
    </div>

    <div class="mb-6 text-sm text-gray-600">
        {{ __('Terima kasih sudah mendaftar! Sebelum mulai, yuk cek email kamu dan klik link verifikasi yang kami kirim. Belum dapat emailnya? Tenang, kami bisa kirim ulang kok!') }}
    </div>

    @if (session('status') == 'verification-link-sent')
        <div class="mb-4 font-medium text-sm text-green-600">
            {{ __('Link verifikasi baru sudah kami kirim ke email yang kamu pakai saat mendaftar.') }}
        </div>
    @endif

    <div class="mt-4 flex items-center justify-between">
        <form method="POST" action="{{ route('verification.send') }}">
            @csrf

            <div>
                <x-primary-button>
                    {{ __('Kirim Ulang Email Verifikasi') }}
                </x-primary-button>
            </div>
        </form>

        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <button type="submit" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                {{ __('Log Out') }}
            </button>
        </form>
    </div>
</x-guest-layout>
