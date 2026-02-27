@extends('layouts.petugas')

@section('content')

<div class="px-6 py-6">

    <h1 class="text-xl font-bold mb-4">Approval Peminjaman</h1>

    @foreach($peminjamans as $p)
    <div class="bg-white p-4 rounded shadow mb-3">

        <p><b>{{ $p->user->name }}</b></p>
        <p>{{ $p->buku->judul }}</p>

        <div class="flex gap-2 mt-2">
            <form action="{{ route('petugas.peminjaman.approve', $p->id) }}" method="POST">
                @csrf
                <button class="bg-green-500 text-white px-3 py-1 rounded">
                    Approve
                </button>
            </form>

            <form action="{{ route('petugas.peminjaman.tolak', $p->id) }}" method="POST">
                @csrf
                <button class="bg-red-500 text-white px-3 py-1 rounded">
                    Tolak
                </button>
            </form>
        </div>

    </div>
    @endforeach

</div>

@endsection