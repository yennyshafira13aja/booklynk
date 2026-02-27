<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ApprovalController;
use App\Http\Controllers\Admin\PetugasController;
use App\Http\Controllers\Admin\PeminjamController;
use App\Http\Controllers\Admin\BukuController;
use App\Http\Controllers\Admin\KategoriController;
use App\Http\Controllers\Admin\LaporanController;
use App\Http\Controllers\Admin\UlasanController;
use App\Http\Controllers\Peminjam\KatalogController;
use App\Http\Controllers\Peminjam\PeminjamanController;
use App\Http\Controllers\Peminjam\RiwayatController;
use App\Http\Controllers\Peminjam\KoleksiController;
use App\Http\Controllers\Petugas\BukuController as PetugasBukuController;
use App\Http\Controllers\Petugas\KategoriBukuController;
use App\Models\Buku;
use App\Models\User;
use App\Models\Peminjaman;


/*
|--------------------------------------------------------------------------
| HOME (GUEST)
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    return view('welcome');
});

/*
|--------------------------------------------------------------------------
| DASHBOARD REDIRECT (SETELAH LOGIN)
|--------------------------------------------------------------------------
*/
Route::get('/dashboard', function () {
    $role = auth()->user()->role;

    return match ($role) {
        'admin'    => redirect()->route('admin.dashboard'),
        'peminjam' => redirect()->route('peminjam.dashboard'),
        'petugas'  => redirect()->route('petugas.dashboard'),
        default    => abort(403),
    };
})->middleware('auth')->name('dashboard');

/*
|-------------------------------------------------------------------------- 
| PROFILE
|-------------------------------------------------------------------------- 
*/
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::post('/profile', [ProfileController::class, 'update'])->name('profile.update');
});



