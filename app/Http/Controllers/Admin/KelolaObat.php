<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\KelolaObat as AdminKelolaObat;
use Illuminate\Http\Request;

class KelolaObat extends Controller
{
    public function index(Request $request)
    {
        $query = AdminKelolaObat::query();

        if ($request->has('search')) {
            $query->where('nama_obat', 'like', '%' . $request->search . '%');
        }

        $obats = AdminKelolaObat::orderBy('id', 'desc')->get();
        $total = AdminKelolaObat::count();
        return view('admin.kelola-obat.index', compact(['obats', 'total']));
    }

    public function create()
    {
        return view('admin.kelola-obat.create');
    }

    public function save(Request $request)
    {
        $validation = $request->validate([
            'nama_obat' => 'required|max:50',
            'kemasan' => 'nullable',
            'harga' => 'required',
        ]);

        $data = AdminKelolaObat::create($validation);
        if ($data) {
            session()->flash('success', 'Obat Berhasil Ditambahkan');
            return redirect(route('admin.kelola-obat.index'));
        } else {
            session()->flash('error', 'Obat Gagal Ditambahkan');
            return redirect(route('admin.kelola-obat.create'));
        }
    }

    public function edit($id)
    {
        $obats = AdminKelolaObat::findOrFail($id);
        return view('admin.kelola-obat.edit', compact('obats'));
    }
 
    public function delete($id)
    {
        $obats = AdminKelolaObat::findOrFail($id)->delete();
        if ($obats) {
            session()->flash('success', 'Obat Berhasil Dihapus');
            return redirect(route('admin.kelola-obat.index'));
        } else {
            session()->flash('error', 'Obat Gagal Dihapus');
            return redirect(route('admin.kelola-obat.index'));
        }
    }
 
    public function update(Request $request, $id)
    {
        $obats = AdminKelolaObat::findOrFail($id);
        $nama_obat = $request->nama_obat;
        $kemasan = $request->kemasan;
        $harga = $request->harga;
 
        $obats->nama_obat = $nama_obat;
        $obats->kemasan = $kemasan;
        $obats->harga = $harga;
        $data = $obats->save();
        if ($data) {
            session()->flash('success', 'Obat Berhasil Diupdate');
            return redirect(route('admin.kelola-obat.index'));
        } else {
            session()->flash('error', 'Obat Gagal Diupdate');
            return redirect(route('admin.kelola-obat.update'));
        }
    }
}
