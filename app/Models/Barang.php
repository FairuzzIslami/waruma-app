<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    protected $table = 'barang';

    protected $fillable = [
        'foto',
        'kode_barang',
        'nama_barang',
        'satuan_id',
        'kategori_id',
        'harga_beli',
        'harga_jual',
        'stok',
        'min_stok',
    ];

    public function detailTransaksi(){
        return $this->hasMany(DetailTransaksi::class,'barang_id');
    }

    public function satuan(){
        return $this->belongsTo(Satuan::class,'satuan_id');
    }

    public function kategori(){
        return $this->belongsTo(Kategori::class,'kategori_id');
    }
}
