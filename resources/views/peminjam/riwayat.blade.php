@extends('layouts.peminjaman')

@section('content')

<div class="max-w-6xl mx-auto px-16 py-10">

    <h2 class="text-xl italic text-[#1B2C8D] mb-8">
    ✨ <span class="bg-[#FFD1E4] px-2 inline-block">Riwayat Buku</span> ✨
</h2>

    <div class="grid grid-cols-5 gap-8">
        @forelse($riwayats as $riwayat)

        <div>
    <img src="{{ asset('images/buku/'.$riwayat->buku->cover) }}"
         class="w-36 h-52 object-cover rounded shadow">

    <h3 class="mt-2 font-semibold uppercase text-sm">
        {{ $riwayat->buku->judul }}
    </h3>

    <p class="text-sm text-gray-600">
        {{ $riwayat->buku->pengarang }}
    </p>

@if($riwayat->status == 'dipinjam')
<button onclick="openModal({{ $riwayat->id }})"
        class="text-gray-400 hover:text-blue-600">
    ↩
</button>
@else
<p class="text-green-600 text-sm mt-2">✔ Dikembalikan</p>
@endif

</div>

        @empty
            <p class="text-gray-500">Belum ada riwayat peminjaman</p>
        @endforelse
    </div>

</div>

<!-- MODAL KEMBALIKAN -->
<div id="kembaliModal"
     class="fixed inset-0 bg-black/40 hidden items-center justify-center">

    <div class="bg-[#CFE0D6] w-[420px] rounded-2xl p-8 relative text-center">

        <!-- CLOSE -->
        <button onclick="closeModal()" class="absolute right-4 top-2 text-xl">
            ×
        </button>

        <h2 class="text-xl font-semibold mb-3">
            Kembalikan Buku
        </h2>

        <p class="text-gray-700 mb-6">
            Apakah Anda akan kembalikan item ini dari daftar riwayat?
        </p>

        <form id="formKembali" method="POST">
            @csrf
            <button class="bg-[#2E3FA3] text-white px-6 py-2 rounded-lg">
                Kembalikan
            </button>
        </form>

    </div>
</div>


<!-- FOOTER -->
<footer class="bg-[#CEE5D5] pt-12">

    <div class="max-w-6xl mx-auto px-16 grid md:grid-cols-3 gap-10">

        <!-- LEFT -->
        <div>
            <h2 class="text-3xl font-bold mb-3">BookLynk</h2>
            <p class="text-gray-800 leading-relaxed mb-4">
                Perpustakaan umum menyediakan layanan peminjaman buku
                yang praktis untuk memudahkan akses bacaan dan
                meningkatkan minat membaca.
            </p>

            <!-- SOCIAL -->
            <div class="flex gap-4 text-lg">
                <span>f</span>
                <span>◎</span>
                <span>X</span>
            </div>
        </div>

        <!-- CENTER -->
        <div>
            <h3 class="font-semibold mb-3">Help</h3>
            <p>FAQ</p>
            <p>Store Location</p>
            <p>Offers</p>
        </div>

        <!-- RIGHT -->
        <div>
            <h3 class="font-semibold mb-3">Contact</h3>
            <p>Whatsapp : +62 882-9396-6933</p>
            <p>booklynk@gmail.com</p>
        </div>

    </div>

    <!-- BOTTOM BAR -->
    <div class="mt-10 border-t border-gray-500">
        <div class="bg-[#2F6F7E] text-white text-center py-3 text-sm">
            ©2026 BookLynk
        </div>
    </div>

</footer>


<script>
function openModal(id) {
    const modal = document.getElementById('kembaliModal');
    modal.classList.remove('hidden');
    modal.classList.add('flex');

    document.getElementById('formKembali').action =
        "/peminjam/kembalikan/" + id;
}

function closeModal() {
    const modal = document.getElementById('kembaliModal');
    modal.classList.add('hidden');
    modal.classList.remove('flex');
}
</script>

@endsection
