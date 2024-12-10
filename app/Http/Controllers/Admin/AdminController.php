<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\KelolaPengguna as AdminKelolaPengguna;

class AdminController extends Controller
{
    public function index()
    {
        $users = AdminKelolaPengguna::all();
        $total = $users->count();
        return view('admin.dashboard.index', compact('users', 'total'));
    }
}
