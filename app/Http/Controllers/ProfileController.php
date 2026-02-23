<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
   public function index()
{
    $role = auth()->user()->role;

    if ($role == 'admin') {
        return view('admin.profile.index');
    }

    if ($role == 'peminjam') {
        return view('peminjam.profile.index');
    }

    if ($role == 'petugas') {
        return view('petugas.profile.index');
    }

    abort(403);
}


public function update(Request $request)
{
    $user = auth()->user();

    $request->validate([
        'name' => 'required',
        'email' => 'required|email',
        'password' => 'nullable|min:5'
    ]);

    $user->name = $request->name;
    $user->email = $request->email;

    if ($request->password) {
        $user->password = bcrypt($request->password);
    }

    $user->save();

    return back()->with('success', 'Profile berhasil diupdate');
}
}