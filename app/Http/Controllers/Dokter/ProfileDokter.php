<?php

namespace App\Http\Controllers\Dokter;

use App\Http\Controllers\Controller;
use App\Models\Admin\KelolaDokter;
use App\Models\User; // Tabel pasien
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileDokter extends Controller
{
    public function profile()
    {
        $dokter = KelolaDokter::where('email', Auth::user()->email)->firstOrFail();
        $polis = \App\Models\Admin\KelolaPoli::all(); // Ambil daftar poli
        return view('dokter.profile.edit', compact('dokter', 'polis'));
    }

    public function update(Request $request)
    {
        // Cari data dokter berdasarkan email pengguna yang sedang login
        $dokter = KelolaDokter::where('email', Auth::user()->email)->firstOrFail();

        // Validasi input
        $validated = $request->validate([
            'nama' => 'required|max:150',
            'email' => 'required|email|unique:dokter,email,' . $dokter->id,
            'alamat' => 'required|max:255',
            'no_hp' => 'required|numeric',
            'id_poli' => 'required|exists:poli,id',
            'password' => 'nullable|min:8|confirmed', // Password opsional
        ]);

        // Update password jika diisi
        if ($request->filled('password')) {
            $validated['password'] = Hash::make($request->password);
        } else {
            unset($validated['password']);
        }

        // Simpan email lama untuk pencarian di tabel pasien
        $oldEmail = $dokter->email;

        // Update data di tabel dokter
        $dokter->update($validated);

        // Update data di tabel pasien
        $pasien = User::where('email', $oldEmail)->first(); // Cari data pasien berdasarkan email lama
        if ($pasien) {
            $pasienData = [
                'nama' => $validated['nama'],
                'email' => $validated['email'], // Pastikan email diperbarui
                'alamat' => $validated['alamat'],
                'no_hp' => $validated['no_hp'],
                'role' => 'Dokter', // Pastikan role tetap sebagai 'Dokter'
                'no_ktp' => $pasien->no_ktp ?? 0, // Tetapkan nilai default untuk no_ktp
            ];

            // Update password di tabel pasien jika diisi
            if ($request->filled('password')) {
                $pasienData['password'] = $validated['password'];
            }

            // Perbarui data pasien
            $pasien->update($pasienData);
        }

        // Redirect dengan pesan sukses
        return redirect()->route('dokter.profile')
            ->with('success', 'Profil berhasil diperbarui.');
    }
}
