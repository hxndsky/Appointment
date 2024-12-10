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
        'email',
        'alamat',
        'no_hp',
        'id_poli',
        'password',
        'role',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Hubungan dengan Poli.
     */
    public function poli()
    {
        return $this->belongsTo(KelolaPoli::class, 'id_poli');
    }
}
