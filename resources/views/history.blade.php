@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8 max-w-5xl">
    <h1 class="text-3xl font-bold mb-6 text-[#3C3B6E]">Riwayat Pencarian</h1>

    @if($histories->isEmpty())
        <div class="bg-yellow-100 text-yellow-800 p-4 rounded-lg">
            Tidak ada riwayat pencarian.
        </div>
    @else
        <ul class="space-y-4">
            @foreach($histories as $history)
                <li class="bg-white p-6 rounded-lg shadow-md border border-gray-200 hover:shadow-lg transition">
                    <h2 class="text-xl font-semibold text-[#3C3B6E]">{{ $history->keyword }}</h2>
                    <p class="mt-3 text-gray-700">Pencarian dilakukan pada: {{ $history->created_at->format('d-m-Y H:i') }}</p>

                    <form method="POST" action="{{ route('history.delete', $history->id) }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-500 hover:bg-red-50 rounded-full transition-colors mt-4">
                            Hapus Riwayat
                        </button>
                    </form>
                </li>
            @endforeach
        </ul>

        <form method="POST" action="{{ route('history.delete-all') }}" class="mt-6">
            @csrf
            @method('DELETE')
            <button type="submit" class="px-4 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600 transition-colors">
                Hapus Semua Riwayat
            </button>
        </form>
    @endif
</div>
@endsection
