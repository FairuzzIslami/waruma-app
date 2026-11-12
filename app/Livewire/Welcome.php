<?php

namespace App\Livewire;

use App\Models\Barang;
use App\Models\Kategori;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Layout('layouts.guest')]
#[Title('WARUMA - Warung Mama Sembako & Kebutuhan Harian')]
class Welcome extends Component
{
    public function render()
    {
        $kategoris = Kategori::where('nama_kategori', '!=', 'Lain-Lain')
            ->take(8)
            ->get()
            ->map(function ($kat) {
                $kat->jumlah_produk = Barang::where('kategori_id', $kat->id)->count();
                return $kat;
            });

        $produkTerkini = Barang::with(['kategori', 'satuan'])
            ->latest()
            ->take(4)
            ->get();

        $totalProduk = Barang::count();

        return view('home.welcome', [
            'kategoris'     => $kategoris,
            'produkTerkini' => $produkTerkini,
            'totalProduk'   => $totalProduk,
        ]);
    }
}
