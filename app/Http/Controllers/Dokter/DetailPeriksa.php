<?php

namespace App\Http\Controllers\Dokter;

use App\Http\Controllers\Controller;
use App\Models\Admin\KelolaDokter;
use App\Models\Dokter\PeriksaPasien;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class DetailPeriksa extends Controller
{
    public function index()
    {
        $dokter = KelolaDokter::where('email', Auth::user()->email)->firstOrFail();

        // Ambil riwayat pasien berdasarkan dokter yang login
        $riwayatPasien = PeriksaPasien::with(['daftarPoli.pasien', 'daftarPoli.jadwal.dokter'])
            ->whereHas('daftarPoli.jadwal.dokter', function ($query) use ($dokter) {
                $query->where('email', $dokter->email);
            })
            ->orderBy('tgl_periksa', 'asc')
            ->get();

        return view('dokter.riwayat-pasien.index', compact('riwayatPasien'));
    }

    public function show($id)
    {
        $periksa = PeriksaPasien::with(['daftarPoli.pasien', 'daftarPoli.jadwal.dokter', 'detailPeriksa.obat'])
            ->findOrFail($id);

        return view('dokter.riwayat-pasien.show', compact('periksa'));
    }
}
