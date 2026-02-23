<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Peminjaman;
use Barryvdh\DomPDF\Facade\Pdf;

class LaporanController extends Controller
{
    public function index()
    {
        $laporans = Peminjaman::with(['user','buku'])
            ->latest()
            ->get();

        if (auth()->user()->role == 'admin') {
    return view('admin.laporan.index', compact('laporans'));
} else {
    return view('petugas.laporan.index', compact('laporans'));
}
    }

    public function show($id)
{
    $laporan = Peminjaman::with(['user','buku'])->findOrFail($id);

    if (auth()->user()->role == 'admin') {
        return view('admin.laporan.detail', compact('laporan'));
    } else {
        return view('petugas.laporan.detail', compact('laporan'));
    }

}


   public function cetak()
{
    $laporans = Peminjaman::with(['user','buku'])->get();

    $pdf = Pdf::loadView('admin.laporan.cetak', compact('laporans'))
              ->setPaper('A4', 'portrait');

    return $pdf->stream('laporan-peminjaman.pdf');
}


}
