<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengajuan extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function layanan()
    {
        return $this->belongsTo(Layanan::class);
    }

    public function tendik()
    {
        return $this->belongsTo(Tendik::class);
    }

    public function syarat()
    {
        return $this->hasMany(PengajuanPersyaratan::class, 'pengajuan_id');
    }
}
