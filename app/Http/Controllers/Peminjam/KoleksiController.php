<?php

namespace App\Http\Controllers\Peminjam;

use App\Http\Controllers\Controller;
use App\Models\KoleksiPribadi;
use Illuminate\Support\Facades\Auth;

class KoleksiController extends Controller
{
    public function index()
    {
        $koleksi = KoleksiPribadi::with('buku')
            ->where('user_id', Auth::id())
            ->get();

        return view('peminjam.koleksi.index', compact('koleksi'));
    }

    public function store($id)
    {
        KoleksiPribadi::firstOrCreate([
            'user_id' => Auth::id(),
            'buku_id' => $id
        ]);

        return back()->with('success','Buku ditambahkan ke koleksi');
    }
}
