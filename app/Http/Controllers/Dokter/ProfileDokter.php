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
    /**
     * Tampilkan halaman profil dokter.
     */
    public function profile()
    {
        $dokter = KelolaDokter::where('email', Auth::user()->email)->firstOrFail();
        $polis = \App\Models\Admin\KelolaPoli::all(); // Ambil daftar poli
        return view('dokter.profile.edit', compact('dokter', 'polis'));
    }

    /**
     * Perbarui profil dokter.
     */
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

        // Update data di tabel dokter
        $dokter->update($validated);

        // Update data di tabel pasien (untuk autentikasi)
        $pasien = User::where('email', $dokter->email)->first();
        if ($pasien) {
            $pasienData = [
                'nama' => $validated['nama'],
                'email' => $validated['email'],
                'alamat' => $validated['alamat'],
                'no_hp' => $validated['no_hp'],
                'role' => 'Dokter',
            ];

            // Update password jika ada perubahan
            if ($request->filled('password')) {
                $pasienData['password'] = $validated['password'];
            }

            $pasien->update($pasienData);
        }

        // Redirect dengan pesan sukses
        return redirect()->route('dokter.profile')
            ->with('success', 'Profil berhasil diperbarui.');
    }
}
