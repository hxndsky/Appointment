<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\KelolaDokter as AdminKelolaDokter;
use App\Models\Admin\KelolaPoli;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class KelolaDokter extends Controller
{
    public function index()
    {
        $dokters = AdminKelolaDokter::with('poli')->get();
        return view('admin.kelola-dokter.index', compact('dokters'));
    }

    public function create()
    {
        $polis = KelolaPoli::all();
        return view('admin.kelola-dokter.create', compact('polis'));
    }

    public function save(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|max:150',
            'email' => 'required|email|unique:dokter,email|unique:pasien,email',
            'alamat' => 'required|max:255',
            'no_hp' => 'required|numeric',
            'id_poli' => 'required|exists:poli,id',
            'password' => 'required|min:8|confirmed',
        ]);

        // Hash password
        $validated['password'] = Hash::make($validated['password']);
        $validated['role'] = 'Dokter';

        // Simpan data ke tabel dokter
        $dokters = AdminKelolaDokter::create($validated);

        // Simpan data ke tabel pasien untuk autentikasi
        $pasienData = [
            'nama' => $validated['nama'],
            'email' => $validated['email'],
            'alamat' => $validated['alamat'],
            'no_ktp' => 0, // Default atau sesuaikan dengan kebutuhan
            'no_hp' => $validated['no_hp'],
            'no_rm' => null, // Tidak digunakan untuk dokter
            'password' => $validated['password'],
            'role' => 'Dokter',
        ];
        User::create($pasienData);

        if ($dokters) {
            session()->flash('success', 'Dokter berhasil ditambahkan.');
        } else {
            session()->flash('error', 'Dokter gagal ditambahkan.');
        }

        return redirect()->route('admin.kelola-dokter.index');
    }

    public function edit($id)
    {
        $dokters = AdminKelolaDokter::findOrFail($id);
        $polis = KelolaPoli::all();
        return view('admin.kelola-dokter.edit', compact('dokters', 'polis'));
    }

    public function update(Request $request, $id)
    {
        $dokters = AdminKelolaDokter::findOrFail($id);

        $validated = $request->validate([
            'nama' => 'required|max:150',
            'email' => 'required|email|unique:dokter,email,' . $id . '|unique:pasien,email,' . $id,
            'alamat' => 'required|max:255',
            'no_hp' => 'required|numeric',
            'id_poli' => 'required|exists:poli,id',
            'password' => 'nullable|min:8|confirmed',
        ]);

        if ($request->filled('password')) {
            $validated['password'] = Hash::make($validated['password']);
        } else {
            unset($validated['password']);
        }

        // Update tabel dokter
        $updated = $dokters->update($validated);

        // Update tabel pasien untuk autentikasi
        $pasiens = User::where('email', $dokters->email)->first();
        if ($pasiens) {
            $pasiens->update([
                'nama' => $validated['nama'],
                'email' => $validated['email'],
                'alamat' => $validated['alamat'],
                'no_hp' => $validated['no_hp'],
                'password' => $validated['password'] ?? $pasiens->password, // Update password jika diisi
            ]);
        }

        if ($updated) {
            session()->flash('success', 'Dokter berhasil diperbarui.');
        } else {
            session()->flash('error', 'Dokter gagal diperbarui.');
        }

        return redirect()->route('admin.kelola-dokter.index');
    }

    public function delete($id)
    {
        $dokters = AdminKelolaDokter::findOrFail($id);
        $deleted = $dokters->delete();

        // Hapus juga data di tabel pasien yang terkait
        $pasiens = User::where('email', $dokters->email)->first();
        if ($pasiens) {
            $pasiens->delete();
        }

        if ($deleted) {
            session()->flash('success', 'Dokter berhasil dihapus.');
        } else {
            session()->flash('error', 'Dokter gagal dihapus.');
        }

        return redirect()->route('admin.kelola-dokter.index');
    }
}
