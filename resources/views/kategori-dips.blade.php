{{-- resources/views/kategori-dips.blade.php --}}
@extends('layouts.app')

@section('content')
@php
    // Variabel testing

    // Dummy data lengkap
    $dummyKategoriDips = [
        [
            'items' => [
                [
                    'id' => 1,
                    'keyword' => 'Dipyo',
                    'pronunciation' => '/dip-yo/',
                    'definition' => 'Bis Universitas Diponegoro yang disediakan oleh kampus untuk mahasiswa.',
                    'is_bookmarked' => true,
                    'sub_items' => []
                ],
                [
                    'id' => 2,
                    'keyword' => 'Tembalang city (Temcy)',
                    'pronunciation' => '/tem-ba-lang si-ti tem-si/',
                    'definition' => 'Tembalang city (Temcy) adalah sebutan untuk kawasan di sekitar Universitas Diponegoro, yang dikenal sebagai tempat tinggal mahasiswa.',
                    'is_bookmarked' => false,
                    'sub_items' => []
                ],
                [
                    'id' => 3,
                    'keyword' => 'SIAP UNDIP',
                    'pronunciation' => '/si-yap un-dip/',
                    'definition' => 'Sistem Informasi Akademik yang digunakan mahasiswa buat KRS-an, lihat nilai, dan lainnya.',
                    'is_bookmarked' => true,
                    'sub_items' => [
]
                ]
            ]
        ]
    ];
@endphp

<div class="container mx-auto px-4 py-8 max-w-7xl">
     <div class="space-y-8 px-4 pt-20">
        <h1 class="text-2xl font-bold mb-6 text-[#3C3B6E]">Kategori Dips</h1>
        <p class="text-[#000000] mb-4">Berikut adalah istilah-istilah yang sering digunakan di lingkungan Universitas Diponegoro.</p>
                @foreach($dummyKategoriDips as $group)
                <div class="bg-[#C5B862] rounded-lg shadow-sm p-6 border border-[#F9F5EA] w-full">
                        @foreach($group['items'] as $item)
                            <div
                                x-data="{ open: false, isBookmarked: {{ json_encode($item['is_bookmarked']) }} }"
                                class="mb-6 last:mb-0 group"
                            >
                                <div class="flex items-center justify-between">
                                    <button @click="open = !open" class="flex-1 text-left group">
                                        <div class="flex items-baseline justify-between">
                                            <div class="flex items-baseline">
                                                <h3 class="text-lg font-medium text-[#FFFFFF] group-hover:text-[#3C3B6E] transition-colors">
                                                    {{ $item['keyword'] }}
                                                </h3>
                                                <span class="ml-2 text-sm text-[#FFFFFF]">{{ $item['pronunciation'] }}</span>
                                            </div>
                                            {{-- Icon Dropdown --}}
                                            <svg class="w-5 h-5 text-[#6B7280] transform transition-transform duration-200"
                                                :class="{ 'rotate-180': open }"
                                                fill="none"
                                                stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                                            </svg>
                                        </div>
                                    </button>

                                    {{-- Bookmark Button --}}
                                    <button
                                        @click="isBookmarked = !isBookmarked; if (isBookmarked) window.location.href = '/bookmark';"
                                        class="ml-4 p-2 hover:bg-[#F3F4F6] rounded-full transition-colors"
                                        :class="{ 'text-[#3C3B6E]': isBookmarked, 'text-[#9CA3AF]': !isBookmarked }"
                                    >
                                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z"/>
                                        </svg>
                                    </button>
                                </div>

                                {{-- Dropdown Content --}}
                                <div x-show="open" x-collapse class="mt-2 pl-2">
                                    @if(!empty($item['sub_items']))
                                        <ul class="space-y-4">
                                            @foreach($item['sub_items'] as $sub)
                                                <li class="pl-4">
                                                    <div class="flex items-baseline">
                                                        <h4 class="font-medium text-[#1F2937]">{{ $sub['keyword'] }}</h4>
                                                        <span class="ml-2 text-sm text-[#6B7280]">{{ $sub['pronunciation'] }}</span>
                                                    </div>
                                                    <div class="mt-1 bg-[#F9F5EA] border border-[#E5E7EB] rounded-md p-3 text-[#4B5563]">
                                                        {{ $sub['definition'] }}
                                                      </div>
                                                </li>
                                            @endforeach
                                        </ul>
                                    @else
                                    <div class="bg-[#F9F5EA] border border-[#E5E7EB] rounded-md p-3 text-[#4B5563]">
                                        {{ $item['definition'] }}
                                      </div>

                                    @endif
                                </div>

                                @if(!$loop->last)
                                    <hr class="my-4 border-[#E5E7EB]">
                                @endif
                            </div>
                        @endforeach
                    </div>
                @endforeach
            </div>
</div>
@endsection
