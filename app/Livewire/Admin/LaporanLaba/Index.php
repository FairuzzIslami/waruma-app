<?php

namespace App\Livewire\Admin\LaporanLaba;

use App\Models\Transaksi;
use App\Models\DetailTransaksi;
use App\Models\Operasional;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

#[Layout('layouts.app')]
#[Title('WARUMA - Laporan Laba Rugi & Finansial')]
class Index extends Component
{
    use WithPagination;

    protected $paginationTheme = 'tailwind';

    // State Filter Periode
    public $periode = 'minggu_ini'; // 'hari_ini', 'minggu_ini', 'bulan_ini', 'custom'
    public $startDate;
    public $endDate;

    // Search & State Modal Operasional
    public $searchStruk = '';
    public $showModalOperasional = false;
    public $showModalDeleteOperasional = false;
    public $isEditMode = false;

    // Form Inputs Operasional
    public $operasionalId;
    public $keperluan;
    public $tanggal_operasional;
    public $nominal;
    public $catatan;

    public function mount()
    {
        $this->setPeriode('minggu_ini');
    }

    public function updatedSearchStruk()
    {
        $this->resetPage();
    }

    public function setPeriode($mode)
    {
        $this->periode = $mode;
        $now = Carbon::now();

        if ($mode === 'hari_ini') {
            $this->startDate = $now->format('Y-m-d');
            $this->endDate   = $now->format('Y-m-d');
        } elseif ($mode === 'minggu_ini') {
            $this->startDate = $now->copy()->startOfWeek()->format('Y-m-d');
            $this->endDate   = $now->copy()->endOfWeek()->format('Y-m-d');
        } elseif ($mode === 'bulan_ini') {
            $this->startDate = $now->copy()->startOfMonth()->format('Y-m-d');
            $this->endDate   = $now->copy()->endOfMonth()->format('Y-m-d');
        }

        $this->resetPage();
    }

    public function applyCustomDate()
    {
        if (!$this->startDate || !$this->endDate) {
            $this->dispatch('notif-error', message: 'Pilih tanggal awal dan tanggal akhir terlebih dahulu!');
            return;
        }

        if (Carbon::parse($this->startDate)->gt(Carbon::parse($this->endDate))) {
            $this->dispatch('notif-error', message: 'Tanggal awal tidak boleh melebihi tanggal akhir!');
            return;
        }

        $this->periode = 'custom';
        $this->resetPage();
    }

    // CRUD Operasional
    public function openModalTambah()
    {
        $this->resetFormOperasional();
        $this->isEditMode = false;
        $this->tanggal_operasional = Carbon::now()->format('Y-m-d');
        $this->showModalOperasional = true;
    }

    public function openModalEdit($id)
    {
        $this->resetFormOperasional();
        $this->isEditMode = true;

        $item = Operasional::findOrFail($id);
        $this->operasionalId       = $item->id;
        $this->keperluan           = $item->keperluan;
        $this->tanggal_operasional = $item->tanggal_operasional;
        $this->nominal             = number_format($item->nominal, 0, '', '.');
        $this->catatan             = $item->catatan;

        $this->showModalOperasional = true;
    }

    public function saveOperasional()
    {
        $cleanNominal = (int) str_replace('.', '', (string) $this->nominal);

        $this->validate([
            'keperluan'           => 'required|string|max:255',
            'tanggal_operasional' => 'required|date',
            'nominal'             => 'required',
        ], [
            'keperluan.required'           => 'Nama keperluan/biaya wajib diisi.',
            'tanggal_operasional.required' => 'Tanggal operasional wajib diisi.',
            'nominal.required'             => 'Nominal biaya wajib diisi.',
        ]);

        if ($cleanNominal <= 0) {
            $this->addError('nominal', 'Nominal biaya harus lebih besar dari 0.');
            return;
        }

        $isEdit = !empty($this->operasionalId);

        Operasional::updateOrCreate(
            ['id' => $this->operasionalId],
            [
                'users_id'            => Auth::id() ?? 1,
                'keperluan'           => $this->keperluan,
                'tanggal_operasional' => $this->tanggal_operasional,
                'nominal'             => $cleanNominal,
                'catatan'             => $this->catatan,
            ]
        );

        $this->showModalOperasional = false;
        $this->resetFormOperasional();

        // Notifikasi Tambah / Edit
        $pesan = $isEdit ? 'Biaya operasional berhasil diperbarui!' : 'Biaya operasional berhasil dicatat!';
        $this->dispatch('notif-sukses', message: $pesan);
    }

    public function confirmDeleteOperasional($id)
    {
        $this->operasionalId = $id;
        $this->showModalDeleteOperasional = true;
    }

    public function deleteOperasional()
    {
        if ($this->operasionalId) {
            Operasional::where('id', $this->operasionalId)->delete();
            $this->resetFormOperasional();

            // Tutup semua modal operasional
            $this->showModalDeleteOperasional = false;
            $this->showModalOperasional = false;

            // Notifikasi Hapus
            $this->dispatch('notif-sukses', message: 'Biaya operasional berhasil dihapus!');
        }
    }

    public function resetFormOperasional()
    {
        $this->reset(['operasionalId', 'keperluan', 'tanggal_operasional', 'nominal', 'catatan']);
        $this->resetValidation();
    }

    // Perhitungan Ringkasan Finansial
    private function getFinancialSummary()
    {
        $start = Carbon::parse($this->startDate)->startOfDay();
        $end   = Carbon::parse($this->endDate)->endOfDay();

        $omzet = Transaksi::whereBetween('tanggal_transaksi', [$start, $end])->sum('total_harga') ?? 0;
        $totalStruk = Transaksi::whereBetween('tanggal_transaksi', [$start, $end])->count();

        $hpp = DetailTransaksi::whereHas('transaksi', function ($q) use ($start, $end) {
            $q->whereBetween('tanggal_transaksi', [$start, $end]);
        })->sum(DB::raw('harga_beli * jumlah')) ?? 0;

        $operasional = Operasional::whereBetween('tanggal_operasional', [$this->startDate, $this->endDate])->sum('nominal') ?? 0;

        $labaKotor  = $omzet - $hpp;
        $labaBersih = $labaKotor - $operasional;

        return [
            'omzet'       => $omzet,
            'totalStruk'  => $totalStruk,
            'hpp'         => $hpp,
            'operasional' => $operasional,
            'labaKotor'   => $labaKotor,
            'labaBersih'  => $labaBersih,
        ];
    }

    public function render()
    {
        $summary = $this->getFinancialSummary();

        $transaksiList = Transaksi::with(['detailTransaksi.barang'])
            ->when($this->searchStruk, function ($q) {
                $q->where('kode_transaksi', 'like', '%' . $this->searchStruk . '%');
            })
            ->whereBetween('tanggal_transaksi', [
                Carbon::parse($this->startDate)->startOfDay(),
                Carbon::parse($this->endDate)->endOfDay()
            ])
            ->orderBy('tanggal_transaksi', 'desc')
            ->paginate(5);

        $operasionalList = Operasional::whereBetween('tanggal_operasional', [$this->startDate, $this->endDate])
            ->orderBy('tanggal_operasional', 'desc')
            ->get();

        return view('livewire.admin.laporanLaba.index', [
            'summary'         => $summary,
            'transaksiList'   => $transaksiList,
            'operasionalList' => $operasionalList,
        ]);
    }
}
