<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Satpen extends Model
{
    use HasFactory;

    protected $table = 'satpen';

    protected $fillable = [
        'nama_satpen', 'jenjang', 'kecamatan', 'alamat', 'detail_satpen', 'status_satpen'
    ];
}