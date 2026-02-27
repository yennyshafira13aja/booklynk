@extends('layouts.admin')

@section('content')
<div class="p-8">

<div class="bg-[#D9E2EA] rounded-xl shadow p-6 flex gap-6">

    <!-- COVER -->
    <img src="{{ asset('images/buku/'.$laporan->buku->cover) }}"
         class="w-40 h-56 object-cover rounded">

    <div class="grid grid-cols-2 gap-12 w-full">

        <!-- KIRI -->
        <div>

            <!-- PEMINJAM -->
            <h3 class="font-semibold mb-2">Informasi Peminjam</h3>
            <p><b>Nama Peminjam :</b> {{ $laporan->user->name }}</p>

            <!-- BUKU -->
            <h3 class="font-semibold mt-4 mb-2">Informasi Buku</h3>
            <p><b>Judul Buku :</b> {{ $laporan->buku->judul }}</p>
            <p><b>Pengarang :</b> {{ $laporan->buku->pengarang }}</p>
            <p><b>Penerbit :</b> {{ $laporan->buku->penerbit }}</p>
            <p><b>Tahun Terbit :</b> {{ $laporan->buku->tahun_terbit }}</p>

            {{-- kalau pakai relasi --}}
            <p><b>Kategori :</b> {{ $laporan->buku->kategori ?? '-' }}</p>

        </div>

        <!-- KANAN -->
        <div>

            <!-- PEMINJAMAN -->
            <h3 class="font-semibold mb-2">Informasi Peminjaman</h3>

            <p><b>Tanggal Dipinjam :</b><br>
                {{ $laporan->tanggal_peminjaman }}
            </p>

            <p class="mt-2"><b>Tanggal Dikembalikan :</b><br>
                {{ $laporan->tanggal_pengembalian ?? '-' }}
            </p>

            <!-- STATUS -->
            <p class="mt-2"><b>Status :</b><br>

    @if($laporan->status == 'menunggu')
        <span class="bg-yellow-400 text-white px-3 py-1 rounded text-xs">
            Menunggu
        </span>

    @elseif($laporan->status == 'dipinjam')
        <span class="bg-indigo-600 text-white px-3 py-1 rounded text-xs">
            Dipinjam
        </span>

    @elseif($laporan->status == 'dikembalikan')
        <span class="bg-green-500 text-white px-3 py-1 rounded text-xs">
            Dikembalikan
        </span>

    @elseif($laporan->status == 'ditolak')
        <span class="bg-red-500 text-white px-3 py-1 rounded text-xs">
            Ditolak
        </span>

    @endif

</p>
            <!-- BUTTON -->
            <div class="mt-6">
                <a href="{{ route('admin.laporan.index') }}"
                   class="bg-white px-4 py-2 rounded shadow">
                   Kembali
                </a>
            </div>

        </div>

    </div>
</div>

</div>
@endsection