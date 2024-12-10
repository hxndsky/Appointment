<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\KelolaPoli;
use App\Models\Admin\KelolaPasien;
use App\Models\Admin\KelolaDokter;
use App\Models\User;

class AdminController extends Controller
{
    public function index()
    {
        $users = User::all();
        $pasiens = KelolaPasien::where('role', 'Pasien')->get();
        $dokters = KelolaDokter::all();
        $polis = KelolaPoli::all();

        $totalUser = $users->count();
        $totalPasien = $pasiens->count();
        $totalDokter = $dokters->count();
        $totalPoli = $polis->count();
        
        return view('admin.dashboard.index', compact('pasiens', 'dokters', 'polis', 'users', 'totalPasien', 'totalDokter', 'totalPoli', 'totalUser'));
    }
}
