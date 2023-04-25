<?php

namespace Database\Seeders;

use App\Models\Satpen;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SatpenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Satpen::create([
            'nama_satpen' => 'SMA - Sekolah Menengah Atas',
            'jenjang' => 'SMA',
            'kecamatan' => 'Kesambi',
            'alamat' => 'jl. kesambi raya, cirebon, jawa barat',
            'detail_satpen' => '-',
            'status_satpen' => true
        ]);
    }
}