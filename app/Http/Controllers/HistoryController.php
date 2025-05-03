<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HistoryController extends Controller
{
    public function index()
    {
        return view('history');
    }
    // HistoryController.php
    public function clearAll()
    {
        // Logika hapus semua history (sesuaikan dengan database)
        return redirect()->back()->with('success', 'Riwayat berhasil dihapus');
    }

    public function destroy($id)
    {
        // Logika hapus per item (sesuaikan dengan database)
        return redirect()->back()->with('success', 'Item berhasil dihapus');
    }
}
