<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LayananSyarat extends Model
{
    use HasFactory;

    protected $table = 'layanan_syarat';

    protected $fillable = [
        'layanan_id',
        'persyaratan',
    ];

    public function layanan()
    {
        return $this->belongsTo(Layanan::class);
    }

    public function pengajuan()
    {
        return $this->belongsToMany(Pengajuan::class, 'pengajuan_syarat', 'persyaratan_id', 'pengajuan_id');
    }
}