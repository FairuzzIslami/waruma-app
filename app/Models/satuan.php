<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class satuan extends Model
{
    protected $table = 'satuan';

    public $timestamps = false;
    
    protected $fillable = [
        'nama_satuan'
    ];

    // public function barang(){
    //     return $this->hasMany(barang::class,'satuan_id');
    // }
}
