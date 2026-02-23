<?php

namespace App\Http\Controllers\Peminjam;

use App\Http\Controllers\Controller;
use App\Models\Buku;
use App\Models\Ulasan;


class KatalogController extends Controller
{
    public function index()
    {
        $buku = Buku::all();
        return view('peminjam.katalog-buku.index', compact('buku'));
    }

    public function show($id)
{
    $buku = Buku::findOrFail($id);

    $ulasans = Ulasan::with('user')
        ->where('buku_id', $id)
        ->latest()
        ->get();

    return view('peminjam.detail-buku', compact('buku', 'ulasans'));
}
}