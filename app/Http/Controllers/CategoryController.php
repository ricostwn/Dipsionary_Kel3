<?php

namespace App\Http\Controllers;

use App\Models\Kamus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CategoryController extends Controller
{
    public function umum()
    {
        // Ambil data dengan query yang lebih sederhana
        $items = Kamus::where('kategori', 'umum')->get();

        // Log untuk debugging
        Log::info('CategoryController@umum', [
            'item_count' => $items->count(),
            'items' => $items->toArray(),
        ]);

        if ($items->isEmpty()) {
            return view('kategori-umum', ['items' => [], 'message' => 'Tidak ada data untuk kategori umum.']);
        }

        return view('kategori-umum', compact('items'));
    }

    public function dips()
    {
        // Ambil data dengan query yang lebih sederhana
        $items = Kamus::where('kategori', 'dips')->get();

        // Log untuk debugging
        Log::info('CategoryController@dips', [
            'item_count' => $items->count(),
            'items' => $items->toArray(),
        ]);

        if ($items->isEmpty()) {
            return view('kategori-dips', ['items' => [], 'message' => 'Tidak ada data untuk kategori DIPS.']);
        }

        return view('kategori-dips', compact('items'));
    }
}
