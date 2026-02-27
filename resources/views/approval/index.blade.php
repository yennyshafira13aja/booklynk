@extends(auth()->user()->role == 'admin' ? 'layouts.admin' : 'layouts.petugas')

@section('content')
<div class="p-8">

    <!-- TITLE -->
    <h1 class="text-2xl font-bold mb-1">Validasi Peminjaman</h1>
    <p class="text-gray-500 mb-6">Persetujuan peminjaman buku</p>

    <!-- GRID -->
    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">

        @forelse($peminjamans as $p)

        <div class="bg-white rounded-2xl shadow p-5 hover:shadow-lg transition">

            <!-- USER -->
            <div class="flex justify-between items-start mb-3">
                <div>
                    <p class="font-semibold text-lg">{{ $p->user->name }}</p>
                    <p class="text-sm text-gray-400">{{ $p->user->email }}</p>
                </div>

                <!-- STATUS -->
                <span class="bg-yellow-200 text-yellow-800 text-xs px-3 py-1 rounded-full">
                    Menunggu
                </span>
            </div>

            <!-- BUKU -->
            <div class="flex gap-4 items-center mb-4">
                <img src="{{ asset('images/buku/'.$p->buku->cover) }}"
                     class="w-16 h-20 object-cover rounded shadow">

                <div>
                    <p class="font-semibold">{{ $p->buku->judul }}</p>
                    <p class="text-sm text-gray-500">{{ $p->buku->pengarang }}</p>

                    <p class="text-xs text-gray-400 mt-1">
                        📅 {{ $p->tanggal_peminjaman }}
                    </p>
                </div>
            </div>

            <!-- ACTION -->
            <div class="flex gap-2">
                <form action="{{ route(auth()->user()->role.'.approval.approve', $p->id) }}" method="POST" class="w-full">
                    @csrf
                    <button class="w-full bg-green-500 hover:bg-green-600 text-white py-2 rounded-lg">
                        ✓ Approve
                    </button>
                </form>

                <form action="{{ route(auth()->user()->role.'.approval.tolak', $p->id) }}" method="POST" class="w-full">
                    @csrf
                    <button class="w-full bg-red-500 hover:bg-red-600 text-white py-2 rounded-lg">
                        ✕ Tolak
                    </button>
                </form>
            </div>

        </div>

        @empty
            <p class="text-gray-500">Tidak ada permintaan peminjaman</p>
        @endforelse

    </div>

</div>
@endsection