<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PengaduanController;
use App\Http\Controllers\KategoriController;

// Halaman publik
Route::get('/', [PengaduanController::class, 'landing'])->name('landing');
Route::get('/pengaduan/buat', [PengaduanController::class, 'create'])->name('pengaduan.create');
Route::post('/pengaduan', [PengaduanController::class, 'store'])->name('pengaduan.store');
Route::get('/pengaduan/sukses/{pengaduan}', [PengaduanController::class, 'sukses'])->name('pengaduan.sukses');
Route::get('/cek-aduan', [PengaduanController::class, 'cekForm'])->name('pengaduan.cek.form');
Route::post('/cek-aduan', [PengaduanController::class, 'cekStatus'])->name('pengaduan.cek.status');

// Halaman admin (harus login)
Route::middleware('auth')->prefix('admin')->group(function () {
    

    // /admin langsung ke Dashboard (bukan landing lagi)
    Route::get('/', [PengaduanController::class, 'dashboard'])
         ->name('admin.dashboard');

    // Route /dashboard tetap ada tapi redirect ke root admin (biar aman)
    Route::get('/dashboard', function () {
        return redirect()->route('admin.dashboard');
    });

    Route::get('/pengaduan', [PengaduanController::class, 'index'])->name('admin.pengaduan.index');
    Route::get('/pengaduan/{pengaduan}', [PengaduanController::class, 'show'])->name('admin.pengaduan.show');
    Route::put('/pengaduan/{pengaduan}', [PengaduanController::class, 'update'])->name('admin.pengaduan.update');
    Route::delete('/pengaduan/{pengaduan}', [PengaduanController::class, 'destroy'])->name('admin.pengaduan.destroy');
    
    Route::resource('kategori', KategoriController::class);
});

require __DIR__.'/auth.php';