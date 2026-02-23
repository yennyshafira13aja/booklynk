@extends('layouts.petugas')

@section('content')
<div class="p-8">

    <h1 class="text-2xl font-bold mb-1">Tambah Kategori Buku</h1>
    <p class="text-gray-500 mb-6">Tambah data kategori buku</p>

    <div class="bg-[#1E3A56] w-[420px] rounded shadow">

        <div class="p-4 text-white font-semibold">
            Tambah Kategori
        </div>
        <div class="h-3 bg-cyan-200"></div>

        <form action="{{ route('petugas.kategori.store') }}"
              method="POST"
              class="p-6 space-y-6">
            @csrf

            <input type="text"
                   name="nama"
                   placeholder="Kategori"
                   class="w-full p-3 rounded bg-slate-200"
                   required>

            <div class="flex justify-end gap-3">
                <a href="{{ route('petugas.kategori.index') }}"
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