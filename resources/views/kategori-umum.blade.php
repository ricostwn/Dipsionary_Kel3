@extends('layouts.app')

@section('content')
<div class="container mx-auto py-10 max-w-5xl pt-24">
    <h1 class="text-3xl font-bold mb-6 text-[#3C3B6E]">Kategori Umum</h1>

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
            @php
                // Ambil istilah bookmark user untuk cek status
                $bookmarkedIstilah = $bookmarks->pluck('istilah')->toArray();
            @endphp
            @foreach($items as $item)
                @php
                    $isBookmarked = in_array($item->istilah, $bookmarkedIstilah);
                @endphp
                <li class="bg-[#C5B862] p-6 rounded-lg flex justify-between items-start relative">
                    <div>
                        <div class="flex items-baseline gap-2">
                            <h2 class="text-xl font-bold text-[#3C3B6E]">{{ $item->istilah }}</h2>
                            <span class="italic text-gray-800 text-base">({{ $item->cara_baca }})</span>
                        </div>
                        <p class="mt-2 text-gray-800 leading-relaxed">{{ $item->penjelasan }}</p>
                    </div>

                    <!-- Bookmark Toggle Button -->
                    <button
                        type="button"
                        class="bookmark-toggle ml-4"
                        data-istilah="{{ $item->istilah }}"
                        data-cara_baca="{{ $item->cara_baca }}"
                        data-penjelasan="{{ $item->penjelasan }}"
                        aria-label="Toggle bookmark"
                    >
                        @if($isBookmarked)
                            <!-- Ikon bookmark biru -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-blue-700" fill="currentColor" viewBox="0 0 24 24" stroke="none">
                                <path d="M6 2a2 2 0 00-2 2v18l8-5 8 5V4a2 2 0 00-2-2H6z"/>
                            </svg>
                        @else
                            <!-- Ikon bookmark putih -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 5v16l7-5 7 5V5a2 2 0 00-2-2H7a2 2 0 00-2 2z" />
                            </svg>
                        @endif
                    </button>
                </li>
            @endforeach
        </ul>
    @endif
</div>
@endsection

@push('scripts')
<script>
    document.querySelectorAll('.bookmark-toggle').forEach(button => {
        button.addEventListener('click', function() {
            const istilah = this.dataset.istilah;
            const cara_baca = this.dataset.cara_baca;
            const penjelasan = this.dataset.penjelasan;
            const btn = this;

            fetch("{{ route('bookmark.toggle') }}", {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({ istilah, cara_baca, penjelasan }),
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Berhasil',
                        text: data.message,
                        timer: 2000,
                        showConfirmButton: false,
                    });

                    btn.classList.toggle('bookmarked');

                    // Toggle ikon warna
                    if(btn.classList.contains('bookmarked')) {
                        btn.innerHTML = `
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-blue-700" fill="currentColor" viewBox="0 0 24 24" stroke="none">
                                <path d="M6 2a2 2 0 00-2 2v18l8-5 8 5V4a2 2 0 00-2-2H6z"/>
                            </svg>`;
                    } else {
                        btn.innerHTML = `
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 5v16l7-5 7 5V5a2 2 0 00-2-2H7a2 2 0 00-2 2z" />
                            </svg>`;
                    }
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Gagal',
                        text: data.message,
                        timer: 2000,
                        showConfirmButton: false,
                    });
                }
            })
            .catch(() => {
                Swal.fire({
                    icon: 'error',
                    title: 'Gagal',
                    text: 'Fitur ini hanya bisa digunakan jika kamu sudah login.',
                    timer: 2000,
                    showConfirmButton: false,
                });
            });
        });
    });
</script>
@endpush
