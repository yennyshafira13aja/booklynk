@extends('layouts.admin')

@section('content')
<div class="p-8">

    <h1 class="text-2xl font-bold mb-1">Tambah Data Petugas</h1>
    <p class="text-gray-500 mb-6">Tambah data petugas</p>

    <div class="bg-[#1E3A56] w-[420px] rounded shadow">

        <!-- HEADER CARD -->
        <div class="p-4 text-white font-semibold border-b-8 border-cyan-200">
            Tambah Petugas
        </div>

        <!-- FORM -->
        <form action="{{ route('admin.petugas.store') }}" method="POST" class="p-6 space-y-5">
            @csrf

            <input type="text" name="name"
                placeholder="Nama Petugas"
                class="w-full p-2 rounded bg-slate-200"
                required>

            <input type="email" name="email"
                placeholder="Email"
                class="w-full p-2 rounded bg-slate-200"
                required>

            <input type="password" name="password"
                placeholder="Password"
                class="w-full p-2 rounded bg-slate-200"
                required>

            <!-- STATUS -->
            <select name="status" class="w-full p-2 rounded bg-slate-200" required>
                <option value="">Status</option>
                <option value="aktif">Aktif</option>
                <option value="tidak_aktif">Tidak Aktif</option>
            </select>

            <!-- BUTTON -->
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
