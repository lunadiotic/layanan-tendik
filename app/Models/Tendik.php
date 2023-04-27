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
        'jenjang',
        'status',
        'status_detail',
        'golongan_id',
        'satpen_id',
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
}
