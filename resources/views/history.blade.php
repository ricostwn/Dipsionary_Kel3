@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-20 max-w-4xl">
  <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold mb-6 text-[#3C3B6E]">Riwayat Pencarian</h1>
        @unless($histories->isEmpty())
        <form method="POST" action="{{ route('history.delete-all') }}">
            @csrf
            @method('DELETE')
            <button type="submit" class="px-4 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600 transition-colors">
                Hapus Semua Riwayat
            </button>
        </form>
    @endunless
    </div>

    @if($histories->isEmpty())
    <div class="text-center mt-12">
        <img src="{{ asset('images/history_kosong.png') }}" alt="Empty history" class="mx-auto w-48 mb-4">
        <p class="text-[#6B7280] text-lg">Kamu belum melakukan pencarian istilah!</p>
    </div>
    @else
        <ul class="space-y-4">
            @foreach($histories as $history)
                <li class="bg-white p-6 rounded-lg shadow-md border border-gray-200 hover:shadow-lg transition">
                    <div class="flex flex-col gap-2">
                        <div class="flex justify-between items-start">
                            <h2 class="text-xl font-semibold text-[#3C3B6E]">{{ $history->keyword }}</h2>
                            <form method="POST" action="{{ route('history.delete', $history->id) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="px-4 py-2 bg-red-500 text-white rounded hover:bg-red-600 transition-colors">
                                    Hapus
                                </button>
                            </form>
                        </div>
                        <p class="text-gray-600 text-sm">Pencarian dilakukan pada: {{ $history->created_at->format('d-m-Y H:i') }}</p>
                    </div>
                </li>
            @endforeach
        </ul>
    @endif
</div>
@endsection
