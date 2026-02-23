@extends('layouts.petugas')

@section('content')
<div class="p-8">

    <!-- HEADER -->
    <div class="flex justify-between items-center mb-6">
        <div>
            <h1 class="text-2xl font-bold">Laporan Peminjaman</h1>
            <p class="text-gray-500 text-sm">Laporan peminjaman buku</p>
        </div>

        <a href="{{ route('petugas.laporan.cetak') }}"
           class="bg-green-500 text-white px-4 py-2 rounded shadow">
            Cetak Laporan
        </a>
    </div>

    <!-- CARD -->
    <div class="bg-white rounded-xl shadow overflow-hidden">

        <div class="px-5 py-4 border-b">
            <h2 class="font-semibold">Laporan Peminjaman</h2>
        </div>

        <table class="w-full border-collapse">
            <thead class="bg-[#86C5D6] text-sm">
                <tr>
                    <th class="border px-3 py-2">No</th>
                    <th class="border px-3 py-2">Nama Peminjam</th>
                    <th class="border px-3 py-2">Judul Buku</th>
                    <th class="border px-3 py-2">Tanggal Pinjam</th>
                    <th class="border px-3 py-2">Tanggal Kembali</th>
                    <th class="border px-3 py-2">Status</th>
                    <th class="border px-3 py-2">Aksi</th>
                </tr>
            </thead>

            <tbody class="text-sm">
                @foreach($laporans as $laporan)
                <tr>
                    <td class="border px-3 py-2 text-center">
                        {{ $loop->iteration }}
                    </td>

                    <td class="border px-3 py-2 text-center">
                        {{ $laporan->user->name }}
                    </td>

                    <td class="border px-3 py-2 text-center">
                        {{ $laporan->buku->judul }}
                    </td>

                    <td class="border px-3 py-2 text-center">
                        {{ $laporan->tanggal_peminjaman }}
                    </td>

                    <td class="border px-3 py-2 text-center">
                        {{ $laporan->tanggal_pengembalian }}
                    </td>

                    <td class="border px-3 py-2 text-center">
                        @if($laporan->status == 'dipinjam')
                            <span class="bg-indigo-700 text-white px-3 py-1 rounded-full text-xs">
                                Dipinjam
                            </span>
                        @elseif($laporan->status == 'dikembalikan')
                            <span class="bg-green-500 text-white px-3 py-1 rounded-full text-xs">
                                Dikembalikan
                            </span>
                        @endif
                    </td>

                    <td class="border px-3 py-2 text-center">
                        <a href="{{ route('petugas.laporan.show', $laporan->id) }}"
                           class="border px-3 py-1 rounded inline-block">
                            Detail
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </div>
</div>
@endsection