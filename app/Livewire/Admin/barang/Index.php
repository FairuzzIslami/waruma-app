<?php

namespace App\Livewire\Admin\Barang;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use App\Models\Barang;
use App\Models\Kategori;
use App\Models\Satuan;
use Illuminate\Support\Facades\Storage;

#[Layout('layouts.app')]
#[Title('WARUMA - Kelola Stok & Inventaris')]
class Index extends Component
{
    use WithPagination, WithFileUploads;

    protected $paginationTheme = 'tailwind';

    // Filter & Search
    public $search = '';
    public $filterKategori = 'semua';
    public $filterStatus = 'semua';

    // Form Inputs
    public $barangId;
    public $foto;
    public $oldFoto;
    public $kode_barang;
    public $nama_barang;
    public $kategori_id;
    public $satuan_id;
    public $harga_beli;
    public $harga_jual;
    public $stok;
    public $min_stok;

    // Checkbox Hapus Masal
    public $selectedBarang = [];
    public $selectAll = false;

    // Restock Cepat Input
    public $restockBarangId;
    public $restockNama;
    public $jumlahRestock;

    // Modal States
    public $showModalForm = false;
    public $showModalDelete = false;
    public $showModalRestock = false;
    public $isEditMode = false;

    public function updatedSearch() { $this->resetPage(); }
    public function updatedFilterKategori() { $this->resetPage(); }
    public function updatedFilterStatus() { $this->resetPage(); }

    public function updatedSelectAll($value)
    {
        if ($value) {
            $this->selectedBarang = $this->getBarangQuery()->pluck('id')->map(fn($id) => (string) $id)->toArray();
        } else {
            $this->selectedBarang = [];
        }
    }

    public function generateKodeBarang()
    {
        $lastBarang = Barang::orderBy('id', 'desc')->first();
        if (!$lastBarang) {
            return 'BRG-001';
        }
        $number = (int) preg_replace('/[^0-9]/', '', $lastBarang->kode_barang);
        return 'BRG-' . str_pad($number + 1, 3, '0', STR_PAD_LEFT);
    }

    public function openModalTambah()
    {
        $this->resetForm();
        $this->isEditMode = false;
        $this->kode_barang = $this->generateKodeBarang();
        $this->showModalForm = true;
    }

    public function openModalEdit($id)
    {
        $this->resetForm();
        $this->isEditMode = true;
        $barang = Barang::findOrFail($id);

        $this->barangId = $barang->id;
        $this->kode_barang = $barang->kode_barang;
        $this->nama_barang = $barang->nama_barang;
        $this->kategori_id = $barang->kategori_id;
        $this->satuan_id = $barang->satuan_id;
        $this->harga_beli = number_format($barang->harga_beli, 0, '', '.');
        $this->harga_jual = number_format($barang->harga_jual, 0, '', '.');
        $this->stok = $barang->stok;
        $this->min_stok = $barang->min_stok;
        $this->oldFoto = $barang->foto;

        $this->showModalForm = true;
    }

    public function saveBarang()
    {
        // 1. Sanitasi angka harga dari titik DULUAN sebelum validasi
        $cleanHargaBeli = (int) str_replace('.', '', (string) $this->harga_beli);
        $cleanHargaJual = (int) str_replace('.', '', (string) $this->harga_jual);

        // 2. Rules awal
        $rules = [
            'nama_barang' => 'required|string|max:255',
            'kategori_id' => 'required|exists:kategori,id',
            'satuan_id'   => 'required|exists:satuan,id',
            'harga_beli'  => 'required',
            'harga_jual'  => 'required',
            'min_stok'    => 'required|integer|min:0',
            'stok'        => 'required|integer|min:0',
            'foto'        => $this->isEditMode ? 'nullable|image|max:2048' : 'required|image|max:2048',
        ];

        $messages = [
            'nama_barang.required' => 'Nama barang wajib diisi.',
            'kategori_id.required' => 'Pilih kategori barang.',
            'satuan_id.required'   => 'Pilih satuan barang.',
            'harga_beli.required'  => 'Harga beli wajib diisi.',
            'harga_jual.required'  => 'Harga jual wajib diisi.',
            'min_stok.required'    => 'Batas minimum stok wajib diisi.',
            'stok.required'        => 'Jumlah stok wajib diisi.',
            'foto.required'        => 'Foto barang wajib diunggah.',
            'foto.image'           => 'File foto harus berupa gambar.',
            'foto.max'             => 'Ukuran foto maksimal 2MB.',
        ];

        $this->validate($rules, $messages);

        $hasCustomError = false;

        if ($cleanHargaBeli <= 0) {
            $this->addError('harga_beli', 'Harga beli harus lebih besar dari 0.');
            $hasCustomError = true;
        }

        if ($cleanHargaJual <= 0) {
            $this->addError('harga_jual', 'Harga jual harus lebih besar dari 0.');
            $hasCustomError = true;
        }

        if ($cleanHargaBeli > 0 && $cleanHargaJual > 0 && $cleanHargaJual <= $cleanHargaBeli) {
            $this->addError('harga_jual', 'Harga jual harus lebih besar dari harga beli (modal)!');
            $hasCustomError = true;
        }

        if ((int)$this->stok < (int)$this->min_stok) {
            $this->addError('stok', 'Stok tidak boleh lebih kecil dari batas minimum stok!');
            $hasCustomError = true;
        }

        if ($hasCustomError) {
            return;
        }

        // 4. Proses Simpan jika SEMUA validasi lolos
        $fotoPath = $this->oldFoto;
        if ($this->foto) {
            if ($this->oldFoto && Storage::disk('public')->exists($this->oldFoto)) {
                Storage::disk('public')->delete($this->oldFoto);
            }
            $fotoPath = $this->foto->store('barang', 'public');
        }

        Barang::updateOrCreate(
            ['id' => $this->barangId],
            [
                'kode_barang' => $this->kode_barang,
                'nama_barang' => $this->nama_barang,
                'kategori_id' => $this->kategori_id,
                'satuan_id'   => $this->satuan_id,
                'harga_beli'  => $cleanHargaBeli,
                'harga_jual'  => $cleanHargaJual,
                'stok'        => $this->stok,
                'min_stok'    => $this->min_stok,
                'foto'        => $fotoPath,
            ]
        );

        $msgText = $this->isEditMode ? 'Data barang berhasil diperbarui!' : 'Data barang berhasil disimpan!';

        $this->showModalForm = false;
        $this->resetForm();

        // KIRIM NOTIFIKASI VIA EVENT BROWSER
        $this->dispatch('notif-sukses', message: $msgText);
    }

