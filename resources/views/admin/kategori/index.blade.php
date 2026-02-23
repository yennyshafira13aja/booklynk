@extends('layouts.admin')

@section('content')
<div class="px-6 py-6">

    <!-- HEADER -->
    <div class="flex items-center justify-between mb-6">
        <div>
            <h1 class="text-2xl font-bold text-gray-800">Data Kategori</h1>
            <p class="text-sm text-gray-500">Kelola data kategori perpustakaan</p>
        </div>

        <a href="{{ route('admin.kategori.create') }}"
           class="bg-[#3E3E7C] text-white text-sm px-4 py-2 rounded-lg shadow">
            + Tambah Kategori
        </a>
    </div>

    <!-- CARD -->
    <div class="bg-white rounded-xl shadow overflow-hidden">

        <!-- CARD TITLE -->
        <div class="px-5 py-4 border-b bg-gray-50">
            <h2 class="font-semibold text-gray-700">Daftar Kategori</h2>
        </div>

        <!-- TABLE -->
        <table class="w-full border-collapse">
            <thead class="bg-[#86C5D6] text-sm">
                <tr>
                    <th class="px-4 py-3 border text-center">No</th>
                    <th class="px-4 py-3 border">Kategori</th>
                    <th class="px-4 py-3 border text-center">Aksi</th>
                </tr>
            </thead>

            <tbody class="text-sm">
                @forelse($kategoris as $kategori)
                <tr class="hover:bg-gray-50">
                    <td class="px-4 py-3 border text-center">
                        {{ $loop->iteration }}
                    </td>

                    <td class="px-4 py-3 border text-center">
                        {{ $kategori->nama }}
                    </td>

                    <td class="px-4 py-3 border text-center">
                        <div class="flex justify-center gap-2">

                            <a href="{{ route('admin.kategori.edit', $kategori->id) }}"
                            class="bg-[#33A970] text-white text-xs px-3 py-1 rounded">
                            Edit
                            </a>


                            <form action="{{ route('admin.kategori.destroy', $kategori->id) }}"
                                  method="POST">
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
                    <td colspan="3" class="text-center py-6 text-gray-400">
                        Data kategori belum tersedia
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>

    </div>

</div>
@endsection
