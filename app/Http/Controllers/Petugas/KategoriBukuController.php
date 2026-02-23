<?php

namespace App\Http\Controllers\Petugas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\KategoriBuku;


class KategoriBukuController extends Controller

{
    public function index()
{
    $kategoris = KategoriBuku::all();
    return view('petugas.kategori.index', compact('kategoris'));
}

    public function store(Request $request)
{
    $request->validate(['nama' => 'required']);
    KategoriBuku::create(['nama' => $request->nama]);
    return redirect()->route('petugas.kategori.index');
}

    public function create()
{
    return view('petugas.kategori.create');
}

    public function edit($id)
{
    $kategori = KategoriBuku::findOrFail($id);
    return view('petugas.kategori.edit', compact('kategori'));
}

    public function update(Request $request, $id)
{
    $kategori = KategoriBuku::findOrFail($id);

    $request->validate(['nama' => 'required']);
    $kategori->update(['nama' => $request->nama]);

    return redirect()->route('petugas.kategori.index');
}

public function destroy($id)
{
    $kategori = KategoriBuku::findOrFail($id);
    $kategori->delete();

    return redirect()->route('petugas.kategori.index')
        ->with('success', 'Kategori berhasil dihapus');
}

}
