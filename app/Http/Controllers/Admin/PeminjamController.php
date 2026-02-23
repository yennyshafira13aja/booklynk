<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class PeminjamController extends Controller
{
    /**
     * Tampilkan data user dengan role peminjam
     * GET /admin/peminjam
     */
    public function index()
    {
        $peminjams = User::where('role', 'peminjam')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('admin.peminjam.index', compact('peminjams'));
    }

    /**
     * Tampilkan form tambah peminjam
     * GET /admin/peminjam/create
     */
    public function create()
    {
        return view('admin.peminjam.create');
    }

    /**
     * Simpan peminjam baru
     * POST /admin/peminjam
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users,email',
            'password' => 'required|min:6',
        ]);

        User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
            'role'     => 'peminjam',
        ]);

        return redirect()
            ->route('admin.peminjam.index')
            ->with('success', 'Peminjam berhasil ditambahkan');
    }

    /**
     * Tampilkan form edit peminjam
     * GET /admin/peminjam/{id}/edit
     */
    public function edit($id)
    {
        $peminjam = User::where('role', 'peminjam')->findOrFail($id);

        return view('admin.peminjam.edit', compact('peminjam'));
    }

    /**
     * Update data peminjam
     * PUT /admin/peminjam/{id}
     */
    public function update(Request $request, $id)
    {
        $peminjam = User::where('role', 'peminjam')->findOrFail($id);

        $request->validate([
            'name'  => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $peminjam->id,
        ]);

        $peminjam->update([
            'name'  => $request->name,
            'email' => $request->email,
        ]);

        return redirect()
            ->route('admin.peminjam.index')
            ->with('success', 'Data peminjam berhasil diperbarui');
    }

    /**
     * Hapus peminjam
     * DELETE /admin/peminjam/{id}
     */
    public function destroy($id)
    {
        User::where('role', 'peminjam')->findOrFail($id)->delete();

        return redirect()
            ->route('admin.peminjam.index')
            ->with('success', 'Peminjam berhasil dihapus');
    }
}
