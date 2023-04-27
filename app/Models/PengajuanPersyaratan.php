<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengajuanPersyaratan extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function persyaratan()
    {
        return $this->belongsTo(PersyaratanLayanan::class, 'persyaratan_id', 'id');
    }
}