    public function openModalRestock($id)
    {
        $barang = Barang::findOrFail($id);
        $this->restockBarangId = $barang->id;
        $this->restockNama = $barang->nama_barang . ' (' . $barang->kode_barang . ')';
        $this->jumlahRestock = null;
        $this->resetValidation();
        $this->showModalRestock = true;
    }

    public function submitRestock()
    {
        $this->validate(
            ['jumlahRestock' => 'required|numeric|integer|min:1'],
            [
                'jumlahRestock.required' => 'Jumlah stok wajib diisi!',
                'jumlahRestock.numeric'  => 'Jumlah stok harus berupa angka!',
                'jumlahRestock.min'      => 'Jumlah restock minimal 1.',
            ]
        );

        $barang = Barang::findOrFail($this->restockBarangId);
        $barang->increment('stok', (int) $this->jumlahRestock);

        $this->showModalRestock = false;
        $this->dispatch('notif-sukses', message: 'Stok berhasil ditambahkan!');
    }

    public function confirmDeleteSingle($id)
    {
        $this->selectedBarang = [(string)$id];
        $this->showModalDelete = true;
    }

    public function confirmDeleteBatch()
    {
        $this->showModalDelete = true;
    }

    public function deleteSelected()
    {
        if (count($this->selectedBarang) > 0) {
            $items = Barang::whereIn('id', $this->selectedBarang)->get();
            foreach ($items as $item) {
                if ($item->foto && Storage::disk('public')->exists($item->foto)) {
                    Storage::disk('public')->delete($item->foto);
                }
                $item->delete();
            }

            $this->selectedBarang = [];
            $this->selectAll = false;
            $this->dispatch('notif-sukses', message: 'Data barang berhasil dihapus!');
        }

        $this->showModalDelete = false;
    }

    public function resetForm()
    {
        $this->reset(['barangId', 'foto', 'oldFoto', 'kode_barang', 'nama_barang', 'kategori_id', 'satuan_id', 'harga_beli', 'harga_jual', 'stok', 'min_stok']);
        $this->resetValidation();
    }

    private function getBarangQuery()
    {
        return Barang::with(['kategori', 'satuan'])
            ->when($this->search, function ($q) {
                $q->where(function ($sub) {
                    $sub->where('nama_barang', 'like', '%' . $this->search . '%')
                        ->orWhere('kode_barang', 'like', '%' . $this->search . '%');
                });
            })
            ->when($this->filterKategori !== 'semua', function ($q) {
                $q->where('kategori_id', $this->filterKategori);
            })
            ->when($this->filterStatus !== 'semua', function ($q) {
                if ($this->filterStatus === 'habis') {
                    $q->where('stok', 0);
                } elseif ($this->filterStatus === 'menipis') {
                    $q->where('stok', '>', 0)->whereColumn('stok', '<=', 'min_stok');
                } elseif ($this->filterStatus === 'tersedia') {
                    $q->whereColumn('stok', '>', 'min_stok');
                }
            });
    }

    public function render()
    {
        $statTotal   = Barang::count();
        $statAman    = Barang::whereColumn('stok', '>', 'min_stok')->count();
        $statRestock = Barang::whereColumn('stok', '<=', 'min_stok')->count();
        $statHpp     = Barang::selectRaw('SUM(harga_beli * stok) as total_hpp')->value('total_hpp') ?? 0;

        return view('livewire.admin.barang.index', [
            'barangList'  => $this->getBarangQuery()->latest()->paginate(5),
            'kategoris'   => Kategori::all(),
            'satuans'     => Satuan::all(),
            'statTotal'   => $statTotal,
            'statAman'    => $statAman,
            'statRestock' => $statRestock,
            'statHpp'     => $statHpp,
        ]);
    }
}
