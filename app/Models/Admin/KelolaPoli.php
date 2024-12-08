<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KelolaPoli extends Model
{
    use HasFactory;

    protected $table = 'poli';

    protected $fillable = [
        'nama_poli',
        'keterangan',
    ];
}
