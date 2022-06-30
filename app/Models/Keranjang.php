<?php

namespace App\Models;

use App\Models\User;
use App\Models\Produk;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Keranjang extends Model
{
    use HasFactory;

    protected $table = "keranjang";
    protected $guarded = [];

    public function produk(){
        return $this->belongsTo(Produk::class, 'produk_id', 'id');
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
