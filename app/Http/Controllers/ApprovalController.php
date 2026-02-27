<?php

namespace App\Http\Controllers;

use App\Models\Peminjaman;

class ApprovalController extends Controller
{
    public function index()
    {
        $peminjamans = Peminjaman::with('user','buku')
            ->where('status', 'menunggu')
            ->latest()
            ->get();

        return view('approval.index', compact('peminjamans'));
    }

    public function approve($id)
    {
        $p = Peminjaman::with('buku')->findOrFail($id);

        // ❌ jangan approve kalau bukan menunggu
        if ($p->status !== 'menunggu') {
            return back()->with('error', 'Status sudah diproses');
        }

        // ❌ cek stok
        if ($p->buku->stok <= 0) {
            return back()->with('error', 'Stok buku habis');
        }

        // ✅ update status
        $p->update([
            'status' => 'dipinjam'
        ]);

        // ✅ kurangi stok
        $p->buku->decrement('stok');

        return back()->with('success', 'Peminjaman disetujui');
    }

    public function tolak($id)
    {
        $p = Peminjaman::findOrFail($id);

        // ❌ jangan tolak kalau sudah diproses
        if ($p->status !== 'menunggu') {
            return back()->with('error', 'Status sudah diproses');
        }

        $p->update([
            'status' => 'ditolak'
        ]);

        return back()->with('success', 'Peminjaman ditolak');
    }
}