<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $table = 'transaksi';

    public $timestamps = false;

    protected $fillable = [
        'kode_transaksi',
        'users_id',
        'total_harga',
        'bayar',
        'kembali',
        'tanggal_transaksi'
    ];

    public function detailTransaksi(){
        return $this->hasMany(DetailTransaksi::class,'transaksi_id');
    }

    public function user(){
        return $this->belongsTo(User::class,'users_id');
    }
}
