@extends('layouts.app')

@section('content')
<div class="container mx-auto py-10 max-w-5xl pt-24">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold text-[#3C3B6E]">Markah</h1>

        @unless($bookmarks->isEmpty())
        <form method="POST" action="{{ route('bookmark.delete-all') }}" id="delete-all-bookmark-form">
            @csrf
            @method('DELETE')
            <button type="submit" class="px-4 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600 transition-colors">
                Hapus Semua
            </button>
        </form>
        @endunless
    </div>

    @if($bookmarks->isEmpty())
        <div class="text-center mt-12">
            <img src="{{ asset('images/history_kosong.png') }}" alt="Empty bookmark" class="mx-auto w-48 mb-4" />
            <p class="text-[#6B7280] text-lg">Kamu belum menyimpan istilah favorit!</p>
        </div>
    @else
        <ul class="space-y-4">
            @foreach($bookmarks as $item)
                <li class="bg-[#C5B862] p-6 rounded-lg flex justify-between items-start relative">
                    <div>
                        <div class="flex items-baseline gap-2">
                            <h2 class="text-xl font-bold text-[#3C3B6E]">{{ $item->istilah }}</h2>
                            <span class="italic text-gray-800 text-base">({{ $item->cara_baca }})</span>
                        </div>
                        <p class="mt-2 text-gray-800 leading-relaxed">{{ $item->penjelasan }}</p>
                    </div>

                    <form method="POST" action="{{ route('bookmark.delete', $item->id) }}" class="delete-single-form" data-id="{{ $item->id }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="ml-4 text-red-600 hover:text-red-800" title="Hapus markah">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
                                <line x1="18" y1="6" x2="6" y2="18" />
                                <line x1="6" y1="6" x2="18" y2="18" />
                            </svg>
                        </button>
                    </form>
                </li>
            @endforeach
        </ul>
    @endif
</div>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // SweetAlert untuk hapus satu markah
        document.querySelectorAll('.delete-single-form').forEach(form => {
            form.addEventListener('submit', function(e) {
                e.preventDefault();
                const submitButton = form.querySelector('button[type="submit"]');

                Swal.fire({
                    title: 'Yakin hapus markah ini?',
                    text: "Tindakan ini tidak bisa dibatalkan!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Ya, hapus!',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        submitButton.disabled = true;
                        submitButton.innerHTML = 'Menghapus...';
                        form.submit();
                    }
                });
            });
        });

        // SweetAlert untuk hapus semua markah
        const deleteAllForm = document.getElementById('delete-all-bookmark-form');
        if (deleteAllForm) {
            deleteAllForm.addEventListener('submit', function(e) {
                e.preventDefault();
                const submitButton = deleteAllForm.querySelector('button[type="submit"]');

                Swal.fire({
                    title: 'Yakin hapus semua markah?',
                    text: "Semua markah kamu akan hilang!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Ya, hapus semua!',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        submitButton.disabled = true;
                        submitButton.innerHTML = 'Menghapus semua...';
                        deleteAllForm.submit();
                    }
                });
            });
        }
    });
</script>
@endpush
