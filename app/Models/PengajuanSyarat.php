<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengajuanSyarat extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $table = 'pengajuan_syarat';

    public function persyaratan()
    {
        return $this->belongsTo(LayananSyarat::class, 'persyaratan_id', 'id');
    }
}