@extends('layouts.peminjaman')

@section('content')

<div class="max-w-5xl mx-auto px-16 py-12">

    <!-- BACK -->
    <a href="{{ route('peminjam.katalog-buku') }}" class="text-lg">
        ← Detail Buku
    </a>

    <!-- TOP -->
    <div class="flex gap-14 mt-8 items-start">

        <!-- COVER -->
        <img src="{{ asset('images/buku/'.$buku->cover) }}"
             class="w-[210px] h-[310px] object-cover rounded-lg shadow">

        <!-- INFO -->
        <div>
            <h1 class="text-2xl font-bold">
                {{ $buku->judul }}
            </h1>

            <span class="bg-[#CFE0D6] px-3 py-1 rounded mt-2 inline-block">
                {{ $buku->kategori }}
            </span>

            <p class="mt-2 text-gray-700">
                {{ $buku->pengarang }}
            </p>

            <div class="flex items-center gap-2 mt-3 text-yellow-500">
                ⭐ ⭐ ⭐ ⭐ ⭐
                <span class="text-black">5.0</span>
            </div>

            <button onclick="openModal()"
        class="bg-[#2E3FA3] text-white px-6 py-2 rounded-lg mt-5">
    Pinjam Sekarang
</button>

            <!-- MODAL -->
<div id="pinjamModal"
     class="fixed inset-0 bg-black/40 hidden items-center justify-center">

    <div class="bg-[#173B55] p-8 rounded-2xl w-[400px] text-white">

        <h2 class="text-center text-xl font-semibold mb-4">
            Form Peminjaman
        </h2>

        <form action="{{ route('peminjam.pinjam.store') }}" method="POST">
            @csrf

            <input type="hidden" name="buku_id" value="{{ $buku->id }}">

            <input type="text"
                   value="{{ auth()->user()->name }}"
                   class="w-full p-2 rounded bg-slate-200 mb-3 text-black"
                   readonly>

            <input type="text"
                   value="{{ $buku->judul }}"
                   class="w-full p-2 rounded bg-slate-200 mb-3 text-black"
                   readonly>

            <input type="date"
                   name="tanggal_pinjam"
                   class="w-full p-2 rounded bg-slate-200 mb-3 text-black"
                   required>

            <input type="date"
                   name="tanggal_kembali"
                   class="w-full p-2 rounded bg-slate-200 mb-4 text-black"
                   required>

            <div class="flex justify-end gap-3">
                <button type="button"
                        onclick="closeModal()"
                        class="bg-gray-200 text-black px-4 py-2 rounded">
                    Cancel
                </button>

                <button class="bg-pink-500 px-4 py-2 rounded">
                    Confirm
                </button>
            </div>
        </form>
        </div>
        </div>
        </div>

    </div>

    <!-- TAB MENU -->
    <div class="flex justify-center gap-12 mt-12 border-b pb-2 text-gray-600">
        <button onclick="showTab('sinopsis')" class="tab-btn tab-active">Sinopsis</button>
        <button onclick="showTab('detail')" class="tab-btn">Detail</button>
        <button onclick="showTab('ulasan')" class="tab-btn">Ulasan</button>
    </div>

    <!-- SINOPSIS -->
    <div id="sinopsis" class="mt-6">
        <p class="leading-relaxed">
            {{ $buku->sinopsis ?? 'Sinopsis belum tersedia.' }}
        </p>
    </div>

    <!-- DETAIL -->
    <div id="detail" class="mt-6 hidden">
        <div class="grid grid-cols-2 gap-4">
            <p class="font-semibold">Pengarang</p>
            <p>{{ $buku->pengarang }}</p>

            <p class="font-semibold">Penerbit</p>
            <p>{{ $buku->penerbit }}</p>

            <p class="font-semibold">Tahun Terbit</p>
            <p>{{ $buku->tahun_terbit }}</p>

            <p class="font-semibold">Kategori</p>
            <p>{{ $buku->kategori }}</p>
        </div>
    </div>

    <!-- ULASAN -->
   <div id="ulasan" class="mt-6 hidden">

@forelse($ulasans as $ulasan)
<div class="border-b py-2">
    <p class="font-semibold">{{ $ulasan->user->name }}</p>
    <p>Rating: {{ $ulasan->rating }} ⭐</p>
    <p>{{ $ulasan->review }}</p>
</div>
@empty
<p class="text-gray-500">Belum ada ulasan</p>
@endforelse

</div>

<script>
function showTab(tab) {
    document.getElementById('sinopsis').classList.add('hidden');
    document.getElementById('detail').classList.add('hidden');
    document.getElementById('ulasan').classList.add('hidden');

    document.getElementById(tab).classList.remove('hidden');

    document.querySelectorAll('.tab-btn').forEach(btn => {
        btn.classList.remove('tab-active');
    });

    event.target.classList.add('tab-active');
}
</script>

<script>
function openModal() {
    const modal = document.getElementById('pinjamModal');
    modal.classList.remove('hidden');
    modal.classList.add('flex');
}

function closeModal() {
    const modal = document.getElementById('pinjamModal');
    modal.classList.add('hidden');
    modal.classList.remove('flex');
}
</script>

<style>
.tab-btn { font-weight: 500; }
.tab-active {
    border-bottom: 2px solid #2E3FA3;
    color: #2E3FA3;
}
</style>

@endsection
