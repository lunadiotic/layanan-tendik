<?php

namespace Database\Seeders;

use App\Models\Golongan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GolonganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Golongan::create([
            'nama_golongan' => '3A - Penata Muda',
            'status_golongan' => 'Guru Ahli Pertama',
        ]);
    }
}