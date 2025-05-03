{{-- resources/views/history.blade.php --}}
@extends('layouts.app')

@section('content')
@php
    // Variabel testing
    $isLoggedIn = true;
    $isEmpty = false;

    // Dummy data lengkap
    $dummyHistory = [
        [
            'date' => now()->format('Y-m-d'),
            'items' => [
                [
                    'id' => 1,
                    'keyword' => 'Dipyo',
                    'pronunciation' => '/dip-yo/',
                    'definition' => 'Bis Universitas Diponegoro yang disediakan oleh kampus untuk mahasiswa.',
                    'is_bookmarked' => false,
                    'sub_items' => []
                ]
            ]
        ],
        [
            'date' => now()->subDay()->format('Y-m-d'),
            'items' => [
                [
                    'id' => 2,
                    'keyword' => 'IPS',
                    'pronunciation' => '/i-pe-es/',
                    'definition' => 'Tingkat keberhasilan mahasiswa...',
                    'is_bookmarked' => true,
                    'sub_items' => []
                ],
                [
                    'id' => 3,
                    'keyword' => 'KTM',
                    'pronunciation' => '/ka-te-em/',
                    'definition' => 'Kegiatan kurikuler di masyarakat',
                    'is_bookmarked' => false,
                    'sub_items' => []
                ]
            ]
        ]
    ];
@endphp

<div class="container mx-auto px-4 py-8 max-w-5xl">

    @if(!$isLoggedIn)
        <div class="text-center mt-12">
            <img src="{{ asset('images/history_kosong.png') }}" alt="Login required" class="mx-auto w-48 mb-4">
            <p class="text-[#6B7280] text-lg">Silakan login untuk melihat riwayat</p>
        </div>
    @else
    @if($isEmpty)
        <div class="text-center mt-12">
            <img src="{{ asset('images/history_kosong.png') }}" alt="Empty history" class="mx-auto w-48 mb-4">
            <p class="text-[#6B7280] text-lg">Kamu belum melakukan pencarian!</p>
        </div>
     @else
     <div class="space-y-8 px-4 pt-20">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold text-[#3C3B6E]">Riwayat</h1>
            <button
                onclick="confirm('Yakin ingin menghapus semua riwayat?') && document.getElementById('delete-all-form').submit()"
                class="px-4 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600 transition-colors"
            >
                Hapus Semua
            </button>
            <form id="delete-all-form" method="POST" action="{{ route('history.delete-all') }}" class="hidden">
                @csrf
                @method('DELETE')
            </form>
        </div>

                @foreach($dummyHistory as $group)
                <h2 class="font-semibold text-lg mb-4 text-[#3C3B6E]">
                    {{ \Carbon\Carbon::parse($group['date'])->locale('id')->isoFormat('dddd, D MMMM YYYY') }}
                </h2>
                <div class="bg-[#C5B862] rounded-lg shadow-sm p-6 border border-[#F9F5EA] w-full">
                        @foreach($group['items'] as $item)
                            <div
                                x-data="{ open: false }"
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

                                    {{-- Delete Button --}}
                                    <form method="POST" action="{{ route('history.delete', $item['id']) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button
                                            type="submit"
                                            class="ml-4 p-2 text-red-500 hover:bg-red-50 rounded-full transition-colors"
                                            onclick="return confirm('Yakin ingin menghapus riwayat ini?')"
                                        >
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                            </svg>
                                        </button>
                                    </form>
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
        @endif
    @endif
</div>
@endsection
