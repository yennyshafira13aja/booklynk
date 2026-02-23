<?php

namespace App\Http\Controllers\Peminjam;

use App\Http\Controllers\Controller;
use App\Models\Peminjaman;
use Illuminate\Support\Facades\Auth;

class RiwayatController extends Controller
{
    public function index()
    {
        $riwayats = Peminjaman::with('buku')
            ->where('user_id', Auth::id())
            ->latest()
            ->get();

        return view('peminjam.riwayat', compact('riwayats'));
    }

   public function kembalikan($id)
{
    $pinjam = Peminjaman::findOrFail($id);

    if ($pinjam->user_id == auth()->id()) {
        $pinjam->status = 'dikembalikan';
        $pinjam->save();
    }

    return redirect()->route('peminjam.rating', $pinjam->buku_id);
}


}
