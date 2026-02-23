<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class PetugasController extends Controller
{
    /**
     * Tampilkan data petugas
     */
    public function index()
    {
        $petugas = User::where('role', 'petugas')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('admin.petugas.index', compact('petugas'));
    }

    /**
     * Form tambah petugas
     */
    public function create()
    {
        return view('admin.petugas.create');
    }

    /**
     * Simpan petugas baru
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'     => 'required',
            'email'    => 'required|email|unique:users',
            'password' => 'required|min:6',
            'status'   => 'required|in:aktif,tidak_aktif',
        ]);

        User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
            'role'     => 'petugas',
            'status'   => $request->status,
        ]);

        return redirect()->route('admin.petugas.index')
            ->with('success', 'Petugas berhasil ditambahkan');
    }

    /**
     * Form edit petugas
     */
    public function edit($id)
    {
        $petugas = User::where('role', 'petugas')->findOrFail($id);

        return view('admin.petugas.edit', compact('petugas'));
    }

    /**
     * Update data petugas
     */
    public function update(Request $request, $id)
{
    $petugas = User::where('role', 'petugas')->findOrFail($id);

    $request->validate([
        'name'   => 'required',
        'email'  => 'required|email|unique:users,email,' . $petugas->id,
        'status' => 'required|in:aktif,tidak_aktif',
        'password' => 'nullable|min:6',
    ]);

    $petugas->name = $request->name;
    $petugas->email = $request->email;
    $petugas->status = $request->status;

    if ($request->password) {
        $petugas->password = Hash::make($request->password);
    }

    $petugas->save();

    return redirect()->route('admin.petugas.index')
        ->with('success', 'Data petugas berhasil diperbarui');
}


    /**
     * Hapus petugas
     */
    public function destroy($id)
{
    User::where('role', 'petugas')->findOrFail($id)->delete();

    return redirect()->route('admin.petugas.index')
        ->with('success', 'Petugas berhasil dihapus');
}

}