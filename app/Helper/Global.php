<?php

use App\Models\GambarProduk;
use App\Models\Kategori;
use App\Models\Produk;
use App\Models\SubKategori;

function kategori(){
    $kategori = Kategori::get();
    return $kategori;
}

function subkategori(){
    $subkategori = SubKategori::get();
    return $subkategori;
}

function data_produk(){
    $data_produk = Produk::get();
    return $data_produk;
}

function data_produk_first(){
    $data_produk_first = Produk::first();
    return $data_produk_first;
}

function gambar_produk(){
    $gambar_produk = GambarProduk::get();
    return $gambar_produk;
}