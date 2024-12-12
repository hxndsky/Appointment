<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\KelolaPoli;
use App\Models\Admin\KelolaPasien;
use App\Models\Admin\KelolaDokter;
use App\Models\Admin\KelolaObat;

class AdminController extends Controller
{
    public function index()
{
    // Ambil semua data untuk menghitung total
    $pasiens = KelolaPasien::where('role', 'Pasien')->get();
    $dokters = KelolaDokter::all();
    $polisAll = KelolaPoli::all();
    $obats = KelolaObat::all();

    // Ambil data untuk tabel dengan pagination
    $polis = KelolaPoli::paginate(5);

    // Hitung total
    $totalPasien = $pasiens->count();
    $totalDokter = $dokters->count();
    $totalPoli = $polisAll->count(); // Menggunakan `all()` untuk menghitung total poli
    $totalObat = $obats->count();

    return view('admin.dashboard.index', compact(
        'pasiens',
        'dokters',
        'polis', // Untuk tabel paginated
        'obats',
        'totalPasien',
        'totalDokter',
        'totalPoli',
        'totalObat'
    ));
}

}
