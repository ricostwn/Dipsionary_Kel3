<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kamus;
use App\Models\History;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function kategoriUmum()
    {
        $items = Kamus::where('kategori', 'umum')->get();
        return view('kategori-umum', compact('items'));
    }

    public function kategoriDips()
    {
        $items = Kamus::where('kategori', 'dips')->get();
        return view('kategori-dips', compact('items'));
    }

    public function search(Request $request)
    {
        $keyword = $request->input('q');
        $results = Kamus::where('istilah', 'LIKE', "%{$keyword}%")
            ->orWhere('cara_baca', 'LIKE', "%{$keyword}%")
            ->orWhere('penjelasan', 'LIKE', "%{$keyword}%")
            ->get();

        // Simpan riwayat pencarian jika user login
        if (Auth::check() && !$results->isEmpty()) {
            History::create([
                'user_id' => Auth::id(),
                'keyword' => $keyword
            ]);
        }

        return view('search', [
            'keyword' => $keyword,
            'results' => $results
        ]);
    }
}
