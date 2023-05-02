<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengajuanPersyaratan extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $table = 'pengajuan_persyaratan';

    public function persyaratan()
    {
        return $this->belongsTo(LayananSyarat::class, 'persyaratan_id', 'id');
    }
}