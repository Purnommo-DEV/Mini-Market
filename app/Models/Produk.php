<?php

namespace App\Models;

use App\Models\Kategori;
use App\Models\SubKategori;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Produk extends Model
{
    use HasFactory;

    protected $table = "produk";
    protected $guarded = [];

    public function kategori(){
        return $this->belongsTo(Kategori::class, 'kategori_id', 'id');
    }

    public function subkategori(){
        return $this->belongsTo(SubKategori::class, 'subkategori_id', 'id');
    }
}
