<?php

namespace App\Livewire\Admin\Transaksi;

use App\Models\Barang;
use App\Models\Kategori;
use App\Models\Transaksi;
use App\Models\DetailTransaksi;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class Index extends Component
{
    use WithPagination;

    protected $paginationTheme = 'tailwind';

    public $search = '';
    public $kategoriAktif = 'semua';
    public $keranjang = []; // State keranjang transaksi

    public $bayar = null;
    public $transaksiSelesai = null; // Data transaksi untuk nota/modal

    public function mount()
    {
        $this->keranjang = [];
        $this->bayar = null;
    }

    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function setKategori($kategoriId)
    {
        $this->kategoriAktif = $kategoriId;
        $this->resetPage();
    }

    public function tambahKeKeranjang($barangId)
    {
        $barang = Barang::find($barangId);

        if (!$barang || $barang->stok <= 0) {
            $this->dispatch('notif-error', message: 'Stok barang habis!');
            return;
        }

        if (isset($this->keranjang[$barangId])) {
            if ($this->keranjang[$barangId]['qty'] + 1 > $barang->stok) {
                $this->dispatch('notif-error', message: 'Jumlah melebihi stok yang tersedia!');
                return;
            }
            $this->keranjang[$barangId]['qty'] += 1;
            $this->keranjang[$barangId]['subtotal'] = $this->keranjang[$barangId]['qty'] * $this->keranjang[$barangId]['harga_jual'];
        } else {
            $this->keranjang[$barangId] = [
                'barang_id'   => $barang->id,
                'kode_barang' => $barang->kode_barang,
                'nama_barang' => $barang->nama_barang,
                'harga_jual'  => (int) $barang->harga_jual,
                'harga_beli'  => (int) $barang->harga_beli,
                'qty'         => 1,
                'subtotal'    => (int) $barang->harga_jual,
                'stok'        => $barang->stok,
            ];
        }
    }

    public function updateQty($barangId, $action)
    {
        if (!isset($this->keranjang[$barangId])) return;

        if ($action === 'tambah') {
            if ($this->keranjang[$barangId]['qty'] + 1 > $this->keranjang[$barangId]['stok']) {
                $this->dispatch('notif-error', message: 'Stok tidak mencukupi!');
                return;
            }
            $this->keranjang[$barangId]['qty'] += 1;
        } elseif ($action === 'kurang') {
            $this->keranjang[$barangId]['qty'] -= 1;
            if ($this->keranjang[$barangId]['qty'] <= 0) {
                unset($this->keranjang[$barangId]);
                return;
            }
        }

        if (isset($this->keranjang[$barangId])) {
            $this->keranjang[$barangId]['subtotal'] = $this->keranjang[$barangId]['qty'] * $this->keranjang[$barangId]['harga_jual'];
        }
    }

    public function hapusItem($barangId)
    {
        unset($this->keranjang[$barangId]);
    }

    public function resetKeranjang()
    {
        $this->keranjang = [];
        $this->bayar = null;
    }

    public function setBayar($nominal)
    {
        $this->bayar = (int) $nominal;
    }

    public function setUangPas()
    {
        $this->bayar = $this->totalHarga > 0 ? $this->totalHarga : null;
    }

    public function getTotalHargaProperty()
    {
        return array_sum(array_column($this->keranjang, 'subtotal'));
    }

    public function getTotalHppProperty()
    {
        $totalHpp = 0;
        foreach ($this->keranjang as $item) {
            $totalHpp += ($item['harga_beli'] * $item['qty']);
        }
        return $totalHpp;
    }

    public function getTotalItemProperty()
    {
        return array_sum(array_column($this->keranjang, 'qty'));
    }

    public function getKembaliProperty()
    {
        $cleanBayar = (int) str_replace('.', '', (string) $this->bayar);
        return max(0, $cleanBayar - $this->totalHarga);
    }

    public function getKodeTransaksiBerikutnyaProperty()
    {
        $todayStr = Carbon::now()->format('Ymd');
        $countToday = Transaksi::whereDate('tanggal_transaksi', Carbon::today())->count() + 1;
        return 'TRX-' . $todayStr . '-' . str_pad($countToday, 4, '0', STR_PAD_LEFT);
    }

    public function simpanTransaksi()
    {
        $cleanBayar = (int) str_replace('.', '', (string) $this->bayar);

        if (empty($this->keranjang)) {
            $this->dispatch('notif-error', message: 'Keranjang masih kosong!');
            return;
        }

        if ($cleanBayar <= 0) {
            $this->dispatch('notif-error', message: 'Masukkan nominal uang terlebih dahulu!');
            return;
        }

        if ($cleanBayar < $this->totalHarga) {
            $this->dispatch('notif-error', message: 'Nominal uang tunai kurang dari total tagihan!');
            return;
        }

        DB::beginTransaction();
        try {
            $kodeTrx = $this->kodeTransaksiBerikutnya;

            $transaksi = Transaksi::create([
                'kode_transaksi'    => $kodeTrx,
                'users_id'          => Auth::id() ?? 1,
                'total_harga'       => $this->totalHarga,
                'bayar'             => $cleanBayar,
                'kembali'           => $this->kembali,
                'tanggal_transaksi' => Carbon::now(),
            ]);

            foreach ($this->keranjang as $item) {
                DetailTransaksi::create([
                    'transaksi_id' => $transaksi->id,
                    'barang_id'    => $item['barang_id'],
                    'jumlah'       => $item['qty'],
                    'harga_beli'   => $item['harga_beli'],
                    'harga_satuan' => $item['harga_jual'],
                    'subtotal'     => $item['subtotal'],
                ]);

                $barang = Barang::find($item['barang_id']);
                if ($barang) {
                    $barang->decrement('stok', $item['qty']);
                }
            }

            DB::commit();

            $this->transaksiSelesai = $transaksi->load('detailTransaksi.barang');
            $this->dispatch('buka-modal-sukses');

        } catch (\Exception $e) {
            DB::rollBack();
            $this->dispatch('notif-error', message: 'Gagal memproses transaksi: ' . $e->getMessage());
        }
    }

    public function transaksiBaru()
    {
        $this->resetKeranjang();
        $this->transaksiSelesai = null;
        $this->dispatch('tutup-modal-sukses');
    }

    private function getBarangQuery()
    {
        return Barang::with(['kategori', 'satuan'])
            ->when($this->kategoriAktif !== 'semua', function ($q) {
                $q->where('kategori_id', $this->kategoriAktif);
            })
            ->when(!empty($this->search), function ($q) {
                $q->where(function ($sub) {
                    $sub->where('nama_barang', 'like', '%' . $this->search . '%')
                        ->orWhere('kode_barang', 'like', '%' . $this->search . '%');
                });
            });
    }

    public function render()
    {
        return view('livewire.admin.transaksi.index', [
            'barangs'   => $this->getBarangQuery()->paginate(9),
            'kategoris' => Kategori::all(),
        ])->layout('layouts.app', ['title' => 'WARUMA - Kasir & Transaksi POS']);
    }
}
