<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Layanan extends Model
{
    use HasFactory;

    protected $table = 'layanan';

    protected $fillable = [
        'nama_layanan',
        'nama_layanan_slug',
        'status_layanan',
    ];

    public function persyaratan()
    {
        return $this->hasMany(PersyaratanLayanan::class);
    }
}