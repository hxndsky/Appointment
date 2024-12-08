<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class KelolaDokter extends Controller
{
    public function index()
    {
        return view('admin.kelola-dokter.index');
    }
}
