<?php

namespace Database\Seeders;

use App\Models\LayananSyarat;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PersyaratanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        LayananSyarat::create([
            'layanan_id' => 1,
            'persyaratan' => 'Dokumen xxx'
        ]);
    }
}