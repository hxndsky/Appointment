<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\KelolaPasien as AdminKelolaPasien;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class KelolaPasien extends Controller
{
    public function index()
    {
        $pasiens = AdminKelolaPasien::where('role', 'Pasien')->get();
        return view('admin.kelola-pasien.index', compact('pasiens'));
    }

    public function create()
    {
        return view('admin.kelola-pasien.create');
    }

    public function save(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|max:150',
            'email' => 'required|email|unique:pasien,email',
            'alamat' => 'required|max:255',
            'no_ktp' => 'required|numeric|unique:pasien,no_ktp',
            'no_hp' => 'required|numeric',
            'password' => 'required|min:8|confirmed',
        ]);

        // Generate No RM menggunakan format yang diminta
        $validated['no_rm'] = $this->generateNoRm();

        // Enkripsi password dan tetapkan role sebagai "Pasien"
        $validated['password'] = Hash::make($validated['password']);
        $validated['role'] = 'Pasien';

        $pasiens = AdminKelolaPasien::create($validated);

        if ($pasiens) {
            session()->flash('success', 'Pasien berhasil ditambahkan dengan No. Rekam Medis: ' . $validated['no_rm']);
        } else {
            session()->flash('error', 'Pasien gagal ditambahkan.');
        }

        return redirect()->route('admin.kelola-pasien.index');
    }

    public function edit($id)
    {
        $pasiens = AdminKelolaPasien::findOrFail($id);
        return view('admin.kelola-pasien.edit', compact('pasiens'));
    }

    public function update(Request $request, $id)
    {
        $pasiens = AdminKelolaPasien::findOrFail($id);

        $validated = $request->validate([
            'nama' => 'required|max:150',
            'email' => 'required|email|unique:pasien,email,' . $id,
            'alamat' => 'required|max:255',
            'no_ktp' => 'required|numeric|unique:pasien,no_ktp,' . $id,
            'no_hp' => 'required|numeric',
            'password' => 'nullable|min:8|confirmed',
        ]);

        // Perbarui password hanya jika diisi
        if ($request->filled('password')) {
            $validated['password'] = Hash::make($request->password);
        } else {
            unset($validated['password']); // Jangan ubah password jika kosong
        }

        $updated = $pasiens->update($validated);

        if ($updated) {
            session()->flash('success', 'Pasien berhasil diperbarui.');
        } else {
            session()->flash('error', 'Pasien gagal diperbarui.');
        }

        return redirect()->route('admin.kelola-pasien.index');
    }

    public function delete($id)
    {
        $pasiens = AdminKelolaPasien::findOrFail($id);
        $deleted = $pasiens->delete();

        if ($deleted) {
            session()->flash('success', 'Pasien berhasil dihapus.');
        } else {
            session()->flash('error', 'Pasien gagal dihapus.');
        }

        return redirect()->route('admin.kelola-pasien.index');
    }

    /**
     * Generate a unique No. Rekam Medis (No. RM) berdasarkan bulan dan tahun.
     *
     * @return string
     */
    private function generateNoRm(): string
    {
        $jumlahPasien = AdminKelolaPasien::where('role', 'Pasien')->count();
        return now()->format('Ym') . '-' . ($jumlahPasien + 1);
    }
}
