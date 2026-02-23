<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Admin - BookLynk</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100">

<nav class="bg-[#CEE7FD] shadow">
    <div class="max-w-7xl mx-auto px-6">
        <div class="flex justify-between h-16 items-center">
            <h1 class="text-xl font-bold text-gray-800">BookLynk</h1>

            <div class="flex gap-6 text-sm font-medium items-center">

                <a href="{{ route('admin.dashboard') }}"
                   class="{{ request()->routeIs('admin.dashboard')
                        ? 'text-blue-600 font-semibold border-b-2 border-blue-600'
                        : 'text-gray-700 hover:text-blue-600' }}">
                    Dashboard
                </a>

                <a href="{{ route('admin.peminjam.index') }}"
                   class="{{ request()->routeIs('admin.peminjam.index')
                        ? 'text-blue-600 font-semibold border-b-2 border-blue-600'
                        : 'text-gray-700 hover:text-blue-600' }}">
                    Data Peminjam
                </a>

                <a href="{{ route('admin.petugas.index') }}"
                   class="{{ request()->routeIs('admin.petugas.index')
                        ? 'text-blue-600 font-semibold border-b-2 border-blue-600'
                        : 'text-gray-700 hover:text-blue-600' }}">
                    Data Petugas
                </a>

                <a href="{{ route('admin.buku.index') }}"
                   class="{{ request()->routeIs('admin.buku.index')
                        ? 'text-blue-600 font-semibold border-b-2 border-blue-600'
                        : 'text-gray-700 hover:text-blue-600' }}">
                    Data Buku
                </a>

                <a href="{{ route('admin.kategori.index') }}"
                   class="{{ request()->routeIs('admin.kategori.index')
                        ? 'text-blue-600 font-semibold border-b-2 border-blue-600'
                        : 'text-gray-700 hover:text-blue-600' }}">
                    Data Kategori
                </a>

                <a href="{{ route('admin.laporan.index') }}"
                   class="{{ request()->routeIs('admin.laporan.index')
                        ? 'text-blue-600 font-semibold border-b-2 border-blue-600'
                        : 'text-gray-700 hover:text-blue-600' }}">
                    Laporan
                </a>

                <a href="{{ route('admin.ulasan.index') }}"
                   class="{{ request()->routeIs('admin.ulasan.index')
                        ? 'text-blue-600 font-semibold border-b-2 border-blue-600'
                        : 'text-gray-700 hover:text-blue-600' }}">
                    Ulasan
                </a>
                

               <a href="{{ route('profile') }}" class="text-xl hover:text-indigo-600">
                👤
                </a>

            </div>
        </div>
    </div>
</nav>

<main class="max-w-7xl mx-auto px-6 py-8">
    @yield('content')
</main>

</body>
</html>
