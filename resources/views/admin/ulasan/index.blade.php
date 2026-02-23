@extends('layouts.admin')

@section('content')
<div class="p-8">

    <h1 class="text-2xl font-bold mb-1">Data Ulasan</h1>
    <p class="text-gray-500 mb-6">Daftar ulasan buku dari peminjam</p>

    <div class="space-y-6">

        @foreach($ulasans as $ulasan)
        <div class="bg-white p-5 rounded-lg shadow">

            <!-- Nama + Buku -->
            <div class="flex items-center gap-3 mb-2">
                <h2 class="font-semibold text-gray-800">
                    {{ $ulasan->user->name ?? '-' }}
                </h2>

                <span class="text-sm text-gray-400">
                    Buku: {{ $ulasan->buku->judul ?? '-' }}
                </span>

            <span class="text-sm text-gray-400"> Memberikan rating </span>
</div>

            <!-- Rating -->
            <div class="text-yellow-400 mb-2">
                @for($i=1; $i<=5; $i++)
                    @if($i <= $ulasan->rating)
                        ★
                    @else
                        ☆
                    @endif
                @endfor
            </div>

            <!-- Komentar -->
            <p class="text-gray-700">
                {{ $ulasan->ulasan }}
            </p>

        </div>
        @endforeach

    </div>
</div>
@endsection
