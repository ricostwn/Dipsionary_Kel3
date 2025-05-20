<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kamus;
use App\Models\History;
use App\Models\Bookmark;  // Tambahkan import model Bookmark
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function search(Request $request)
    {
        $keyword = $request->input('q');

        // Pencarian hanya di kolom 'istilah'
        $results = Kamus::where('istilah', 'LIKE', "%{$keyword}%")->get();

        // Simpan riwayat pencarian meskipun hasil kosong, jika user sudah login
        if (Auth::check()) {
            History::create([
                'user_id' => Auth::id(),
                'keyword' => $keyword
            ]);
        }

        // Ambil data bookmark user jika sudah login, kosong jika belum login
        $bookmarks = collect();
        if (Auth::check()) {
            $bookmarks = Bookmark::where('user_id', Auth::id())->get();
        }

        return view('search', [
            'keyword' => $keyword,
            'results' => $results,
            'bookmarks' => $bookmarks
        ]);
    }
}
