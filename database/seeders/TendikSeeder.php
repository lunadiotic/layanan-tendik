<?php

namespace Database\Seeders;

use App\Models\Tendik;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TendikSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Tendik::create([
            'nip' => '123456789',
            'nama_tendik' => 'Tendik 1',
            'jenjang' => 'sd',
            'status' => 'guru',
            'status_detail' => '-',
            'golongan_id' => 1,
            'satpen_id' => 1
        ]);
    }
}
