<?php

use App\Http\Controllers\Pasien\PasienController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\KelolaDokter;
use App\Http\Controllers\Admin\KelolaObat;
use App\Http\Controllers\Admin\KelolaPasien;
use App\Http\Controllers\Admin\KelolaPoli;
use App\Http\Controllers\Dokter\DokterController;
use App\Http\Controllers\Dokter\JadwalPeriksa;
use App\Http\Controllers\Dokter\PeriksaPasien;
use App\Http\Controllers\Dokter\ProfileDokter;
use App\Http\Controllers\Pasien\DaftarPoli;
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

    // DAFTAR POLI
    Route::get('/daftar-poli', [DaftarPoli::class, 'index'])->name('daftar-poli.index');
    Route::get('/daftar-poli/create', [DaftarPoli::class, 'create'])->name('daftar-poli.create');
    Route::post('/daftar-poli', [DaftarPoli::class, 'save'])->name('daftar-poli.save');
    //Route::get('/daftar-poli/{id}/detail', [DaftarPoli::class, 'show'])->name('daftar-poli.show');

});

// ADMIN ROUTES
Route::middleware(['auth', 'AdminMiddleware'])->group(function () {
    // DASHBOARD
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard.index');

    // DOKTER
    Route::get('/admin/kelola-dokter', [KelolaDokter::class, 'index'])->name('admin.kelola-dokter.index');
    Route::get('/admin/kelola-dokter/create', [KelolaDokter::class, 'create'])->name('admin.kelola-dokter.create');
    Route::post('/admin/kelola-dokter', [KelolaDokter::class, 'save'])->name('admin.kelola-dokter.save');
    Route::get('/admin/kelola-dokter/edit/{id}', [KelolaDokter::class, 'edit'])->name('admin.kelola-dokter.edit');
    Route::put('/admin/kelola-dokter/edit/{id}', [KelolaDokter::class, 'update'])->name('admin.kelola-dokter.update');
    Route::get('/admin/kelola-dokter/delete/{id}', [KelolaDokter::class, 'delete'])->name('admin.kelola-dokter.delete');

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
    // Dashboard dokter
    Route::get('/dokter/dashboard', [DokterController::class, 'index'])->name('dokter.dashboard.index');

    // Profil dokter
    Route::get('/dokter/profile', [ProfileDokter::class, 'profile'])->name('dokter.profile');
    Route::put('/dokter/profile/update', [ProfileDokter::class, 'update'])->name('dokter.profile.update');

    // Jadwal Periksa
    Route::get('/dokter/jadwal-periksa', [JadwalPeriksa::class, 'index'])->name('dokter.jadwal-periksa.index');
    Route::get('/dokter/jadwal-periksa/create', [JadwalPeriksa::class, 'create'])->name('dokter.jadwal-periksa.create');
    Route::post('/dokter/jadwal-periksa', [JadwalPeriksa::class, 'save'])->name('dokter.jadwal-periksa.save');
    Route::get('/dokter/jadwal-periksa/edit/{id}', [JadwalPeriksa::class, 'edit'])->name('dokter.jadwal-periksa.edit');
    Route::put('/dokter/jadwal-periksa/edit/{id}', [JadwalPeriksa::class, 'update'])->name('dokter.jadwal-periksa.update');
    Route::get('/dokter/jadwal-periksa/delete/{id}', [JadwalPeriksa::class, 'delete'])->name('dokter.jadwal-periksa.delete');

    // Periksa Pasien
    Route::get('/dokter/periksa-pasien', [PeriksaPasien::class, 'index'])->name('dokter.periksa-pasien.index');
    Route::get('/dokter/periksa-pasien/create/{id}', [PeriksaPasien::class, 'create'])->name('dokter.periksa-pasien.create');
    Route::post('/dokter/periksa-pasien', [PeriksaPasien::class, 'save'])->name('dokter.periksa-pasien.save');
});
