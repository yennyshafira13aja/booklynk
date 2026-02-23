@extends('layouts.petugas')

@section('content')
<div class="px-6 py-6">

    <!-- HEADER -->
    <h1 class="text-2xl font-bold text-gray-800">Data Peminjam</h1>
    <p class="text-gray-500 mb-6">Kelola data peminjaman buku</p>

    <!-- CARD -->
    <div class="bg-white rounded-xl shadow overflow-hidden">

        <!-- TITLE -->
        <div class="px-6 py-4 bg-gray-100 border-b">
            <h2 class="font-semibold text-gray-700">Data Peminjam</h2>
        </div>

        <!-- TABLE -->
        <div class="overflow-x-auto">
            <table class="w-full border-collapse">
                <thead class="bg-[#86C5D6] text-gray-700 text-sm">
                    <tr>
                        <th class="px-4 py-3 border text-center">No</th>
                        <th class="px-4 py-3 border">Nama Peminjam</th>
                        <th class="px-4 py-3 border">Email</th>
                        <th class="px-4 py-3 border text-center">Role</th>
                        <th class="px-4 py-3 border text-center">Aksi</th>
                    </tr>
                </thead>

                <tbody class="text-sm">
                    @forelse ($peminjams as $item)
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-3 border text-center">
                            {{ $loop->iteration }}
                        </td>

                        <td class="px-4 py-3 border">
                            {{ $item->name }}
                        </td>

                        <td class="px-4 py-3 border">
                            {{ $item->email }}
                        </td>

                        <td class="px-4 py-3 border text-center">
                            <span class="bg-blue-100 text-gray-700 px-3 py-1 rounded-md text-xs">
                                Peminjam
                            </span>
                        </td>

                        <td class="px-4 py-3 border text-center">
                            <form action="{{ route('petugas.peminjam.destroy', $item->id) }}"
                                  method="POST"
                                  onsubmit="return confirm('Yakin ingin menghapus peminjam?')">
                                @csrf
                                @method('DELETE')

                                <button
                                    class="bg-red-500 hover:bg-red-600 text-white text-xs px-3 py-1 rounded-md">
                                    Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center py-6 text-gray-400">
                            Data peminjam belum tersedia
                        </td>
                    </tr>
                    @endforelse
                </tbody>

            </table>
        </div>
    </div>

</div>
@endsection