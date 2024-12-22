<?php

namespace App\Http\Controllers\Dokter;

use App\Http\Controllers\Controller;
use App\Models\Admin\KelolaObat;
use App\Models\Dokter\DetailPeriksa;
use App\Models\Admin\KelolaDokter;
use App\Models\Dokter\PeriksaPasien as DokterPeriksaPasien;
use App\Models\Pasien\DaftarPoli;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PeriksaPasien extends Controller
{
    public function index()
    {
        $dokter = KelolaDokter::where('email', Auth::user()->email)->firstOrFail();

        $daftarPoli = DaftarPoli::with(['pasien', 'jadwal', 'periksa'])
            ->whereHas('jadwal', function ($query) use ($dokter) {
                $query->where('id_dokter', $dokter->id);
            })
            ->orderBy('no_antrian', 'asc')
            ->get();

        return view('dokter.periksa-pasien.index', compact('daftarPoli'));
    }

    public function create($id)
    {
        $daftarPoli = DaftarPoli::with(['pasien', 'jadwal'])->findOrFail($id);
        $obatList = KelolaObat::all();

        return view('dokter.periksa-pasien.create', compact('daftarPoli', 'obatList'));
    }

    public function save(Request $request)
    {
        // Validasi input
        $request->validate([
            'id_daftar_poli' => 'required|exists:daftar_poli,id',
            'tgl_periksa' => 'required|date',
            'catatan' => 'required|string|max:255',
            'obat.*' => 'nullable|exists:obat,id',
        ]);

        // Biaya dasar pemeriksaan
        $biayaDasar = 150000;
        $totalHargaObat = 0;

        // Hitung total harga obat yang dipilih
        if (!empty($request->obat)) {
            $obat = KelolaObat::whereIn('id', $request->obat)->get();
            $totalHargaObat = $obat->sum('harga');
        }

        // Total biaya (biaya dasar + total harga obat)
        $totalBiaya = $biayaDasar + $totalHargaObat;

        // Simpan data pemeriksaan ke tabel `periksa`
        $periksa = DokterPeriksaPasien::create([
            'id_daftar_poli' => $request->id_daftar_poli,
            'tgl_periksa' => $request->tgl_periksa,
            'catatan' => $request->catatan,
            'biaya_periksa' => $totalBiaya,
        ]);

        // Simpan data obat yang dipilih ke tabel `detail_periksa`
        if (!empty($request->obat)) {
            foreach ($request->obat as $id_obat) {
                DetailPeriksa::create([
                    'id_periksa' => $periksa->id,
                    'id_obat' => $id_obat,
                ]);
            }
        }

        return redirect()->route('dokter.periksa-pasien.index')
            ->with('success', 'Pemeriksaan berhasil disimpan.');
    }
}
