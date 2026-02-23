<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Buku;
use App\Models\KategoriBuku;


class BukuController extends Controller
{
    public function index()
    {
        $bukus = Buku::latest()->get();
        return view('admin.buku.index', compact('bukus'));
    }

    public function create()
{
    $kategoris = KategoriBuku::all();
    return view('admin.buku.create', compact('kategoris'));
}

public function store(Request $request)
{
    $request->validate([
    'judul' => 'required',
    'pengarang' => 'required',
    'penerbit' => 'required',
    'tahun' => 'required',
    'kategori' => 'required',
    'stok' => 'required',
    'sinopsis' => 'nullable|string',
    'cover' => 'nullable|image'
]);


    $coverName = null;

    if ($request->hasFile('cover')) {
        $coverName = time() . '.' . $request->cover->extension();
        $request->cover->move(public_path('images/buku'), $coverName);
    }

        Buku::create([
    'judul' => $request->judul,
    'pengarang' => $request->pengarang,
    'penerbit' => $request->penerbit,
    'tahun_terbit' => $request->tahun,
    'kategori' => $request->kategori,
    'stok' => $request->stok,
    'sinopsis' => $request->sinopsis,
    'cover' => $coverName
]);

    

    return redirect()->route('admin.buku.index')
        ->with('success', 'Buku berhasil ditambahkan');
}

public function edit($id)
{
    $buku = Buku::findOrFail($id);
    $kategoris = KategoriBuku::all();

    return view('admin.buku.edit', compact('buku','kategoris'));
}

public function update(Request $request, $id)
{
    $buku = Buku::findOrFail($id);

    $request->validate([
        'judul' => 'required',
        'pengarang' => 'required',
        'penerbit' => 'required',
        'tahun' => 'required',
        'kategori' => 'required',
        'stok' => 'required',
        'sinopsis' => 'nullable|string',
        'cover' => 'nullable|image'
    ]);

    if ($request->hasFile('cover')) {
        $coverName = time().'.'.$request->cover->extension();
        $request->cover->move(public_path('images/buku'), $coverName);
        $buku->cover = $coverName;
    }

    $buku->update([
        'judul' => $request->judul,
        'pengarang' => $request->pengarang,
        'penerbit' => $request->penerbit,
        'tahun_terbit' => $request->tahun,
        'kategori' => $request->kategori,
        'stok' => $request->stok,
        'sinopsis' => $request->sinopsis,
    ]);

    return redirect()->route('admin.buku.index')
        ->with('success', 'Data buku berhasil diperbarui');
}


public function destroy($id)
{
    $buku = Buku::findOrFail($id);

    // hapus cover jika ada
    if ($buku->cover && file_exists(public_path('images/buku/'.$buku->cover))) {
        unlink(public_path('images/buku/'.$buku->cover));
    }

    $buku->delete();

    return redirect()->route('admin.buku.index')
        ->with('success', 'Buku berhasil dihapus');
}


}
