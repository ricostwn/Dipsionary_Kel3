@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-20 max-w-4xl">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-[#3C3B6E]">Riwayat Pencarian</h1>
        @unless($histories->isEmpty())
        <form method="POST" action="{{ route('history.delete-all') }}" id="delete-all-history-form">
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
                <li class="bg-[#C5B862] p-6 rounded-lg flex justify-between items-start relative">
                    <div>
                        <h2 class="text-xl font-bold text-[#3C3B6E]">{{ $history->keyword }}</h2>
                        <p class="italic text-gray-800 text-sm mt-1">Pencarian dilakukan pada: {{ $history->created_at->format('d-m-Y H:i') }}</p>
                    </div>
                    <form method="POST" action="{{ route('history.delete', $history->id) }}" class="delete-history-form" data-id="{{ $history->id }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="ml-4 text-red-600 hover:text-red-800 font-semibold">Hapus</button>
                    </form>
                </li>
            @endforeach
        </ul>
    @endif
</div>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', () => {
    // Hapus satu riwayat
    document.querySelectorAll('.delete-history-form').forEach(form => {
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            const submitButton = form.querySelector('button[type="submit"]');
            Swal.fire({
                title: 'Yakin hapus riwayat ini?',
                text: "Tindakan ini tidak bisa dibatalkan!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Disable tombol agar tidak klik berulang
                    submitButton.disabled = true;
                    submitButton.textContent = 'Menghapus...';
                    form.submit();
                }
            });
        });
    });

    // Hapus semua riwayat
    const deleteAllForm = document.getElementById('delete-all-history-form');
    if (deleteAllForm) {
        deleteAllForm.addEventListener('submit', function(e) {
            e.preventDefault();
            const submitButton = deleteAllForm.querySelector('button[type="submit"]');
            Swal.fire({
                title: 'Hapus semua riwayat pencarian?',
                text: "Semua riwayat akan dihapus permanen!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Ya, hapus semua!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    submitButton.disabled = true;
                    submitButton.textContent = 'Menghapus semua...';
                    deleteAllForm.submit();
                }
            });
        });
    }
});
</script>
@endpush
