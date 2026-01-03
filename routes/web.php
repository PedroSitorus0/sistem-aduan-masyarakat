<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\PeminjamanController;
use App\Models\Laporan;
use App\Models\Peminjaman;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    // Jika user sudah login, langsung ke dashboard
    if (auth()->check()) {
        return redirect()->route('dashboard');
    }
    // Jika belum, tampilkan halaman welcome (yang akan jadi login)
    return view('welcome');
});
// --- DASHBOARD (User melihat data miliknya sendiri) ---
Route::get('/dashboard', function () {
    $laporans = Laporan::where('user_id', auth()->id())->latest()->get();
    $peminjamans = Peminjaman::where('user_id', auth()->id())->latest()->get();

    return view('dashboard', compact('laporans', 'peminjamans'));
})->middleware(['auth', 'verified'])->name('dashboard');

// --- FITUR UTAMA (Hanya bisa diakses jika login) ---
Route::middleware('auth')->group(function () {

    // 1. Laporan
    Route::get('/laporan/buat', [LaporanController::class, 'create'])->name('laporan.create');
    Route::post('/laporan', [LaporanController::class, 'store'])->name('laporan.store');

    // 2. Peminjaman
    Route::get('/peminjaman/buat', [PeminjamanController::class, 'create'])->name('peminjaman.create');
    Route::post('/peminjaman', [PeminjamanController::class, 'store'])->name('peminjaman.store');

    // 3. Profile Bawaan Laravel
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// --- ROUTE KHUSUS ADMIN ---
Route::middleware('auth', 'admin')->group(function () {
    
    // Halaman Admin
    Route::get('/admin', [App\Http\Controllers\AdminController::class, 'index'])->name('admin.dashboard');

    // Proses Update Status
    Route::patch('/admin/laporan/{id}', [App\Http\Controllers\AdminController::class, 'updateLaporan'])->name('admin.laporan.update');
    Route::patch('/admin/peminjaman/{id}', [App\Http\Controllers\AdminController::class, 'updatePeminjaman'])->name('admin.peminjaman.update');
    
});

require __DIR__.'/auth.php';