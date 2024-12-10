<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KelolaPengguna extends Model
{
    use HasFactory;

    protected $table = 'pasien';

    protected $fillable = [
        'nama',
        'email',
        'alamat',
        'no_ktp',
        'no_hp',
        'no_rm',
        'password',
        'role',
    ];
}
