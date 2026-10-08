<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Operasional extends Model
{
    protected $table = 'operasional';

    public $timestamps = false;

    protected $fillable = [
        'users_id',
        'keperluan',
        'nominal',
        'tanggal_operasional',
        'catatan'
    ];

    public function user(){
        return $this->belongsTo(User::class,'users_id');
    }
}
