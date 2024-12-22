<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\KelolaPoli as AdminKelolaPoli;
use Illuminate\Http\Request;

class KelolaPoli extends Controller
{
    public function index(Request $request)
    {
        $polis = AdminKelolaPoli::orderBy('id', 'asc')->get();
        $total = AdminKelolaPoli::count();
        return view('admin.kelola-poli.index', compact(['polis', 'total']));
    }

    public function create()
    {
        return view('admin.kelola-poli.create');
    }

    public function save(Request $request)
    {
        $validation = $request->validate([
            'nama_poli' => 'required|max:50',
            'keterangan' => 'nullable',
        ]);

        $data = AdminKelolaPoli::create($validation);
        if ($data) {
            session()->flash('success', 'Poli Berhasil Ditambahkan');
            return redirect(route('admin.kelola-poli.index'));
        } else {
            session()->flash('error', 'Poli Gagal Ditambahkan');
            return redirect(route('admin.kelola-poli.create'));
        }
    }

    public function edit($id)
    {
        $polis = AdminKelolaPoli::findOrFail($id);
        return view('admin.kelola-poli.edit', compact('polis'));
    }

    public function update(Request $request, $id)
    {
        $polis = AdminKelolaPoli::findOrFail($id);
        $nama_poli = $request->nama_poli;
        $keterangan = $request->keterangan;

        $polis->nama_poli = $nama_poli;
        $polis->keterangan = $keterangan;
        $data = $polis->save();
        if ($data) {
            session()->flash('success', 'Poli Berhasil Diupdate');
            return redirect(route('admin.kelola-poli.index'));
        } else {
            session()->flash('error', 'Poli Gagal Diupdate');
            return redirect(route('admin.kelola-poli.update'));
        }
    }

    public function delete($id)
    {
        $polis = AdminKelolaPoli::findOrFail($id)->delete();
        if ($polis) {
            session()->flash('success', 'Poli Berhasil Dihapus');
            return redirect(route('admin.kelola-poli.index'));
        } else {
            session()->flash('error', 'Poli Gagal Dihapus');
            return redirect(route('admin.kelola-poli.index'));
        }
    }
}
