<?php

namespace App\Models\Admin;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class KelolaDokter extends Authenticatable
{
    use HasFactory;

    protected $table = 'dokter';

    protected $fillable = [
        'nama',
        'alamat',
        'no_hp',
        'id_poli',
        'email',
        'password', // Pastikan kolom ini ada di tabel
        'role',
    ];

    /**
     * Hubungan dengan Poli.
     */
    public function poli()
    {
        return $this->belongsTo(KelolaPoli::class, 'id_poli');
    }
}
