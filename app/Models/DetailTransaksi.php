<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetailTransaksi extends Model
{
    protected $table = 'detail_transaksi';

    public $timestamps = false;

    protected $fillable = [
        'transaksi_id',
        'barang_id',
        'jumlah',
        'harga_beli',
        'harga_satuan',
        'subtotal'
    ];

    public function barang(){
        return $this->belongsTo(Barang::class,'barang_id');
    }

    public function transaksi(){
        return $this->belongsTo(Transaksi::class,'transaksi_id');
    }
}
