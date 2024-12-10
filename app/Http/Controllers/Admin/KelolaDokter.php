<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\KelolaDokter as AdminKelolaDokter;
use App\Models\Admin\KelolaPoli;
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
            'email' => 'required|email|unique:dokter,email',
            'alamat' => 'required|max:255',
            'no_hp' => 'required|numeric',
            'id_poli' => 'required|exists:poli,id',
            'password' => 'required|min:8|confirmed',
        ]);

        $validated['password'] = Hash::make($validated['password']);
        $validated['role'] = 'Dokter';

        $dokters = AdminKelolaDokter::create($validated);

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
        $dokter = AdminKelolaDokter::findOrFail($id);

        // Validasi
        $validated = $request->validate([
            'nama' => 'required|max:150',
            'email' => 'required|email|unique:dokter,email,' . $id,
            'alamat' => 'required|max:255',
            'no_hp' => 'required|numeric',
            'id_poli' => 'required|exists:poli,id',
            'password' => 'nullable|min:8|confirmed', // Password tidak wajib
        ]);

        // Hanya mengupdate password jika field password diisi
        if ($request->filled('password')) {
            $validated['password'] = Hash::make($validated['password']);
        } else {
            unset($validated['password']); // Jangan ubah password jika tidak diisi
        }

        // Update data
        $updated = $dokter->update($validated);

        // Flash message
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

        if ($deleted) {
            session()->flash('success', 'Dokter berhasil dihapus.');
        } else {
            session()->flash('error', 'Dokter gagal dihapus.');
        }

        return redirect()->route('admin.kelola-dokter.index');
    }
}
