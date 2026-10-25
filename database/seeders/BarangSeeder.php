<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Barang;

class BarangSeeder extends Seeder
{
    public function run(): void
    {
        $barangs = [
            [
                'kode_barang' => 'BRG-001',
                'nama_barang' => 'Biskuit Roma Kelapa 300g',
                'kategori_id' => 1, // Makanan Ringan & Snack
                'satuan_id'   => 1, // PCS
                'harga_beli'  => 10000,
                'harga_jual'  => 13000,
                'stok'        => 25,
                'min_stok'    => 5,
                'foto'        => null,
            ],
            [
                'kode_barang' => 'BRG-002',
                'nama_barang' => 'Air Mineral Le Minerale 600ml',
                'kategori_id' => 2, // Minuman Kemasan
                'satuan_id'   => 3, // BOTOL
                'harga_beli'  => 3000,
                'harga_jual'  => 4000,
                'stok'        => 48,
                'min_stok'    => 12,
                'foto'        => null,
            ],
            [
                'kode_barang' => 'BRG-003',
                'nama_barang' => 'Minyak Goreng Bimoli 1L',
                'kategori_id' => 3, // Sembako & Bumbu Dapur
                'satuan_id'   => 9, // LITER
                'harga_beli'  => 15000,
                'harga_jual'  => 18000,
                'stok'        => 20,
                'min_stok'    => 5,
                'foto'        => null,
            ],
            [
                'kode_barang' => 'BRG-004',
                'nama_barang' => 'Indomie Goreng Spesial 85g',
                'kategori_id' => 5, // Mie Instant & Makanan Cepat Saji
                'satuan_id'   => 2, // BUNGKUS
                'harga_beli'  => 2800,
                'harga_jual'  => 3500,
                'stok'        => 80,
                'min_stok'    => 20,
                'foto'        => null,
            ],
            [
                'kode_barang' => 'BRG-005',
                'nama_barang' => 'Sabun Lifebuoy Cair 400ml',
                'kategori_id' => 4, // Kebutuhan Mandi & Cuci
                'satuan_id'   => 3, // BOTOL
                'harga_beli'  => 18000,
                'harga_jual'  => 22000,
                'stok'        => 15,
                'min_stok'    => 3,
                'foto'        => null,
            ],
            [
                'kode_barang' => 'BRG-006',
                'nama_barang' => 'Kopi Kapal Api Special 165g',
                'kategori_id' => 2, // Minuman Kemasan
                'satuan_id'   => 2, // BUNGKUS
                'harga_beli'  => 12500,
                'harga_jual'  => 15000,
                'stok'        => 30,
                'min_stok'    => 5,
                'foto'        => null,
            ],
            [
                'kode_barang' => 'BRG-007',
                'nama_barang' => 'Deterjen Rinso Anti Noda 770g',
                'kategori_id' => 4, // Kebutuhan Mandi & Cuci
                'satuan_id'   => 2, // BUNGKUS
                'harga_beli'  => 17000,
                'harga_jual'  => 20000,
                'stok'        => 12,
                'min_stok'    => 4,
                'foto'        => null,
            ],
            [
                'kode_barang' => 'BRG-008',
                'nama_barang' => 'Susu Frisian Flag Cokelat 370g',
                'kategori_id' => 3, // Sembako & Bumbu Dapur
                'satuan_id'   => 4, // KALENG
                'harga_beli'  => 11500,
                'harga_jual'  => 14000,
                'stok'        => 30,
                'min_stok'    => 8,
                'foto'        => null,
            ],
            [
                'kode_barang' => 'BRG-009',
                'nama_barang' => 'Teh Sariwangi Celup Isi 30',
                'kategori_id' => 2, // Minuman Kemasan
                'satuan_id'   => 1, // PCS
                'harga_beli'  => 6500,
                'harga_jual'  => 8500,
                'stok'        => 18,
                'min_stok'    => 5,
                'foto'        => null,
            ],
            [
                'kode_barang' => 'BRG-010',
                'nama_barang' => 'Beras Pandan Wangi Premium 5kg',
                'kategori_id' => 3, // Sembako & Bumbu Dapur
                'satuan_id'   => 7, // PAKET
                'harga_beli'  => 72000,
                'harga_jual'  => 80000,
                'stok'        => 10,
                'min_stok'    => 2,
                'foto'        => null,
            ],
        ];

        foreach ($barangs as $barang) {
            Barang::firstOrCreate(['kode_barang' => $barang['kode_barang']], $barang);
        }
    }
}
