@extends('layouts.peminjaman')

@section('content')
<div class="max-w-lg mx-auto mt-20 bg-white p-8 rounded shadow">

    <h2 class="text-xl font-bold mb-4">
        Beri Rating Buku
    </h2>

    <p class="mb-4">{{ $buku->judul }}</p>

    <form action="{{ route('peminjam.rating.store') }}" method="POST">
        @csrf

        <input type="hidden" name="buku_id" value="{{ $buku->id }}">

        <label>Rating</label>
        <select name="rating" class="w-full border p-2 mb-3">
            <option value="5">⭐⭐⭐⭐⭐</option>
            <option value="4">⭐⭐⭐⭐</option>
            <option value="3">⭐⭐⭐</option>
            <option value="2">⭐⭐</option>
            <option value="1">⭐</option>
        </select>

        <label>Review</label>
        <textarea name="review" class="w-full border p-2 mb-4"></textarea>

        <button class="bg-indigo-600 text-white px-4 py-2 rounded">
            Kirim Rating
        </button>
    </form>
</div>
@endsection
