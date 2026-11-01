<?php

namespace App\Livewire;

use App\Models\Barang;
use App\Models\Kategori;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;

#[Layout('layouts.guest')]
#[Title('WaruMa – Cek Stok & Harga')]
class KatalogPublik extends Component
{
    use WithPagination;

    protected $paginationTheme = 'tailwind';

    public $search = '';
    public $kategoriAktif = 'semua';

    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function setKategori($kategoriId)
    {
        $this->kategoriAktif = $kategoriId;
        $this->resetPage();
    }

    public function clearSearch()
    {
        $this->search = '';
        $this->resetPage();
    }

    public function render()
    {
        $barangs = Barang::with(['kategori', 'satuan'])
            ->when($this->kategoriAktif !== 'semua', function ($q) {
                $q->where('kategori_id', $this->kategoriAktif);
            })
            ->when(!empty($this->search), function ($q) {
                $q->where(function ($sub) {
                    $sub->where('nama_barang', 'like', '%' . $this->search . '%')
                        ->orWhere('kode_barang', 'like', '%' . $this->search . '%');
                });
            })
            ->latest()
            ->paginate(12);

        $kategoris = Kategori::withCount('barang')->get();
        $totalSemuaBarang = Barang::count();

        return view('home.katalog-publik', [
            'barangs'          => $barangs,
            'kategoris'        => $kategoris,
            'totalSemuaBarang' => $totalSemuaBarang,
        ]);
    }
}
