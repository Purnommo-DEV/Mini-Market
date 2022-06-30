<?php

namespace App\Http\Controllers\Pengguna;

use App\Models\User;
use App\Models\Produk;
use App\Models\Pesanan;
use App\Models\Provinsi;
use App\Models\Keranjang;
use App\Mail\KirimKeEmail;
use App\Models\Pembayaran;
use Illuminate\Http\Request;
use App\Models\PesananProduk;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use Intervention\Image\Facades\Image;
use RealRashid\SweetAlert\Facades\Alert;

class PemeriksaanController extends Controller
{
    public function pemeriksaan(){
        $data_keranjang = Keranjang::where('user_id', Auth::user()->id)->get();
        $provinsi = Provinsi::pluck('nama', 'id');
        $id_kota_user = User::where('id', Auth::user()->id)->first();
        $total_berat = 0;
        $data_berat = Keranjang::where('user_id', Auth::user()->id)->get();
        foreach($data_berat as $data){
            $total_berat += $data->berat_produk * $data->kuantitas;    
        }
        // $berat = 444;

        $response = Http::withHeaders([
            'key' => 'aab53dc144442c9f6ce1e0ce902c84e2'
            ])->post('https://api.rajaongkir.com/starter/cost', [
                'origin'        => 364, // ID kota/kabupaten asal PONTIANAK
                'destination'   => $id_kota_user->kota_id, // ID kota/kabupaten tujuan
                'weight'        => $total_berat, // berat barang dalam gram
                'courier'       => 'jne'// kode kurir pengiriman: ['jne', 'tiki', 'pos'] untuk starter
            ]);

        $cek_ongkir = $response['rajaongkir']['results'][0]['costs'];
        // return response()->json([
        //     'success' => true,
        //     'message' => 'Result Cost Ongkir',
        //     'data'    => $cek_ongkir
        // ]);
       
            
        return view('Frontend.pemeriksaan', compact('data_keranjang', 'provinsi', 'cek_ongkir'));
    }

    public function pembayaran(Request $request){
        $data_keranjang = Keranjang::where('user_id', Auth::user()->id)->get()->toArray();
        $total_berat = 0;
        $total_bayar = 0;
        foreach($data_keranjang as $key=>$data_keranjangs){
            $total_berat += $data_keranjangs['berat_produk'];
            $total_bayar += $data_keranjangs['harga_produk'] * $data_keranjangs['kuantitas'];
        }
        
        $pesanan = new Pesanan();
        $pesanan->user_id = Auth::user()->id;
        $pesanan->total_berat = $total_berat;
        $pesanan->ongkos_kirim = $request->ongkos_kirim;
        $pesanan->total_bayar = $total_bayar;
        $pesanan->ongkos_kirim  = $request->ongkos_kirim;
        $pesanan->metode_pembayaran = "TransferBank";
        $pesanan->status_pesanan = "Pending";
        $pesanan->save();
        $pesanan_id = DB::getPdo()->lastInsertId();

        foreach($data_keranjang as $key=>$data_keranjangs){
  
            $pesanan_produk = new PesananProduk();
            $pesanan_produk->user_id = Auth::user()->id;
            $pesanan_produk->pesanan_id = $pesanan_id;
            $pesanan_produk->produk_id = $data_keranjangs['produk_id'];
            $pesanan_produk->kuantitas = $data_keranjangs['kuantitas'];
            $pesanan_produk->save();

            $kurangi_stok = Produk::where('id', $data_keranjangs['produk_id'])->first();
            $kurangi_stok->stok_produk = $kurangi_stok['stok_produk'] - $data_keranjangs['kuantitas'];
            $kurangi_stok->update();
        }

        $pembayaran = new Pembayaran();
        $pembayaran->pesanan_id = $pesanan_id;
        $pembayaran->nama_pengirim = $request->nama_pengirim;
        $pembayaran->nomor_rekening = $request->nomor_rekening;
        $pembayaran->asal_bank = $request->asal_bank;
        $pembayaran->status_verifikasi = 0;

        if($request->hasFile('bukti_bayar')){
            $bukti_bayar = $request->file('bukti_bayar');
            $filename = 'PID_'.$pesanan_id.'UID_'.Auth::user()->id.'.'.$bukti_bayar->getClientOriginalExtension();
            $path = public_path('Admin/gambar/bukti_bayar/'.$filename);
            Image::make($bukti_bayar->getRealPath())->save($path);
            $pembayaran->bukti_bayar = $filename;
        }
        $pembayaran->save();

        // Kirim ke Gmail
        $alamat_pengiriman = User::where('id', Auth::user()->id)->with('kota','provinsi')->first()->toArray();
        // dd($alamat_pengiriman);

        $data_pesanan = Pesanan::where('id', $pesanan_id)->first()->toArray();

        $data_produk_dipesan = PesananProduk::where('pesanan_id', $pesanan_id)->with('produk')->get()->toArray();
        // dd($data_produk_dipesan);
        
        Mail::to(Auth::user()->email)->send(new KirimKeEmail($alamat_pengiriman, $data_produk_dipesan, $data_pesanan));

        $dataKeranjang = Keranjang::where('user_id', Auth::user()->id)->get();
        Keranjang::destroy($dataKeranjang);

        // Keranjang::where('user_id', Auth::user()->id)->delete();
        Alert::success('Sukses','Berhasil Membuat Pesanan');
        return redirect()->route('Profil');
    }
}
