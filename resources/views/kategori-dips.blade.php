@extends('layouts.app')

@section('content')
<div class="container mx-auto py-10 max-w-5xl pt-24">
    <h1 class="text-3xl font-bold mb-6 text-[#3C3B6E]">Kategori Dips</h1>

    <p class="text-[#535049] mb-4">Jumlah item: {{ count($items) }}</p>

    @if(isset($message))
        <div class="bg-yellow-100 text-yellow-800 p-4 rounded-lg">
            {{ $message }}
        </div>
    @elseif($items->isEmpty())
        <div class="bg-yellow-100 text-yellow-800 p-4 rounded-lg">
            Tidak ada istilah dalam kategori ini.
        </div>
    @else
        <ul class="space-y-4">
            @foreach($items as $item)
                <li class="bg-white p-6 rounded-lg shadow-md border border-gray-200 hover:shadow-lg transition">
                    <h2 class="text-xl font-semibold text-[#3C3B6E]">{{ $item->istilah }}</h2>
                    <p class="text-gray-600 italic mt-1">{{ $item->cara_baca }}</p>
                    <p class="mt-3 text-gray-700">{{ $item->penjelasan }}</p>
                    <button 
                        type="button"
                        class="bookmark-button mt-4 px-4 py-1 bg-blue-600 text-white rounded"
                        data-istilah="{{ $item->istilah }}"
                        data-cara_baca="{{ $item->cara_baca }}"
                        data-penjelasan="{{ $item->penjelasan }}"
                    >
                        Bookmark
                    </button>
                </li>
            @endforeach
        </ul>
    @endif
</div>
@endsection