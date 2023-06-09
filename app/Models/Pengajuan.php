<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengajuan extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $table = 'pengajuan';

    public function layanan()
    {
        return $this->belongsTo(Layanan::class);
    }

    public function tendik()
    {
        return $this->belongsTo(Tendik::class);
    }

    public function satpen()
    {
        return $this->belongsTo(Satpen::class);
    }

    public function golonganLama()
    {
        return $this->belongsTo(Golongan::class, 'golongan_lama', 'id');
    }

    public function golonganBaru()
    {
        return $this->belongsTo(Golongan::class, 'golongan_baru', 'id');
    }

    public function satpenLama()
    {
        return $this->belongsTo(Satpen::class, 'satpen_lama', 'id');
    }

    public function satpenBaru()
    {
        return $this->belongsTo(Satpen::class, 'satpen_baru', 'id');
    }

    public function syarat()
    {
        return $this->belongsToMany(LayananSyarat::class, 'pengajuan_syarat', 'pengajuan_id', 'persyaratan_id');
    }
}
