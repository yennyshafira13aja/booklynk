@extends('layouts.petugas')

@section('content')
<div class="px-6 py-6">

    <!-- HEADER -->
    <div class="flex items-center justify-between mb-6">
        <div>
            <h1 class="text-2xl font-bold text-gray-800">Data Buku</h1>
            <p class="text-sm text-gray-500">Kelola data buku perpustakaan</p>
        </div>

        <a href="{{ route('petugas.buku.create') }}"
           class="bg-[#3E3E7C] text-white text-sm px-4 py-2 rounded-lg shadow">
            + Tambah Buku
        </a>
    </div>

    <!-- CARD -->
    <div class="bg-white rounded-xl shadow overflow-hidden">

        <!-- TITLE -->
        <div class="px-5 py-4 bg-gray-100 border-b">
            <h2 class="font-semibold text-gray-700">Daftar Buku</h2>
        </div>

        <!-- TABLE -->
        <div class="overflow-x-auto">
            <table class="w-full border-collapse text-sm">

                <!-- HEADER -->
                <thead class="bg-[#86C5D6] text-black">
                    <tr>
                        <th class="px-4 py-3 border text-center w-10">No</th>
                        <th class="px-4 py-3 border text-center">Cover</th>
                        <th class="px-4 py-3 border text-center">Judul Buku</th>
                        <th class="px-4 py-3 border text-center">Pengarang</th>
                        <th class="px-4 py-3 border text-center">Penerbit</th>
                        <th class="px-4 py-3 border text-center">Tahun</th>
                        <th class="px-4 py-3 border text-center">Kategori</th>
                        <th class="px-4 py-3 border text-center">Stok</th>
                        <th class="px-4 py-3 border text-center">Sinopsis</th>
                        <th class="px-4 py-3 border text-center w-32">Aksi</th>
                    </tr>
                </thead>

                <!-- BODY -->
                <tbody>
                    @forelse ($bukus as $buku)
                    <tr class="hover:bg-gray-50">

                        <td class="px-4 py-3 border text-center">
                            {{ $loop->iteration }}
                        </td>

                        <!-- COVER -->
                        <td class="px-4 py-3 border text-center">
                            <img src="{{ asset('images/buku/'.$buku->cover) }}"
                                 class="w-16 h-20 object-cover rounded mx-auto">
                        </td>

                        <td class="px-4 py-3 border text-center">{{ $buku->judul }}</td>
                        <td class="px-4 py-3 border text-center">{{ $buku->pengarang }}</td>
                        <td class="px-4 py-3 border text-center">{{ $buku->penerbit }}</td>

                        <td class="px-4 py-3 border text-center">
                            {{ $buku->tahun_terbit }}
                        </td>

                        <td class="px-4 py-3 border text-center">
                            {{ $buku->kategori }}
                        </td>

                        <td class="px-4 py-3 border text-center">
                            {{ $buku->stok }}
                        </td>

                        <td class="px-4 py-3 border text-xs text-gray-600 max-w-xs truncate">
                            {{ $buku->sinopsis }}
                        </td>

                        <!-- AKSI -->
                        <td class="px-4 py-3 border text-center">
                            <div class="flex justify-center gap-2">

                                <a href="{{ route('petugas.buku.edit', $buku->id) }}"
                                   class="bg-[#33A970] text-white text-xs px-3 py-1 rounded">
                                    Edit
                                </a>

                                <form action="{{ route('petugas.buku.destroy', $buku->id) }}"
                                      method="POST"
                                      onsubmit="return confirm('Yakin hapus buku ini?')">
                                    @csrf
                                    @method('DELETE')

                                    <button class="bg-red-500 text-white text-xs px-3 py-1 rounded">
                                        Hapus
                                    </button>
                                </form>

                            </div>
                        </td>

                    </tr>

                    @empty
                    <tr>
                        <td colspan="10" class="text-center py-6 text-gray-400">
                            Data buku belum tersedia
                        </td>
                    </tr>
                    @endforelse
                </tbody>

            </table>
        </div>

    </div>
</div>
@endsection