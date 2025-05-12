<?php

namespace App\Http\Controllers;

use App\Models\History;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HistoryController extends Controller
{
    public function index()
    {
        $histories = History::where('user_id', Auth::id())->orderBy('created_at', 'desc')->get();
        return view('history', compact('histories'));
    }

    public function destroy($id)
    {
        $history = History::find($id);
        if ($history && $history->user_id == Auth::id()) {
            $history->delete();
        }
        return back();
    }

    public function clearAll()
    {
        History::where('user_id', Auth::id())->delete();
        return back();
    }
}
