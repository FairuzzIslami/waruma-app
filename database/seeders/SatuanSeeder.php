<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Satuan;

class SatuanSeeder extends Seeder
{
    public function run(): void
    {
        $satuan = [
            ['nama_satuan' => 'PCS'],
            ['nama_satuan' => 'BUNGKUS'],
            ['nama_satuan' => 'BOTOL'],
            ['nama_satuan' => 'KALENG'],
            ['nama_satuan' => 'DUS'],
            ['nama_satuan' => 'SLOP'],
            ['nama_satuan' => 'PAKET'],
            ['nama_satuan' => 'KG'],
            ['nama_satuan' => 'LITER'],
        ];

        foreach ($satuan as $item) {
            Satuan::firstOrCreate($item);
        }
    }
}
