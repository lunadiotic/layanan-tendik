<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersyaratanLayanan extends Model
{
    use HasFactory;

    protected $table = 'persyaratan_layanan';

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
        return $this->belongsToMany(Pengajuan::class, 'pengajuan_persyaratan', 'persyaratan_id', 'pengajuan_id');
    }
}