@extends('layouts.admin')

@section('content')
<div class="p-8">

    <h1 class="text-2xl font-bold mb-1">Edit Data Petugas</h1>
    <p class="text-gray-500 mb-6">Edit data petugas</p>

    <div class="bg-[#1E3A56] w-[420px] rounded shadow">

        <div class="p-4 text-white font-semibold border-b-8 border-cyan-200">
            Edit Petugas
        </div>

        <form action="{{ route('admin.petugas.update', $petugas->id) }}" method="POST" class="p-6 space-y-4">
            @csrf
            @method('PUT')

            <!-- NAMA -->
            <input type="text" name="name"
                value="{{ old('name', $petugas->name) }}"
                class="w-full p-2 rounded bg-slate-200"
                placeholder="Nama">

            <!-- EMAIL -->
            <input type="email" name="email"
                value="{{ old('email', $petugas->email) }}"
                class="w-full p-2 rounded bg-slate-200"
                placeholder="Email">

            <!-- PASSWORD OPSIONAL -->
            <input type="password" name="password"
                class="w-full p-2 rounded bg-slate-200"
                placeholder="Password baru (opsional)">

            <!-- STATUS -->
            <select name="status" class="w-full p-2 rounded bg-slate-200">
                <option value="aktif" {{ $petugas->status == 'aktif' ? 'selected' : '' }}>
                    Aktif
                </option>
                <option value="tidak_aktif" {{ $petugas->status == 'tidak_aktif' ? 'selected' : '' }}>
                    Tidak Aktif
                </option>
            </select>

            <div class="flex justify-end gap-3 pt-2">
                <a href="{{ route('admin.petugas.index') }}"
                   class="bg-gray-200 px-4 py-2 rounded">
                    Cancel
                </a>

                <button class="bg-pink-500 text-white px-4 py-2 rounded">
                    Confirm
                </button>
            </div>

        </form>
    </div>
</div>
@endsection
