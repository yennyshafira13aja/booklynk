@extends('layouts.admin')

@section('content')
<div class="px-6 py-6">

    <!-- HEADER -->
    <div class="flex items-center justify-between mb-6">
        <div>
            <h1 class="text-2xl font-bold text-gray-800">Data Petugas</h1>
            <p class="text-sm text-gray-500">Kelola data petugas perpustakaan</p>
        </div>

        <a href="{{ route('admin.petugas.create') }}"
           class="bg-[#3E3E7C] hover:bg-[#3E3E7C] text-white text-sm px-4 py-2 rounded-lg shadow">
            + Tambah Petugas
        </a>
    </div>

    <!-- CARD TABEL -->
    <div class="bg-white rounded-xl shadow overflow-hidden">

        <div class="px-5 py-4 bg-white border-b">
            <h2 class="font-semibold text-gray-700">Daftar Nama Petugas</h2>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full border-collapse">
                <thead class="bg-[#86C5D6] text-black text-sm">
                    <tr>
                        <th class="px-4 py-3 text-center border">No</th>
                        <th class="px-4 py-3 border">Nama Petugas</th>
                        <th class="px-4 py-3 border">Email</th>
                        <th class="px-4 py-3 text-center border">Status</th>
                        <th class="px-4 py-3 text-center border">Aksi</th>
                    </tr>
                </thead>

                <tbody class="text-sm">
                    @foreach ($petugas as $item)
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-3 text-center border">
                            {{ $loop->iteration }}
                        </td>

                        <td class="px-4 py-3 text-center border">
                            {{ $item->name }}
                        </td>

                        <td class="px-4 py-3 text-center border">
                            {{ $item->email }}
                        </td>

                        <td class="px-4 py-3 text-center border">
                            @if ($item->status == 'aktif')
                                <span class="bg-indigo-600 text-white px-3 py-1 rounded-full text-xs">
                                    Aktif
                                </span>
                            @else
                                <span class="bg-[#CC4A80] text-white px-3 py-1 rounded-full text-xs">
                                    Tidak Aktif
                                </span>
                            @endif
                        </td>

                        <td class="px-4 py-3 text-center border">
                            <div class="flex justify-center gap-2">
                                <a href="{{ route('admin.petugas.edit', $item->id) }}"
                                class="bg-[#33A970] text-white text-xs px-3 py-1 rounded">
                                 Edit
                                </a>

                                <form action="/admin/petugas/{{ $item->id }}"
      method="POST"
      onsubmit="return confirm('Yakin ingin menghapus petugas ini?')">
    @csrf
    @method('DELETE')

    <button class="bg-red-500 text-white text-xs px-3 py-1 rounded">
        Hapus
    </button>
</form>


                            </div>
                        </td>
                    </tr>
                    @endforeach

                    @if ($petugas->isEmpty())
                    <tr>
                        <td colspan="5" class="text-center text-gray-400 py-6">
                            Data petugas belum tersedia
                        </td>
                    </tr>
                    @endif
                </tbody>
            </table>
        </div>

    </div>

</div>
@endsection
