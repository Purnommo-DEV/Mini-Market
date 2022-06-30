<?php

namespace App\Http\Controllers;

use App\Models\Kota;
use App\Models\Produk;
use App\Models\Slider;
use App\Models\Kategori;
use App\Models\Keranjang;
use App\Models\SubKategori;
use App\Models\GambarProduk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FrontendController extends Controller
{
    public function index(){
        $data_slider = Slider::first();
        $kategori = Kategori::get();
        $subkategori = SubKategori::get();
        $data_produk = Produk::paginate(12);
        return view('Frontend.homepage', compact('kategori', 'subkategori', 'data_produk', 'data_slider'));
    }
    public function kategori(){

        return view('Frontend.kategori');
    }
    public function detailproduk($slug){
        $data_produk = Produk::where('slug_produk', $slug)->first();
        $gambar_produk = GambarProduk::where('produk_id', $data_produk->id)->first();
        return view('Frontend.detailproduk', compact('gambar_produk', 'data_produk'));
    }
    public function checkout(){

        return view('Frontend.checkout');
    }
    public function keranjang(){

        $data_keranjang = Keranjang::where('user_id', Auth::user()->id)->get();
        return view('Frontend.keranjang', compact('data_keranjang'));
    }

    public function data_kota($provinsi_id){
        $kota = Kota::where('provinsi_id', $provinsi_id)->pluck('nama', 'id');
        return response()->json($kota);
    }

    public function total_produk_keranjang(){
        $total_produk_keranjang = Keranjang::where('user_id', Auth::user()->id)->count();
        return response()->json(['totalProdukKeranjang' => $total_produk_keranjang]);
    }

    public function subkategori($id){
        $data_produk = Produk::where('subkategori_id', $id)->get();
        $kategori = Kategori::get();
        $subkategori = SubKategori::get();
        return view('Frontend.subkategori', compact('data_produk', 'kategori', 'subkategori'));
    }

    public function semua_produk(){
        $data_produk = Produk::paginate(12);
        return view('Frontend.semua_produk', compact('data_produk'));
    }

    public function pencarian_produk(Request $request){
        $kategori = Kategori::get();
        $subkategori = SubKategori::get();
        $data_produk = Produk::where(function ($query) use ($request) {
            return $request->cari ?
                $query->from('produk')->where('nama_produk', $request->cari) : '';
        })->get();
        return view('Frontend.semua_produk',compact('data_produk', 'kategori', 'subkategori',));
    }
}
