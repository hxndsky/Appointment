<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\KelolaPengguna as AdminKelolaPengguna;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index(Request $request)
    {
        $penggunas = AdminKelolaPengguna::orderBy('id', 'desc')->get();
        $total = AdminKelolaPengguna::count();
        return view('admin.dashboard.index', compact(['penggunas', 'total']));
    }

    public function create()
    {
        return view('admin.dashboard.create');
    }

    public function save(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'alamat' => 'required',
            'no_ktp' => 'required',
            'no_hp' => 'required',
            'password' => 'required',
            'role' => 'required',
        ]);

        $validated['password'] = Hash::make($validated['password']); // Hash password

        $data = AdminKelolaPengguna::create($validated);

        if ($data) {
            session()->flash('success', 'Pengguna Berhasil Ditambahkan');
        } else {
            session()->flash('error', 'Pengguna Gagal Ditambahkan');
        }

        return redirect()->route('admin.dashboard.index');
    }

    public function edit($id)
    {
        $penggunas = AdminKelolaPengguna::findOrFail($id);
        return view('admin.dashboard.update', compact('penggunas'));
    }

    public function update(Request $request, $id)
    {
        $penggunas = AdminKelolaPengguna::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'alamat' => 'required',
            'no_ktp' => 'required',
            'no_hp' => 'required',
            'password' => 'nullable',
            'role' => 'required',
        ]);

        // Hash password hanya jika diisi
        if (!empty($validated['password'])) {
            $validated['password'] = Hash::make($validated['password']);
        } else {
            unset($validated['password']); // Jangan ubah password jika tidak diisi
        }

        $data = $penggunas->update($validated);

        if ($data) {
            session()->flash('success', 'Pengguna Berhasil Diupdate');
        } else {
            session()->flash('error', 'Pengguna Gagal Diupdate');
        }

        return redirect()->route('admin.dashboard.index');
    }

    public function delete($id)
    {
        $penggunas = AdminKelolaPengguna::findOrFail($id);

        if ($penggunas->delete()) {
            session()->flash('success', 'Pengguna Berhasil Dihapus');
        } else {
            session()->flash('error', 'Pengguna Gagal Dihapus');
        }

        return redirect()->route('admin.dashboard.index');
    }
}
