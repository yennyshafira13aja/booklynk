@extends('layouts.petugas')

@section('content')
<div class="p-8">

    <!-- HEADER -->
    <h1 class="text-2xl font-bold mb-1">Edit Data Buku</h1>
    <p class="text-gray-500 mb-6">Edit data buku</p>

    <div class="bg-[#1E3A56] w-[420px] rounded shadow">

        <!-- CARD HEADER -->
        <div class="p-4 text-white font-semibold">
            Edit Data Buku
        </div>
        <div class="h-3 bg-cyan-200"></div>

        <!-- FORM -->
        <form action="{{ route('petugas.buku.update', $buku->id) }}"
              method="POST"
              enctype="multipart/form-data"
              class="p-6 space-y-4">
            @csrf
            @method('PUT')

            <input type="text" name="judul"
                value="{{ $buku->judul }}"
                class="w-full p-2 rounded bg-slate-200"
                required>

            <input type="text" name="pengarang"
                value="{{ $buku->pengarang }}"
                class="w-full p-2 rounded bg-slate-200"
                required>

            <input type="text" name="penerbit"
                value="{{ $buku->penerbit }}"
                class="w-full p-2 rounded bg-slate-200"
                required>

            <input type="number" name="tahun_terbit"
                value="{{ $buku->tahun_terbit }}"
                class="w-full p-2 rounded bg-slate-200"
                required>

           <select name="kategori" class="w-full p-2 rounded bg-slate-200" required>
    @foreach($kategoris as $kategori)
        <option value="{{ $kategori->nama }}"
            {{ $buku->kategori == $kategori->nama ? 'selected' : '' }}>
            {{ $kategori->nama }}
        </option>
    @endforeach
</select>


           <input type="number" name="stok"
    value="{{ $buku->stok }}"
    class="w-full p-2 rounded bg-slate-200"
    required>

<textarea name="sinopsis"
    rows="4"
    class="w-full p-2 rounded bg-slate-200">{{ $buku->sinopsis }}</textarea>


            <!-- COVER LAMA -->
            <div class="flex justify-center">
                <img src="{{ asset('images/buku/'.$buku->cover) }}"
                     class="w-32 rounded shadow">
            </div>

            <!-- UPLOAD COVER BARU -->
            <input type="file" name="cover"
                class="w-full text-sm text-white">

            <!-- BUTTON -->
            <div class="flex justify-end gap-3 pt-2">
                <a href="{{ route('petugas.buku.index') }}"
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
