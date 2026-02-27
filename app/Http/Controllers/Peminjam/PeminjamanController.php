<?php

namespace App\Http\Controllers\Peminjam;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Peminjaman;
use Illuminate\Support\Facades\Auth;

class PeminjamanController extends Controller
{
    public function store(Request $request)
{
    $request->validate([
        'buku_id' => 'required',
        'tanggal_pinjam' => 'required|date',
        'tanggal_kembali' => 'required|date'
    ]);

    Peminjaman::create([
        'user_id' => auth()->id(),
        'buku_id' => $request->buku_id,
        'tanggal_peminjaman' => $request->tanggal_pinjam,
        'tanggal_pengembalian' => $request->tanggal_kembali,
        'status' => 'menunggu' // 🔥 ini udah bener
    ]);

    return back()->with('success', 'Menunggu persetujuan petugas');
}
}
