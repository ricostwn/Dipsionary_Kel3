<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bookmark;
use Illuminate\Support\Facades\Auth;

class BookmarkController extends Controller
{
    public function index()
    {
        // Ambil semua bookmark milik user
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

        return back()->with('success', 'Markah berhasil disimpan!');
    }

    public function deleteAll()
    {
        Bookmark::where('user_id', Auth::id())->delete();
        return redirect()->back()->with('success', 'Semua markah berhasil dihapus.');
    }

    // Hapus satu per satu markah
    public function destroy($id)
    {
        $bookmark = Bookmark::findOrFail($id);

        if ($bookmark->user_id === Auth::id()) {
            $bookmark->delete();
            return redirect()->route('bookmark')->with('success', 'Markah berhasil dihapus.');
        }

        return redirect()->route('bookmark')->with('error', 'Kamu tidak diizinkan menghapus markah ini.');
    }

    // Toggle bookmark via AJAX (POST)
    public function toggle(Request $request)
    {
        $userId = Auth::id();
        $istilah = $request->input('istilah');
        if (!$istilah) {
            return response()->json([
                'success' => false,
                'message' => 'Istilah tidak ditemukan.'
            ]);
        }

        // Cari bookmark berdasarkan user dan istilah
        $bookmark = Bookmark::where('user_id', $userId)->where('istilah', $istilah)->first();

        try {
            if ($bookmark) {
                // Jika sudah ada, hapus bookmark
                $bookmark->delete();
                return response()->json([
                    'success' => true,
                    'message' => 'Markah berhasil dihapus.'
                ]);
            } else {
                // Jika belum ada, buat bookmark baru
                Bookmark::create([
                    'user_id' => $userId,
                    'istilah' => $istilah,
                    'cara_baca' => $request->input('cara_baca', ''),
                    'penjelasan' => $request->input('penjelasan', ''),
                ]);
                return response()->json([
                    'success' => true,
                    'message' => 'Markah berhasil ditambahkan.'
                ]);
            }
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan saat memproses markah.'
            ]);
        }
    }
}
