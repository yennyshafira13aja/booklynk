@extends('layouts.petugas')

@section('content')
<div class="p-8">

    <!-- HEADER -->
    <h1 class="text-2xl font-bold mb-1">Edit Kategori Buku</h1>
    <p class="text-gray-500 mb-6">Edit data kategori buku</p>

    <div class="bg-[#1E3A56] w-[420px] rounded shadow">

        <!-- CARD HEADER -->
        <div class="p-4 text-white font-semibold">
            Edit Kategori
        </div>
        <div class="h-3 bg-cyan-200"></div>

        <!-- FORM -->
        <form action="{{ route('petugas.kategori.update', $kategori->id) }}"
              method="POST"
              class="p-6 space-y-4">
            @csrf
            @method('PUT')

            <input type="text"
                   name="nama"
                   value="{{ $kategori->nama }}"
                   class="w-full p-2 rounded bg-slate-200"
                   required>

            <div class="flex justify-end gap-3 pt-2">
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
