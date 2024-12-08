<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KelolaObat extends Model
{
    use HasFactory;

    protected $table = 'obat';

    protected $fillable = [
        'nama_obat',
        'kemasan',
        'harga',
    ];
}
