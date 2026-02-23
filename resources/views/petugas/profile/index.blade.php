@extends('layouts.petugas')

@section('content')
<div class="p-8">

    <h1 class="text-2xl font-bold mb-6">Profile</h1>

    <div class="bg-white rounded-xl shadow p-6 max-w-xl">

        <form action="{{ route('profile.update') }}" method="POST" class="space-y-4">
            @csrf

            <!-- NAMA -->
            <div>
                <label class="font-semibold">Nama</label>
                <input type="text"
                       name="name"
                       value="{{ auth()->user()->name }}"
                       class="w-full border p-2 rounded">
            </div>

            <!-- EMAIL -->
            <div>
                <label class="font-semibold">Email</label>
                <input type="email"
                       name="email"
                       value="{{ auth()->user()->email }}"
                       class="w-full border p-2 rounded">
            </div>

            <!-- PASSWORD -->
            <div>
                <label class="font-semibold">Password Baru</label>
                <input type="password"
                       name="password"
                       placeholder="Kosongkan jika tidak diubah"
                       class="w-full border p-2 rounded">
            </div>

            <!-- ROLE -->
            <div>
                <span class="bg-green-300 px-3 py-1 rounded text-sm">
                    {{ ucfirst(auth()->user()->role) }}
                </span>
            </div>

            <!-- BUTTON -->
            <button class="bg-indigo-600 text-white px-4 py-2 rounded">
                Simpan Perubahan
            </button>
        </form>

        <!-- LOGOUT -->
        <div class="mt-6">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button class="text-red-500 underline">
                    Log Out
                </button>
            </form>
        </div>

    </div>
</div>
@endsection