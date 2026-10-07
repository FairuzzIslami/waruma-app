<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'username',
        'password'
    ];

    protected $hidden = [
        'password',
    ];

    // public function operasional(){
    //     return $this->hasMany(operasional::class, 'users_id');
    // }

    // public function transaksi(){
    //     return $this->hasMany(transaksi::class,'users_id');
    // }
}
