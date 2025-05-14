<?php

namespace App\Http\Controllers;

use App\Models\Kamus;
use Illuminate\Http\Request;

class KamusController extends Controller
{
    public function index()
    {
        $data = Kamus::all();
        return view('kamus.index', compact('data'));
    }

    public function create()
    {
        return view('kamus.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'istilah' => 'required|max:150',
            'cara_baca' => 'required|max:150',
            'penjelasan' => 'required',
            'kategori' => 'required|max:50',
        ]);

        Kamus::create($request->all());
        return redirect()->route('kamus.index')->with('success', 'Data berhasil ditambahkan');
    }

    public function show($id)
    {
        $data = Kamus::findOrFail($id);
        return view('kamus.show', compact('data'));
    }

    public function edit($id)
    {
        $data = Kamus::findOrFail($id);
        return view('kamus.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'istilah' => 'required|max:150',
            'cara_baca' => 'required|max:150',
            'penjelasan' => 'required',
            'kategori' => 'required|max:50',
        ]);

        $data = Kamus::findOrFail($id);
        $data->update($request->all());
        return redirect()->route('kamus.index')->with('success', 'Data berhasil diperbarui');
    }

    public function destroy($id)
    {
        Kamus::destroy($id);
        return redirect()->route('kamus.index')->with('success', 'Data berhasil dihapus');
    }
}
