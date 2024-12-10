<?php

namespace App\Models\Admin;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class KelolaPasien extends Authenticatable
{
    use Notifiable;

    protected $table = 'pasien';

    protected $fillable = [
        'nama',
        'email',
        'alamat',
        'no_ktp',
        'no_hp',
        'no_rm',
        'role',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function poli()
    {
        return $this->belongsTo(KelolaPoli::class, 'id_poli');
    }
}
