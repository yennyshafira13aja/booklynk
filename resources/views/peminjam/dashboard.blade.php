@extends('layouts.peminjaman')

@section('content')

<!-- HERO -->
<section class="py-16">
    <div class="max-w-6xl mx-auto px-16">
        <div class="grid md:grid-cols-2 items-center gap-10">

            <!-- TEXT -->
            <div>
                <h1 class="text-5xl font-bold mb-4">
                    BookLynk
                </h1>

                <h2 class="text-4xl italic text-[#1B2C8D] leading-snug mb-6">
                    <span class="bg-[#FFD1E4] px-1 inline-block">Easy Book</span><br>
                    <span class="bg-[#FFD1E4] px-1 inline-block">Borrowing Made</span><br>
                    <span class="bg-[#FFD1E4] px-1 inline-block">Simple.</span>
                </h2>

                <p class="text-gray-800 text-lg">
                    Search and borrow books<br>
                    quickly through one simple platform.
                </p>
            </div>

            <!-- IMAGE -->
            <div class="flex justify-center">
                <img src="{{ asset('images/books.png') }}" class="w-[560px]">
            </div>

        </div>

        <!-- BUTTON -->
        <div class="flex justify-center mt-10">
            <a href="{{ route('peminjam.katalog-buku') }}"
               class="border-2 border-black px-8 py-2 rounded-full bg-white hover:bg-gray-100 transition">
                Start Borrowing
            </a>
        </div>
    </div>
</section>

<!-- RUNNING TEXT -->
<div class="bg-[#CEE5D5] py-2 overflow-hidden w-screen relative left-1/2 -ml-[50vw]">
    <div class="whitespace-nowrap animate-[marquee_12s_linear_infinite]">
        Reading made simple | Reading made simple | Reading made simple | Reading made simple | Reading made simple | Reading made simple | Reading made simple | Reading made simple | Reading made simple | Reading made simple | Reading made simple | Reading made simple | Reading made simple | Reading made simple | Reading made simple | Reading made simple | Reading made simple | Reading made simple | Reading made simple | Reading made simple | Reading made simple | Reading made simple | Reading made simple | Reading made simple
    </div>
</div>

<!-- WELCOME -->
<section class="text-center py-10">
    <h2 class="text-2xl font-bold text-[#1B2C8D] mb-2">
        ✨ Welcome To BookLynk ✨
    </h2>
    <p class="text-gray-600 max-w-xl mx-auto">
        Our public library provides an easy and organized book borrowing
        service to give the community quick access to reading materials.
    </p>
</section>

<!-- ABOUT -->
<section class="bg-[#CEE5D5] py-12 px-16">
    <div class="max-w-6xl mx-auto grid md:grid-cols-2 gap-10 items-center">

        <div>
            <h2 class="text-xl italic text-[#1B2C8D] mb-3">
            <span class="bg-[#FFD1E4] px-2">About Us</span>
            </h2>

            <p class="text-gray-700 leading-relaxed">
                Perpustakaan umum berfokus pada layanan peminjaman buku untuk masyarakat.
                Dengan sistem yang sederhana dan terorganisir, perpustakaan memudahkan
                pengunjung mengakses berbagai koleksi bacaan serta mendorong kebiasaan
                membaca secara nyaman dan tertib.
            </p>
        </div>

        <div class="flex justify-center">
            <img src="{{ asset('images/laki.png') }}" class="w-[250px]">
        </div>

    </div>
</section>

<!-- BEST SELLER -->
<section class="bg-[#FFFFFF] py-14 mb-20">

<div class="max-w-6xl mx-auto px-16">

    <h2 class="text-xl italic text-[#1B2C8D] text-center mb-8">
        ✨ <span class="bg-[#FFD1E4] px-2 inline-block">Best Seller</span> ✨
    </h2>

    <div class="grid grid-cols-4 gap-12">

        @foreach($bestSeller as $buku)
        <div class="bg-[#214E5F] rounded-xl p-4 shadow-md text-center 
                    hover:scale-105 transition duration-300">

            <!-- COVER -->
            <img src="{{ asset('images/buku/'.$buku->cover) }}"
                 class="h-72 w-full object-cover rounded-md">

            <!-- TITLE -->
            <p class="mt-4 text-white font-semibold text-lg">
                {{ $buku->judul }}
            </p>

            <!-- AUTHOR -->
            <p class="text-gray-200 text-sm mt-1">
                {{ $buku->pengarang }}
            </p>

            <!-- BUTTON -->
            <div class="flex justify-center items-center gap-2 mt-3">
                <a href="{{ route('peminjam.buku.detail', $buku->id) }}"
                   class="bg-pink-500 px-4 py-1 rounded-full text-xs text-white">
                    Detail
                </a>

                <span class="text-white text-lg">♡</span>
            </div>

        </div>
        @endforeach

    </div>

</div>
</section>


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
