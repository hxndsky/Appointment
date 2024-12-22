<?php

namespace App\Models\Pasien;

use App\Models\Admin\KelolaDokter;
use App\Models\Dokter\JadwalPeriksa;
use App\Models\Dokter\PeriksaPasien;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DaftarPoli extends Model
{
    use HasFactory;

    protected $table = 'daftar_poli';

    protected $fillable = [
        'id_pasien',
        'id_jadwal',
        'keluhan',
        'no_antrian',
    ];

    public function jadwal()
    {
        return $this->belongsTo(JadwalPeriksa::class, 'id_jadwal');
    }

    public function pasien()
    {
        return $this->belongsTo(User::class, 'id_pasien');
    }

    public function periksa()
{
    return $this->hasOne(PeriksaPasien::class, 'id_daftar_poli');
}

}
