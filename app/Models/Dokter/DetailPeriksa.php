<?php

namespace App\Models\Dokter;

use App\Models\Admin\KelolaObat;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DetailPeriksa extends Model
{
    use HasFactory;

    protected $table = 'detail_periksa';

    protected $fillable = [
        'id_periksa',
        'id_obat',
    ];

    public function periksa()
    {
        return $this->belongsTo(PeriksaPasien::class, 'id_periksa');
    }

    public function obat()
    {
        return $this->belongsTo(KelolaObat::class, 'id_obat');
    }
}
