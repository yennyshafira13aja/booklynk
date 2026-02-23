<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard', [
            'totalBuku' => DB::table('buku')->count(),
            'totalAnggota' => DB::table('users')->where('role', 'anggota')->count(),
            'bukuDipinjam' => DB::table('peminjaman')->where('status', 'Dipinjam')->count(),
            'menungguValidasi' => DB::table('peminjaman')->where('status', 'Menunggu')->count(),
            'peminjamanTerbaru' => DB::table('peminjaman')
                ->join('users', 'peminjaman.user_id', '=', 'users.id')
                ->join('buku', 'peminjaman.buku_id', '=', 'buku.id')
                ->select(
                    'users.name as nama_peminjam',
                    'buku.judul',
                    'peminjaman.tanggal_pinjam',
                    'peminjaman.tanggal_kembali',
                    'peminjaman.status'
                )
                ->orderBy('peminjaman.created_at', 'desc')
                ->limit(5)
                ->get()
        ]);
    }
}
