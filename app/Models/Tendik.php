<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tendik extends Model
{
    use HasFactory;

    protected $table = 'tendik';

    protected $fillable = [
        'nip',
        'nama_tendik',
        'pendidikan',
        'status',
        'status_detail',
        'golongan_id',
        'satpen_id',
        'korwil',
        'no_hp',
        'tahun_pensiun',
        'keterangan',
    ];

    public function satpen()
    {
        return $this->belongsTo(Satpen::class);
    }

    public function golongan()
    {
        return $this->belongsTo(Golongan::class);
    }

    public function user()
    {
        return $this->hasOne(User::class, 'nip', 'nip');
    }

    public function pengajuan()
    {
        return $this->hasMany(Pengajuan::class);
    }
}
