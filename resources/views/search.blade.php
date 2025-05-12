@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-20 max-w-4xl">
    <h1 class="text-2xl font-bold text-[#3C3B6E] mb-4">Hasil Pencarian untuk: "{{ $keyword }}"</h1>

    @if($results->isEmpty())
        <p class="text-[#535049]">Tidak ditemukan hasil untuk pencarian tersebut.</p>
    @else
        <ul class="space-y-4">
            @foreach($results as $item)
                <li class="bg-[#C5B862] rounded-lg p-4">
                    <h2 class="text-xl font-semibold text-[#3C3B6E]">{{ $item->istilah }}</h2>
                    <p class="italic text-[#535049]">({{ $item->cara_baca }})</p>
                    <p class="text-[#535049]">{{ $item->penjelasan }}</p>
                    <button 
                        type="button"
                        class="bookmark-button px-4 py-1 mt-2 bg-blue-600 text-white rounded"
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
