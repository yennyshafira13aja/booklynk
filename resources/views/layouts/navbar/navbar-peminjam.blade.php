@php
use App\Models\KoleksiPribadi;

$jumlahKoleksi = 0;

if(auth()->check()){
    $jumlahKoleksi = KoleksiPribadi::where('user_id', auth()->id())->count();
}
@endphp

<!-- STRIP ATAS -->
<div class="bg-[#2F6F7E] h-6 w-full"></div>

<div class="max-w-6xl mx-auto px-6 mt-6">
    <div class="bg-[#FFFFFF] border-2 border-black rounded-full px-8 py-4 flex justify-between items-center">

        <!-- LOGO -->
        <div class="text-2xl font-bold">
            BookLynk
        </div>

        <!-- MENU -->
        <div class="flex items-center gap-10 text-lg">

            <a href="{{ route('peminjam.dashboard') }}">Home</a>

            <a href="{{ route('peminjam.katalog-buku') }}">Katalog Buku</a>

            <a href="{{ route('peminjam.riwayat') }}">Riwayat</a>

            <!-- FAVORITE -->
            <a href="{{ route('peminjam.koleksi') }}" class="relative">

                <span class="text-xl hover:text-red-500 transition">
                    ♡
                </span>

                @if($jumlahKoleksi > 0)
                    <span class="absolute -top-2 -right-3 bg-red-500 text-white text-xs px-2 rounded-full">
                        {{ $jumlahKoleksi }}
                    </span>
                @endif

            </a>

            <!-- PROFILE -->
            <a href="{{ route('profile') }}" class="text-xl hover:text-indigo-600">
    👤
</a>


        </div>
    </div>
</div>