/*
|--------------------------------------------------------------------------
| ADMIN
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'role:admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        // Dashboard
Route::get('/dashboard', function () {

    $totalBuku = Buku::count();
    $totalAnggota = User::where('role', 'peminjam')->count();

    $bukuDipinjam = Peminjaman::where('status', 'dipinjam')->count();
    $belumKembali = Peminjaman::where('status', 'dipinjam')->count();

    // ⭐ BUKU TERPOPULER (TOP 3)
    $bukuTerpopuler = Buku::withCount('peminjamans')
        ->orderByDesc('peminjamans_count')
        ->take(3)
        ->get();

    // 🔥 AMBIL 5 DATA TERBARU
    $peminjamanTerbaru = Peminjaman::with(['user', 'buku'])
        ->latest()
        ->take(3)
        ->get();

    return view('admin.dashboard', compact(
        'totalBuku',
        'totalAnggota',
        'bukuDipinjam',
        'belumKembali',
        'peminjamanTerbaru',
        'bukuTerpopuler'
    ));

})->name('dashboard');



        // Petugas
        Route::get('/petugas', [PetugasController::class, 'index'])
            ->name('petugas.index');
        Route::get('/petugas/create', [PetugasController::class, 'create'])
            ->name('petugas.create');
        Route::post('/petugas', [PetugasController::class, 'store'])
            ->name('petugas.store');
        Route::get('/petugas/{id}/edit', [PetugasController::class, 'edit'])
            ->name('petugas.edit');
        Route::put('/petugas/{id}', [PetugasController::class, 'update'])
            ->name('petugas.update');
        Route::delete('/petugas/{id}', [PetugasController::class, 'destroy'])
            ->name('petugas.destroy');
        Route::delete('/buku/{id}', [BukuController::class, 'destroy'])
            ->name('buku.destroy');

        // ✅ DATA PEMINJAM (USER ROLE PEMINJAM)
        Route::get('/peminjam', [PeminjamController::class, 'index'])
            ->name('peminjam.index');
        Route::get('/peminjam/create', [PeminjamController::class, 'create'])
            ->name('peminjam.create');
        Route::post('/peminjam', [PeminjamController::class, 'store'])
            ->name('peminjam.store');
        Route::get('/peminjam/{id}/edit', [PeminjamController::class, 'edit'])
            ->name('peminjam.edit');
        Route::put('/peminjam/{id}', [PeminjamController::class, 'update'])
            ->name('peminjam.update');
        Route::delete('/peminjam/{id}', [PeminjamController::class, 'destroy'])
            ->name('peminjam.destroy');

        // DATA BUKU
        Route::resource('buku', BukuController::class);

        // KATEGORI BUKU
        Route::get('/kategori', [KategoriController::class, 'index'])->name('kategori.index');
        Route::post('/kategori', [KategoriController::class, 'store'])->name('kategori.store');
        Route::delete('/kategori/{id}', [KategoriController::class, 'destroy'])->name('kategori.destroy');
        Route::get('/kategori/create', [KategoriController::class, 'create'])
            ->name('kategori.create');
        Route::get('/kategori/{id}/edit', [KategoriController::class, 'edit'])
            ->name('kategori.edit');
        Route::put('/kategori/{id}', [KategoriController::class, 'update'])
            ->name('kategori.update');

       // LAPORAN
        Route::get('/laporan', [LaporanController::class, 'index'])
            ->name('laporan.index');
        Route::get('/laporan/cetak', [LaporanController::class, 'cetak'])
            ->name('laporan.cetak');
        Route::get('/laporan/{id}', [LaporanController::class, 'show'])
            ->name('laporan.show');

        //ULASAN
         Route::get('/ulasan', [UlasanController::class, 'index'])
        ->name('ulasan.index');

        // VALIDASI (ADMIN)
Route::get('/approval', [ApprovalController::class, 'index'])
    ->name('approval.index');

Route::post('/approval/{id}/approve', [ApprovalController::class, 'approve'])
    ->name('approval.approve');

Route::post('/approval/{id}/tolak', [ApprovalController::class, 'tolak'])
    ->name('approval.tolak');
    });

/*
|--------------------------------------------------------------------------
| PEMINJAM (USER)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'role:peminjam'])
    ->prefix('peminjam')
    ->name('peminjam.')
    ->group(function () {

      Route::get('/dashboard', function () {
        $bestSeller = Buku::withCount('peminjamans')
        ->orderByDesc('peminjamans_count')
        ->take(4)
        ->get();

    return view('peminjam.dashboard', compact('bestSeller'));
    })->name('dashboard');

        Route::get('/katalog-buku', [KatalogController::class, 'index'])
            ->name('katalog-buku');
        Route::get('/buku/{id}', [KatalogController::class, 'show'])
            ->name('buku.detail');
        Route::get('/riwayat', [RiwayatController::class, 'index'])
            ->name('riwayat');
        Route::post('/kembalikan/{id}', [RiwayatController::class, 'kembalikan'])
            ->name('kembalikan');
        Route::post('/pinjam', [PeminjamanController::class, 'store'])
            ->name('pinjam.store');
        Route::get('/rating/{buku}', [App\Http\Controllers\Peminjam\RatingController::class, 'create'])
            ->name('rating');
        Route::post('/rating', [App\Http\Controllers\Peminjam\RatingController::class, 'store'])
            ->name('rating.store');

        //KOLEKSI PRIBADI
        Route::middleware(['auth','role:peminjam'])->group(function(){

        Route::post('/koleksi/{id}', [KoleksiController::class, 'store'])
            ->name('koleksi.store');

        Route::get('/koleksi', [KoleksiController::class, 'index'])
            ->name('koleksi');

        //PROFILE
        Route::middleware('auth')->group(function () {
        Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
        Route::post('/profile', [ProfileController::class, 'update'])->name('profile.update');
});


});


});


/*
|--------------------------------------------------------------------------
| PETUGAS
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'role:petugas'])
    ->prefix('petugas')
    ->name('petugas.')
    ->group(function () {

        Route::get('/dashboard', function () {

        $totalBuku = Buku::count();
        $totalAnggota = User::where('role', 'peminjam')->count();
        $bukuDipinjam = Peminjaman::where('status', 'dipinjam')->count();
        $belumKembali = Peminjaman::where('status', 'dipinjam')->count();
        $peminjamanTerbaru = Peminjaman::with(['user', 'buku'])
        ->latest()
        ->take(3)
        ->get();

        $bukuTerpopuler = Buku::withCount('peminjamans')
        ->orderByDesc('peminjamans_count')
        ->take(3)
        ->get();

        return view('petugas.dashboard', compact(
            'totalBuku',
            'totalAnggota',
            'bukuDipinjam',
            'belumKembali',
            'peminjamanTerbaru',
            'bukuTerpopuler'
        ));

        })->name('dashboard');

    //PEMINJAM
    Route::get('/peminjam', function () {
    $peminjams = \App\Models\User::where('role', 'peminjam')->get();
    return view('petugas.peminjam.index', compact('peminjams'));
    })->name('peminjam.index');

    Route::delete('/peminjam/{id}', function ($id) {\App\Models\User::findOrFail($id)->delete();
    return redirect()->route('petugas.peminjam.index')
        ->with('success', 'Data berhasil dihapus');})
        ->name('peminjam.destroy');

    //BUKU    
    Route::get('/buku', [PetugasBukuController::class, 'index'])
        ->name('buku.index');
    Route::get('/buku/create', [PetugasBukuController::class, 'create'])
        ->name('buku.create');
    Route::post('/buku', [PetugasBukuController::class, 'store'])
        ->name('buku.store');
    Route::get('/buku/{id}/edit', [PetugasBukuController::class, 'edit'])
        ->name('buku.edit');
    Route::put('/buku/{id}', [PetugasBukuController::class, 'update'])
        ->name('buku.update');
    Route::delete('/buku/{id}', [PetugasBukuController::class, 'destroy'])
        ->name('buku.destroy');

    //KATEGORI    
    Route::resource('kategori', KategoriBukuController::class);

    //LAPORAN
    Route::get('/laporan', [LaporanController::class, 'index'])
        ->name('laporan.index');
    Route::get('/laporan/cetak', [LaporanController::class, 'cetak'])
        ->name('laporan.cetak');
    Route::get('/laporan/{id}', [LaporanController::class, 'show'])
        ->name('laporan.show');

    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');

    //VALIDASI
    
Route::get('/approval', [ApprovalController::class, 'index'])
    ->name('approval.index');
Route::post('/approval/{id}/approve', [ApprovalController::class, 'approve'])
    ->name('approval.approve');
Route::post('/approval/{id}/tolak', [ApprovalController::class, 'tolak'])
    ->name('approval.tolak');

});

require __DIR__.'/auth.php';
