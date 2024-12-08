<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\KelolaPasien as AdminKelolaPasien;
use Illuminate\Http\Request;

class KelolaPasien extends Controller
{
    public function index(Request $request)
    {
        $pasiens = AdminKelolaPasien::orderBy('id', 'desc')->get();
        $total = AdminKelolaPasien::count();
        return view('admin.kelola-pasien.index', compact(['pasiens', 'total']));
    }

    public function create()
    {
        return view('admin.kelola-pasien.create');
    }

    public function save(Request $request)
    {
        $validation = $request->validate([
            'nama' => 'required|max:150',
            'alamat' => 'required|max:255',
            'no_ktp' => 'required',
            'no_hp' => 'required',
            'no_rm' => 'required',
        ]);

        $data = AdminKelolaPasien::create($validation);
        if ($data) {
            session()->flash('success', 'Pasien Berhasil Ditambahkan');
            return redirect(route('admin.kelola-pasien.index'));
        } else {
            session()->flash('error', 'Pasien Gagal Ditambahkan');
            return redirect(route('admin.kelola-pasien.create'));
        }
    }

    public function edit($id)
    {
        $pasiens = AdminKelolaPasien::findOrFail($id);
        return view('admin.kelola-pasien.update', compact('pasiens'));
    }
 
    public function delete($id)
    {
        $pasiens = AdminKelolaPasien::findOrFail($id)->delete();
        if ($pasiens) {
            session()->flash('success', 'Pasien Berhasil Dihapus');
            return redirect(route('admin.kelola-pasien.index'));
        } else {
            session()->flash('error', 'Pasien Gagal Dihapus');
            return redirect(route('admin.kelola-pasien.index'));
        }
    }
 
    public function update(Request $request, $id)
    {
        $pasiens = AdminKelolaPasien::findOrFail($id);
        $nama = $request->nama;
        $alamat = $request->alamat;
        $no_ktp = $request->no_ktp;
        $no_hp = $request->no_hp;
        $no_rm = $request->no_rm;
 
        $pasiens->nama = $nama;
        $pasiens->alamat = $alamat;
        $pasiens->no_ktp = $no_ktp;
        $pasiens->no_hp = $no_hp;
        $pasiens->no_rm = $no_rm;
        $data = $pasiens->save();
        if ($data) {
            session()->flash('success', 'Pasien Berhasil Diupdate');
            return redirect(route('admin.kelola-pasien.index'));
        } else {
            session()->flash('error', 'Pasien Gagal Diupdate');
            return redirect(route('admin.kelola-pasien.update'));
        }
    }
}
