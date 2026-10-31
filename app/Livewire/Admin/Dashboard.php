<?php

namespace App\Livewire\Admin;

use App\Models\Barang;
use App\Models\Kategori;
use App\Models\Transaksi;
use App\Models\DetailTransaksi;
use App\Models\Operasional;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

#[Layout('layouts.app')]
#[Title('WARUMA - Dashboard Kasir')]
class Dashboard extends Component
{
    use WithPagination;

    protected $paginationTheme = 'tailwind';

    // State Restock Modal
    public $showModalRestock = false;
    public $selectedBarangId;
    public $restockNama;
    public $jumlahRestock;

    // Open Modal Restock
    public function openRestockModal($barangId)
    {
        $this->resetValidation();
        $this->resetErrorBag();

        $barang = Barang::select('id', 'nama_barang')->findOrFail($barangId);
        $this->selectedBarangId = $barang->id;
        $this->restockNama      = $barang->nama_barang;
        $this->jumlahRestock    = '';

        $this->showModalRestock = true;
    }

    // Close Modal Restock & Reset State Validasi
    public function closeRestockModal()
    {
        $this->showModalRestock = false;
        $this->reset(['selectedBarangId', 'restockNama', 'jumlahRestock']);
        $this->resetValidation();
        $this->resetErrorBag();
    }

    public function submitRestock()
    {
        $this->validate([
            'jumlahRestock' => 'required|numeric|min:1',
        ], [
            'jumlahRestock.required' => 'Jumlah restock wajib diisi.',
            'jumlahRestock.numeric'  => 'Jumlah restock harus berupa angka.',
            'jumlahRestock.min'      => 'Jumlah restock minimal 1.',
        ]);

        $barang = Barang::findOrFail($this->selectedBarangId);
        $barang->increment('stok', (int) $this->jumlahRestock);

        $this->closeRestockModal();

        $this->dispatch('notif-sukses', message: "Stok {$barang->nama_barang} berhasil ditambahkan!");
    }

    public function render()
    {
        $todayStart = Carbon::now()->startOfDay();
        $todayEnd   = Carbon::now()->endOfDay();
        $todayDate  = Carbon::now()->format('Y-m-d');

        // 1. QUERY GABUNGAN FINANSIAL (DI-JOIN AGAR SUPER CEPAT)
        $trxSummary = DB::table('transaksi')
            ->whereBetween('tanggal_transaksi', [$todayStart, $todayEnd])
            ->selectRaw('COUNT(id) as total_struk, COALESCE(SUM(total_harga), 0) as omzet')
            ->first();

        $hppSummary = DB::table('detail_transaksi')
            ->join('transaksi', 'detail_transaksi.transaksi_id', '=', 'transaksi.id')
            ->whereBetween('transaksi.tanggal_transaksi', [$todayStart, $todayEnd])
            ->selectRaw('COALESCE(SUM(detail_transaksi.harga_beli * detail_transaksi.jumlah), 0) as total_hpp')
            ->value('total_hpp');

        $operasional = DB::table('operasional')
            ->where('tanggal_operasional', $todayDate)
            ->sum('nominal') ?? 0;

        $omzet      = $trxSummary->omzet;
        $totalStruk = $trxSummary->total_struk;
        $hpp        = $hppSummary;
        $labaKotor  = $omzet - $hpp;
        $labaBersih = $labaKotor - $operasional;
        $avgMargin  = $omzet > 0 ? round(($labaKotor / $omzet) * 100) : 0;

        $summary = [
            'omzet'       => $omzet,
            'totalStruk'  => $totalStruk,
            'hpp'         => $hpp,
            'operasional' => $operasional,
            'labaBersih'  => $labaBersih,
            'avgMargin'   => $avgMargin,
        ];

        // 2. DATA KATALOG & KRITIS (SELECT FIELD YANG DIPERLUKAN SAJA)
        $totalProduk   = Barang::count();
        $totalKategori = Kategori::count();

        $barangKritis = Barang::with(['kategori:id,nama_kategori', 'satuan:id,nama_satuan'])
            ->select('id', 'nama_barang', 'kategori_id', 'satuan_id', 'stok', 'min_stok', 'foto')
            ->where('stok', '>', 0)
            ->whereColumn('stok', '<=', 'min_stok')
            ->get();

        // 3. TRANSAKSI HARI INI (EAGER LOADING TEPAT)
        $transaksiHariIni = Transaksi::with(['detailTransaksi:id,transaksi_id,barang_id,jumlah', 'detailTransaksi.barang:id,nama_barang'])
            ->select('id', 'kode_transaksi', 'tanggal_transaksi', 'total_harga')
            ->whereBetween('tanggal_transaksi', [$todayStart, $todayEnd])
            ->orderBy('tanggal_transaksi', 'asc')
            ->paginate(3);

        return view('livewire.admin.dashboard', [
            'summary'          => $summary,
            'totalProduk'      => $totalProduk,
            'totalKategori'    => $totalKategori,
            'barangKritis'     => $barangKritis,
            'transaksiHariIni' => $transaksiHariIni,
        ]);
    }
}
