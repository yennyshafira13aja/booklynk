@extends('layouts.peminjaman')

@section('content')

<div class="max-w-6xl mx-auto px-16 py-10">

    <h2 class="text-xl italic text-[#1B2C8D] mb-8">
        ✨ <span class="bg-[#FFD1E4] px-2 inline-block">Koleksi Saya</span> ✨
    </h2>

    <div class="grid grid-cols-5 gap-8">

        @forelse($koleksi as $item)

        <div>
            <img src="{{ asset('images/buku/'.$item->buku->cover) }}"
                 class="w-36 h-52 object-cover rounded shadow">

            <h3 class="mt-2 font-semibold uppercase text-sm">
                {{ $item->buku->judul }}
            </h3>

            <p class="text-sm text-gray-600">
                {{ $item->buku->pengarang }}
            </p>
        </div>

        @empty
            <p class="text-gray-500 col-span-5">
                Belum ada koleksi buku
            </p>
        @endforelse

    </div>

</div>


<!-- FOOTER -->
<footer class="bg-[#CEE5D5] pt-12">

    <div class="max-w-6xl mx-auto px-16 grid md:grid-cols-3 gap-10">

        <div>
            <h2 class="text-3xl font-bold mb-3">BookLynk</h2>
            <p class="text-gray-800 leading-relaxed mb-4">
                Perpustakaan umum menyediakan layanan peminjaman buku
                yang praktis untuk memudahkan akses bacaan dan
                meningkatkan minat membaca.
            </p>
        </div>

        <div>
            <h3 class="font-semibold mb-3">Help</h3>
            <p>FAQ</p>
            <p>Store Location</p>
            <p>Offers</p>
        </div>

        <div>
            <h3 class="font-semibold mb-3">Contact</h3>
            <p>Whatsapp : +62 882-9396-6933</p>
            <p>booklynk@gmail.com</p>
        </div>

    </div>

    <div class="mt-10 border-t border-gray-500">
        <div class="bg-[#2F6F7E] text-white text-center py-3 text-sm">
            ©2026 BookLynk
        </div>
    </div>

</footer>

@endsection
