<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Kategori;

class KategoriSeeder extends Seeder
{
    public function run(): void
    {
        $kategori = [
            ['nama_kategori' => 'Makanan Ringan & Snack'],
            ['nama_kategori' => 'Minuman Kemasan'],
            ['nama_kategori' => 'Sembako & Bumbu Dapur'],
            ['nama_kategori' => 'Kebutuhan Mandi & Cuci'],
            ['nama_kategori' => 'Mie Instant & Makanan Cepat Saji'],
            ['nama_kategori' => 'Rokok & Korek'],
            ['nama_kategori' => 'Obat-Obatan & P3K'],
            ['nama_kategori' => 'Alat Tulis Kantor (ATK)'],
            ['nama_kategori' => 'Lain-Lain'],
        ];

        foreach ($kategori as $item) {
            Kategori::firstOrCreate($item);
        }
    }
}
