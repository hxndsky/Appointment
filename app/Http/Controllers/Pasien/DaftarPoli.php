<?php

namespace App\Http\Controllers\Pasien;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pasien\DaftarPoli as PasienDaftarPoli;
use App\Models\Dokter\JadwalPeriksa;
use App\Models\Admin\KelolaPoli;
use App\Models\Dokter\PeriksaPasien;
use Illuminate\Support\Facades\Auth;

class DaftarPoli extends Controller
{
    public function index()
    {
        $user = Auth::user(); // Ambil user yang sedang login

        // Ambil daftar poli berdasarkan pasien yang login
        $daftarPolis = PasienDaftarPoli::with(['jadwal.dokter'])
            ->where('id_pasien', $user->id) // Filter berdasarkan pasien yang login
            ->orderBy('created_at', 'desc')
            ->get();

        // Tambahkan status berdasarkan data di tabel `periksa`
        foreach ($daftarPolis as $poli) {
            $poli->status = PeriksaPasien::where('id_daftar_poli', $poli->id)->exists()
                ? 'sudah_diperiksa'
                : 'belum_diperiksa';
        }

        return view('daftar-poli.index', compact('daftarPolis'));
    }

    public function create(Request $request)
    {
        // Ambil user yang sedang login
        $user = Auth::user();

        // Ambil semua data Poli
        $polis = KelolaPoli::all();

        // Ambil jadwal berdasarkan Poli yang dipilih
        $jadwals = collect();
        if ($request->has('poli_id') && $request->poli_id != '') {
            $jadwals = JadwalPeriksa::with('dokter')
                ->whereHas('dokter', function ($query) use ($request) {
                    $query->where('id_poli', $request->poli_id);
                })
                ->get();
        }

        return view('daftar-poli.create', [
            'polis' => $polis,
            'jadwals' => $jadwals,
            'no_rm' => $user->no_rm, // Nomor rekam medis pasien
            'selectedPoli' => $request->poli_id ?? '', // Poli yang dipilih
        ]);
    }

    public function save(Request $request)
    {
        $user = Auth::user(); // Ambil user yang login

        // Validasi input
        $validated = $request->validate([
            'id_jadwal' => 'required|exists:jadwal_periksa,id',
            'keluhan' => 'required|string|max:255',
        ]);

        // Hitung nomor antrian
        $noAntrian = PasienDaftarPoli::where('id_jadwal', $validated['id_jadwal'])->count() + 1;

        // Simpan pendaftaran
        PasienDaftarPoli::create([
            'id_pasien' => $user->id, // Gunakan ID pasien dari user yang login
            'id_jadwal' => $validated['id_jadwal'],
            'keluhan' => $validated['keluhan'],
            'no_antrian' => $noAntrian,
        ]);

        return redirect()->route('daftar-poli.index')->with('success', 'Pendaftaran berhasil!');
    }

    public function show($id)
    {
        // Ambil data daftar poli berdasarkan ID
        $daftarPoli = PasienDaftarPoli::with(['jadwal.dokter', 'pasien'])->findOrFail($id);

        // Tambahkan status berdasarkan data di tabel `periksa`
        $daftarPoli->status = PeriksaPasien::where('id_daftar_poli', $daftarPoli->id)->exists()
            ? 'sudah_diperiksa'
            : 'belum_diperiksa';

        return view('daftar-poli.show', compact('daftarPoli'));
    }
}
