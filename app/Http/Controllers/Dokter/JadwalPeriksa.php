<?php

namespace App\Http\Controllers\Dokter;

use App\Http\Controllers\Controller;
use App\Models\Dokter\JadwalPeriksa as DokterJadwalPeriksa;
use App\Models\Admin\KelolaDokter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JadwalPeriksa extends Controller
{
    public function index()
    {
        // Ambil data dokter berdasarkan email user yang login
        $dokter = KelolaDokter::where('email', Auth::user()->email)->first();

        // Jika dokter tidak ditemukan, tampilkan error
        if (!$dokter) {
            return back()->withErrors(['error' => 'Data dokter tidak ditemukan.']);
        }

        // Ambil jadwal periksa berdasarkan id_dokter
        $jadwals = DokterJadwalPeriksa::where('id_dokter', $dokter->id)->get();

        return view('dokter.jadwal-periksa.index', compact('jadwals'));
    }

    public function create()
    {
        return view('dokter.jadwal-periksa.create');
    }

    public function save(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'hari' => 'required|string|max:10',
            'jam_mulai' => 'required|date_format:H:i',
            'jam_selesai' => 'required|date_format:H:i|after:jam_mulai',
        ]);

        // Ambil email dari user yang sedang login
        $userEmail = Auth::user()->email;

        // Cari id_dokter di tabel dokter berdasarkan email
        $dokter = KelolaDokter::where('email', $userEmail)->first();

        // Jika tidak ditemukan, tampilkan pesan error
        if (!$dokter) {
            return back()->withErrors(['error' => 'Data dokter tidak ditemukan.']);
        }

        // Simpan jadwal periksa
        DokterJadwalPeriksa::create([
            'id_dokter' => $dokter->id, // Ambil id_dokter dari tabel dokter
            'hari' => $validated['hari'],
            'jam_mulai' => $validated['jam_mulai'],
            'jam_selesai' => $validated['jam_selesai'],
        ]);

        return redirect()->route('dokter.jadwal-periksa.index')->with('success', 'Jadwal berhasil ditambahkan.');
    }

    public function edit($id)
    {
        // Cari jadwal berdasarkan ID
        $jadwal = DokterJadwalPeriksa::findOrFail($id);
        return view('dokter.jadwal-periksa.edit', compact('jadwal'));
    }

    public function update(Request $request, $id)
    {
        // Cari jadwal berdasarkan ID
        $jadwal = DokterJadwalPeriksa::findOrFail($id);

        // Validasi apakah jadwal milik dokter yang login
        $dokter = KelolaDokter::where('email', Auth::user()->email)->first();
        if ($jadwal->id_dokter !== $dokter->id) {
            return redirect()->route('dokter.jadwal-periksa.index')->withErrors(['error' => 'Anda tidak memiliki akses untuk mengubah jadwal ini.']);
        }

        // Validasi input
        $validated = $request->validate([
            'hari' => 'required|string|max:10',
            'jam_mulai' => 'required|date_format:H:i',
            'jam_selesai' => 'required|date_format:H:i|after:jam_mulai',
        ]);

        // Update jadwal
        $jadwal->update($validated);

        return redirect()->route('dokter.jadwal-periksa.index')->with('success', 'Jadwal berhasil diperbarui.');
    }

    public function delete($id)
    {
        $jadwal = DokterJadwalPeriksa::findOrFail($id);
        $jadwal->delete();

        return redirect()->route('dokter.jadwal-periksa.index')->with('success', 'Jadwal berhasil dihapus.');
    }
}
