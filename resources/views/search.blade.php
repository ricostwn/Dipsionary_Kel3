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
                    <div class="flex items-center justify-between">
                        <!-- Grup Istilah & Cara Baca -->
                        <div class="flex items-baseline gap-2">
                            <h2 class="text-xl font-semibold text-[#3C3B6E]">{{ $item->istilah }}</h2>
                            <p class="italic text-[#535049]">({{ $item->cara_baca }})</p>
                        </div>

                        <!-- Tombol Bookmark -->
                        <button
                            type="button"
                            class="bookmark-button flex items-center justify-center h-10 w-10"
                            data-istilah="{{ $item->istilah }}"
                            data-cara_baca="{{ $item->cara_baca }}"
                            data-penjelasan="{{ $item->penjelasan }}"
                            data-bookmarked="{{ $item->is_bookmarked ? 'true' : 'false' }}"
                        >
                            <svg class="h-8 w-8 bookmark-icon" fill="{{ $item->is_bookmarked ? '#3C3B6E' : '#F9F5EA' }}" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z"/>
                            </svg>
                        </button>
                    </div>

                    <!-- Penjelasan -->
                    <p class="text-[#535049] mt-2">{{ $item->penjelasan }}</p>
                </li>
            @endforeach
        </ul>
    @endif
</div>

<script>
document.querySelectorAll('.bookmark-button').forEach(button => {
    button.addEventListener('click', function() {
        const icon = this.querySelector('.bookmark-icon');
        const isBookmarked = this.dataset.bookmarked === 'true';

        // Toggle state lokal
        this.dataset.bookmarked = !isBookmarked;
        icon.style.fill = isBookmarked ? '#F9F5EA' : '#3C3B6E';

        // Kirim request ke backend
        fetch('/bookmark', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({
                istilah: this.dataset.istilah,
                cara_baca: this.dataset.cara_baca,
                penjelasan: this.dataset.penjelasan,
                is_bookmarked: !isBookmarked
            })
        });
    });
});
</script>
@endsection
