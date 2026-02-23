<?php

namespace App\Http\Controllers\Peminjam;

use App\Http\Controllers\Controller;
use App\Models\Buku;
use App\Models\Ulasan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RatingController extends Controller
{
    public function create($buku_id)
    {
        $buku = Buku::findOrFail($buku_id);
        return view('peminjam.rating', compact('buku'));
    }

    public function store(Request $request)
    {
       Ulasan::create([
    'user_id' => Auth::id(),
    'buku_id' => $request->buku_id,
    'rating' => $request->rating,
    'ulasan' => $request->review
]);

        return redirect()->route('peminjam.riwayat')
            ->with('success', 'Terima kasih sudah memberi ulasan!');
    }
}
