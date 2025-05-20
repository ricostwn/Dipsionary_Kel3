<?php

namespace App\Http\Controllers;

use App\Models\Kamus;
use App\Models\Bookmark; // Import model Bookmark
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    public function umum()
    {
        $items = Kamus::where('kategori', 'umum')->get();

        Log::info('CategoryController@umum', [
            'item_count' => $items->count(),
            'items' => $items->toArray(),
        ]);

        // Ambil data bookmark user jika login
        $bookmarks = collect();
        if (Auth::check()) {
            $bookmarks = Bookmark::where('user_id', Auth::id())->get();
        }

        if ($items->isEmpty()) {
            return view('kategori-umum', [
                'items' => [],
                'message' => 'Tidak ada data untuk kategori umum.',
                'bookmarks' => $bookmarks,
            ]);
        }

        return view('kategori-umum', compact('items', 'bookmarks'));
    }

    public function dips()
    {
        $items = Kamus::where('kategori', 'dips')->get();

        Log::info('CategoryController@dips', [
            'item_count' => $items->count(),
            'items' => $items->toArray(),
        ]);

        // Ambil data bookmark user jika login
        $bookmarks = collect();
        if (Auth::check()) {
            $bookmarks = Bookmark::where('user_id', Auth::id())->get();
        }

        if ($items->isEmpty()) {
            return view('kategori-dips', [
                'items' => [],
                'message' => 'Tidak ada data untuk kategori DIPS.',
                'bookmarks' => $bookmarks,
            ]);
        }

        return view('kategori-dips', compact('items', 'bookmarks'));
    }
}
