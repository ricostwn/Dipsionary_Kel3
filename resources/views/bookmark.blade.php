@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8 max-w-7xl">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-[#3C3B6E]">Markah</h1>
        <form method="POST" action="{{ route('bookmark.delete-all') }}">
            @csrf
            @method('DELETE')
            <button type="submit" class="px-4 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600 transition-colors">
                Hapus Semua
            </button>
        </form>
    </div>

    @if($bookmarks->isEmpty())
        <div class="text-center mt-12">
            <img src="{{ asset('images/history_kosong.png') }}" alt="Empty bookmark" class="mx-auto w-48 mb-4">
            <p class="text-[#6B7280] text-lg">Kamu belum menyimpan istilah favorit!</p>
        </div>
    @else
        @foreach($bookmarks as $item)
            <div class="p-4 mb-4 bg-[#C5B862] rounded-lg">
                <h2 class="text-xl font-semibold">{{ $item->istilah }}</h2>
                <p class="italic">{{ $item->cara_baca }}</p>
                <p>{{ $item->penjelasan }}</p>
            </div>
        @endforeach
    @endif
</div>
@endsection