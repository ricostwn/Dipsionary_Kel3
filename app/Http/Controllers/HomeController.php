<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kamus;

class HomeController extends Controller
{
    /**
     * Tampilkan halaman beranda.
     */
    public function index()
    {
        return view('home');
    }

    /**
     * Tampilkan halaman kategori umum.
     */
    public function kategoriUmum()
    {
        // Ambil data dari kategori 'umum'
        $items = Kamus::where('kategori', 'umum')->get();
        return view('kategori-umum', compact('items'));
    }

    /**
     * Tampilkan halaman kategori DIPS.
     */
    public function kategoriDips()
    {
        // Ambil data dari kategori 'dips'
        $items = Kamus::where('kategori', 'dips')->get();
        return view('kategori-dips', compact('items'));
    }

    /**
     * Fungsi pencarian istilah.
     */
    public function search(Request $request)
    {
        $keyword = $request->input('q');

        $results = Kamus::where('istilah', 'LIKE', "%{$keyword}%")
            ->orWhere('cara_baca', 'LIKE', "%{$keyword}%")
            ->orWhere('penjelasan', 'LIKE', "%{$keyword}%")
            ->get();

        return view('search', [
            'keyword' => $keyword,
            'results' => $results
        ]);
    }
}
