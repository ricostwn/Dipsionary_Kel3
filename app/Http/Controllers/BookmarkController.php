<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bookmark;
use Illuminate\Support\Facades\Auth;

class BookmarkController extends Controller
{
    public function index()
    {
        $bookmarks = Bookmark::where('user_id', Auth::id())->get();
        return view('bookmark', compact('bookmarks'));
    }

    public function store(Request $request)
    {
        Bookmark::updateOrCreate(
            [
                'user_id' => Auth::id(),
                'istilah' => $request->istilah
            ],
            [
                'cara_baca' => $request->cara_baca,
                'penjelasan' => $request->penjelasan
            ]
        );

        return back()->with('success', 'Bookmark berhasil disimpan!');
    }

    public function deleteAll()
    {
        Bookmark::where('user_id', Auth::id())->delete();
        return redirect()->back()->with('success', 'Semua bookmark dihapus.');
    }
}
