<?php

use App\Http\Controllers\Pasien\PasienController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\KelolaDokter;
use App\Http\Controllers\Admin\KelolaObat;
use App\Http\Controllers\Admin\KelolaPasien;
use App\Http\Controllers\Admin\KelolaPoli;
use App\Http\Controllers\Dokter\DokterController;
//use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

/* 
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
*/

require __DIR__ . '/auth.php';

// PASIEN ROUTES
Route::middleware(['auth', 'PasienMiddleware'])->group(function () {
    Route::get('dashboard', [PasienController::class, 'index'])->name('dashboard');
});

// ADMIN ROUTES
Route::middleware(['auth', 'AdminMiddleware'])->group(function () {
    // DASHBOARD
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard.index');
    Route::get('/admin/dashboard/create', [AdminController::class, 'create'])->name('admin.dashboard.create');
    Route::post('/admin/dashboard', [AdminController::class, 'save'])->name('admin.dashboard.save');
    Route::get('/admin/dashboard/edit/{id}', [AdminController::class, 'edit'])->name('admin.dashboard.edit');
    Route::put('/admin/dashboard/edit/{id}', [AdminController::class, 'update'])->name('admin.dashboard.update');
    Route::get('/admin/dashboard/delete/{id}', [AdminController::class, 'delete'])->name('admin.dashboard.delete');

    // DOKTER
    Route::get('/admin/kelola-dokter', [KelolaDokter::class, 'index'])->name('admin.kelola-dokter.index');


    // PASIEN
    Route::get('/admin/kelola-pasien', [KelolaPasien::class, 'index'])->name('admin.kelola-pasien.index');
    Route::get('/admin/kelola-pasien/create', [KelolaPasien::class, 'create'])->name('admin.kelola-pasien.create');
    Route::post('/admin/kelola-pasien', [KelolaPasien::class, 'save'])->name('admin.kelola-pasien.save');
    Route::get('/admin/kelola-pasien/edit/{id}', [KelolaPasien::class, 'edit'])->name('admin.kelola-pasien.edit');
    Route::put('/admin/kelola-pasien/edit/{id}', [KelolaPasien::class, 'update'])->name('admin.kelola-pasien.update');
    Route::get('/admin/kelola-pasien/delete/{id}', [KelolaPasien::class, 'delete'])->name('admin.kelola-pasien.delete');

    // POLI
    Route::get('/admin/kelola-poli', [KelolaPoli::class, 'index'])->name('admin.kelola-poli.index');
    Route::get('/admin/kelola-poli/create', [KelolaPoli::class, 'create'])->name('admin.kelola-poli.create');
    Route::post('/admin/kelola-poli', [KelolaPoli::class, 'save'])->name('admin.kelola-poli.save');
    Route::get('/admin/kelola-poli/edit/{id}', [KelolaPoli::class, 'edit'])->name('admin.kelola-poli.edit');
    Route::put('/admin/kelola-poli/edit/{id}', [KelolaPoli::class, 'update'])->name('admin.kelola-poli.update');
    Route::get('/admin/kelola-poli/delete/{id}', [KelolaPoli::class, 'delete'])->name('admin.kelola-poli.delete');

    // OBAT
    Route::get('/admin/kelola-obat', [KelolaObat::class, 'index'])->name('admin.kelola-obat.index');
    Route::get('/admin/kelola-obat/create', [KelolaObat::class, 'create'])->name('admin.kelola-obat.create');
    Route::post('/admin/kelola-obat', [KelolaObat::class, 'save'])->name('admin.kelola-obat.save');
    Route::get('/admin/kelola-obat/edit/{id}', [KelolaObat::class, 'edit'])->name('admin.kelola-obat.edit');
    Route::put('/admin/kelola-obat/edit/{id}', [KelolaObat::class, 'update'])->name('admin.kelola-obat.update');
    Route::get('/admin/kelola-obat/delete/{id}', [KelolaObat::class, 'delete'])->name('admin.kelola-obat.delete');
});

// DOKTER ROUTES
Route::middleware(['auth', 'DokterMiddleware'])->group(function () {
    Route::get('/dokter/dashboard', [DokterController::class, 'index'])->name('dokter.dashboard');
});
