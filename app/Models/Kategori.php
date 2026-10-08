<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    protected $table = 'kategori';

    public $timestamps = false;

    protected $fillable = [
        'nama_kategori',
    ];

    public function barang(){
        return $this->hasMany(Barang::class,'kategori_id');
    }
}
