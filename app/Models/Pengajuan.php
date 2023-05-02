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

    public function syarat()
    {
        return $this->belongsToMany(PersyaratanLayanan::class, 'pengajuan_persyaratan', 'pengajuan_id', 'persyaratan_id');
    }
}
