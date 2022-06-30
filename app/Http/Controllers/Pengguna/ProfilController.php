<?php

namespace App\Http\Controllers\Pengguna;

use App\Models\Pesanan;
use App\Models\Pembayaran;
use Illuminate\Http\Request;
use App\Models\PesananProduk;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class ProfilController extends Controller
{
    public function profil(){
        $pesanan = Pesanan::where('user_id', Auth::user()->id)->orderBy('id', 'desc')->get();
        $buktiTransfer = Pembayaran::get();
        $produkDiPesan = PesananProduk::get();
        return view('Frontend.profile', compact('pesanan', 'buktiTransfer', 'produkDiPesan'));
    }

    public function konfirmasi_produk_diterima(Request $request){
        $pesanan_id = $request->input('id');
        Pesanan::where('id', $pesanan_id)->update([
            'status_pesanan'=>"Diterima"
        ]);
        Alert::success('Sukses','Berhasil Konfirmasi Produk di Terima');
        return redirect()->back();
    }
}
