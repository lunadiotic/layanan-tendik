<?php

namespace Database\Seeders;

use App\Models\Layanan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LayananSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $layanan = [
            [
                'nama_layanan' => 'Izin Memimpin',
                'nama_layanan_slug' => 'izin-memimpin',
                'status_layanan' => true,
            ],
            [
                'nama_layanan' => 'Kenaikan Pangkat',
                'nama_layanan_slug' => 'kenaikan-pangkat',
                'status_layanan' => true,
            ],
            [
                'nama_layanan' => 'Mutasi',
                'nama_layanan_slug' => 'mutasi',
                'status_layanan' => true,
            ],
        ];
        DB::table('layanan')->insert($layanan);
    }
}
