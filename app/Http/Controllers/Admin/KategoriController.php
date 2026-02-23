<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\KategoriBuku;

class KategoriController extends Controller
{
    public function index()
    {
        $kategoris = KategoriBuku::latest()->get();
        return view('admin.kategori.index', compact('kategoris'));
    }

    public function create()
    {
        return view('admin.kategori.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required'
        ]);

        KategoriBuku::create([
            'nama' => $request->nama
        ]);

        return redirect()
            ->route('admin.kategori.index')
            ->with('success', 'Kategori berhasil ditambahkan');
    }

    public function destroy($id)
    {
        KategoriBuku::findOrFail($id)->delete();
        return redirect()->route('admin.kategori.index');
    }

    public function edit($id)
{
    $kategori = KategoriBuku::findOrFail($id);
    return view('admin.kategori.edit', compact('kategori'));
}

public function update(Request $request, $id)
{
    $request->validate([
        'nama' => 'required'
    ]);

    $kategori = KategoriBuku::findOrFail($id);

    $kategori->update([
        'nama' => $request->nama
    ]);

    return redirect()->route('admin.kategori.index')
        ->with('success', 'Kategori berhasil diperbarui');
}

}
