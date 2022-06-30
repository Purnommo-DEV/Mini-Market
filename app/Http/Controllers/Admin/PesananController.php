<?php

namespace App\Http\Controllers\Admin;

use App\Models\Pesanan;
use App\Models\Pembayaran;
use App\Models\PesananLogs;
use Illuminate\Http\Request;
use App\Models\PesananProduk;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class PesananController extends Controller
{
    public function admin_halaman_pesanan(){
        $pesananPelanggan = Pesanan::get();
        return view('Admin.Pesanan.pesanan', compact('pesananPelanggan'));
    }

    public function admin_halaman_detail_pesanan(Request $request, $id){
        $produk_dipesan = PesananProduk::where('pesanan_id', $id)->get();
        $detail_pesananPelanggan = Pesanan::find($id)->first();
        $bukti_bayar = Pembayaran::where('pesanan_id', $id)->first();
        $pesananLogs = PesananLogs::where('pesanan_id', $id)->get();
        $logPemesanan = PesananLogs::where('pesanan_id', $id)->first() ?? new PesananLogs();
        return view('Admin.Pesanan.detail_pesanan', compact('detail_pesananPelanggan', 'produk_dipesan', 'bukti_bayar', 'pesananLogs', 'logPemesanan'));
    }

    public function admin_verifikasi_pembayaran(Request $request){
        $pesanan_id = $request->input('pesanan_id');
        Pembayaran::where('pesanan_id', $pesanan_id)->update([
            'status_verifikasi'=>1
        ]);
        Alert::success('Sukses','Berhasil Memverifikasi Pembayaran');
        return redirect()->back();
    }

    public function admin_konfirmasi_status_pesanan(Request $request){
        $pesanan_id = $request->input('pesanan_id');
        $resi = $request->resi;
        $status_pesanan = new PesananLogs();
        $status_pesanan->pesanan_id = $pesanan_id;
        $status_pesanan->pesanan_status = $request->pesanan_status;

        Pesanan::where('id', $pesanan_id)->update([
            'status_pesanan'=>$status_pesanan->pesanan_status,

            'resi'=>$resi
        ]);
        $status_pesanan->save();
        Alert::success('Sukses','Berhasil Mengubah Status Pesanan');
        return redirect()->back();
    }
    
}
