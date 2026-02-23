<?php

namespace App\Http\Controllers\Peminjam;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ulasan;
use App\Models\Buku;
use Illuminate\Support\Facades\Auth;

class UlasanController extends Controller
{
    public function create($bukuId)
    {
        $buku = Buku::findOrFail($bukuId);
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


    public function user()
{
    return $this->belongsTo(User::class);
}

}
