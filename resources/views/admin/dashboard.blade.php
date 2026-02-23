@extends('layouts.admin')

@section('content')

<div class="px-6 py-6">

    <!-- JUDUL -->
    <h1 class="text-2xl font-bold mb-1">Dashboard Admin</h1>
    <p class="text-gray-500 mb-6">Perpustakaan Umum BookLynk</p>

    <!-- 🔥 CARD STATISTIK (TARO DI SINI) -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">

        <div class="bg-white rounded-xl shadow p-5 flex items-center justify-between">
            <div>
                <p class="text-sm text-gray-500">Total Buku</p>
                <h3 class="text-2xl font-bold">{{ $totalBuku }}</h3>
            </div>
            <div class="bg-indigo-100 p-3 rounded-lg">📘</div>
        </div>

        <div class="bg-white rounded-xl shadow p-5 flex items-center justify-between">
            <div>
                <p class="text-sm text-gray-500">Total Anggota</p>
                <h2 class="text-2xl font-bold">{{ $totalAnggota }}</h2>
            </div>
            <div class="bg-indigo-100 p-3 rounded-lg">👤</div>
        </div>

        <div class="bg-white rounded-xl shadow p-5 flex items-center justify-between">
            <div>
                <p class="text-sm text-gray-500">Buku Dipinjam</p>
                <h3 class="text-2xl font-bold">{{ $bukuDipinjam }}</h3>
            </div>
            <div class="bg-indigo-100 p-3 rounded-lg">📚</div>
        </div>

        <div class="bg-white rounded-xl shadow p-5 flex items-center justify-between">
            <div>
                <p class="text-sm text-gray-500">Belum Dikembalikan</p>
                <h3 class="text-2xl font-bold">{{ $belumKembali }}</h3>
            </div>
            <div class="bg-indigo-100 p-3 rounded-lg">↩️</div>
        </div>

    </div>

 <!-- BAWAH -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 items-stretch">

        <!-- PEMINJAMAN -->
        <div class="bg-white p-6 rounded-xl shadow">

            <h2 class="text-xl font-bold mb-6">Peminjaman Terbaru</h2>

            @forelse($peminjamanTerbaru as $item)

            <div class="flex justify-between items-center py-4 border-b last:border-0">

                <div>
                    @if($item->status == 'dipinjam')
                        <p>
                            <span class="font-semibold">{{ $item->user->name }}</span>
                            meminjam
                            <span class="text-blue-600 font-semibold">
                                "{{ $item->buku->judul }}"
                            </span>
                        </p>

                        <p class="text-sm text-gray-500">
                            {{ \Carbon\Carbon::parse($item->tanggal_pinjam)->format('d M Y') }}
                            • Kembali
                            {{ \Carbon\Carbon::parse($item->tanggal_kembali)->format('d M Y') }}
                        </p>
                    @else
                        <p>
                            <span class="font-semibold">{{ $item->user->name }}</span>
                            mengembalikan
                            <span class="text-green-600 font-semibold">
                                "{{ $item->buku->judul }}"
                            </span>
                        </p>

                        <p class="text-sm text-gray-500">
                            {{ \Carbon\Carbon::parse($item->updated_at)->diffForHumans() }}
                        </p>
                    @endif
                </div>

                <div>
                    @if($item->status == 'dipinjam')
                        <span class="bg-indigo-600 text-white px-4 py-1 rounded-full text-sm">
                            Dipinjam
                        </span>
                    @else
                        <span class="bg-green-500 text-white px-4 py-1 rounded-full text-sm">
                            Dikembalikan
                        </span>
                    @endif
                </div>

            </div>

            @empty
                <p class="text-gray-500">Belum ada aktivitas</p>
            @endforelse

        </div>

        <!-- ⭐ BUKU TERPOPULER -->
        <div class="bg-white rounded-xl shadow p-6">

            <h2 class="text-lg font-semibold mb-6">Buku Terpopuler</h2>

            <div class="space-y-5 text-sm">

                @forelse($bukuTerpopuler as $index => $buku)

                <div class="flex items-center justify-between">

                    <div class="flex items-center gap-4">

                        <span class="font-bold text-gray-400 w-5">
                            {{ $index + 1 }}
                        </span>

                        <div>
                            <p class="font-semibold text-gray-800">
                                {{ $buku->judul }}
                            </p>
                            <p class="text-xs text-gray-400">
                                {{ $buku->pengarang }}
                            </p>
                        </div>

                    </div>

                    <span class="text-indigo-600 text-xs bg-indigo-50 px-3 py-1 rounded-full">
                        {{ $buku->peminjamans_count }}x dipinjam
                    </span>

                </div>

                @empty
                    <p class="text-gray-400">Belum ada data</p>
                @endforelse

            </div>

        </div>

    </div>

</div>

@endsection