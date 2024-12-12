<?php

namespace App\Models\Admin;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\User;

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

    protected $rememberToken = true;

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

    public function pasien()
    {
        return $this->hasOne(User::class, 'email', 'email');
    }
}
