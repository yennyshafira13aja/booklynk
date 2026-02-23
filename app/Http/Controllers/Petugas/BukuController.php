<?php

namespace App\Http\Controllers\Petugas;

use App\Http\Controllers\Controller;
use App\Models\Buku;
use App\Models\KategoriBuku;
use Illuminate\Http\Request;

class BukuController extends Controller
{
    public function index()
    {
        $bukus = Buku::all();
        return view('petugas.buku.index', compact('bukus'));
    }

    public function create()
    {
        $kategoris = KategoriBuku::all();
        return view('petugas.buku.create', compact('kategoris'));
    }

    public function store(Request $request)
    {
        $data = $request->only([
    'judul',
    'pengarang',
    'penerbit',
    'tahun_terbit',
    'kategori',
    'stok',
    'sinopsis'
]);

        Buku::create($data);

        return redirect()->route('petugas.buku.index');
    }

    public function edit($id)
{
    $buku = Buku::findOrFail($id);
    $kategoris = KategoriBuku::all();

    return view('petugas.buku.edit', compact('buku','kategoris'));
    
    }

    public function update(Request $request, $id)
    {
        $buku = Buku::findOrFail($id);

        $data = $request->all();

        if ($request->hasFile('cover')) {
            $file = $request->file('cover');
            $nama = time().'_'.$file->getClientOriginalName();
            $file->move(public_path('images/buku'), $nama);
            $data['cover'] = $nama;
        }

        $buku->update($data);

        return redirect()->route('petugas.buku.index');
    }

    public function destroy($id)
    {
        Buku::findOrFail($id)->delete();

        return back();
    }
}