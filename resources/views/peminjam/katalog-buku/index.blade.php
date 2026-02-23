@extends('layouts.peminjaman')

@section('content')

<section class="bg-[#FFFFFF] py-14">

    <div class="max-w-6xl mx-auto px-16">

       <h2 class="text-xl italic text-[#1B2C8D] text-center mb-8">
    ✨ <span class="bg-[#FFD1E4] px-2 inline-block">Best Seller</span> ✨
</h2>

<div class="grid grid-cols-4 gap-12">

    @foreach ($buku as $item)
    <div class="bg-[#214E5F] rounded-xl p-4 shadow-md text-center 
                hover:scale-105 transition duration-300">

        <!-- COVER -->
        <img src="{{ asset('images/buku/'.$item->cover) }}"
             class="h-72 w-full object-cover rounded-md">

        <!-- TITLE -->
        <p class="mt-4 text-white font-semibold text-lg">
            {{ $item->judul }}
        </p>

        <!-- AUTHOR -->
        <p class="text-gray-200 text-sm mt-1">
            {{ $item->pengarang }}
        </p>

        <!-- BUTTON -->
        <div class="flex justify-center items-center gap-2 mt-3">
            <a href="{{ route('peminjam.buku.detail', $item->id) }}"
               class="bg-pink-500 px-4 py-1 rounded-full text-xs text-white">
                Detail
            </a>
            <form action="{{ route('peminjam.koleksi.store', $item->id) }}" method="POST">
    @csrf
    <button type="submit"
        class="text-white text-lg hover:text-pink-400 transition">
        ♡
    </button>
</form>


        </div>

    </div>
    @endforeach

</div>



    </div>

</section>


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


@endsection
