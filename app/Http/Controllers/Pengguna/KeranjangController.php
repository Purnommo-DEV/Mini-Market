<?php

namespace App\Http\Controllers\Pengguna;

use App\Models\User;
use App\Models\Produk;
use App\Models\Keranjang;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class KeranjangController extends Controller
{
    public function masukkan_ke_keranjang(Request $request)
    {

         $produk_id = $request->produk_id;
         $produk_kuantitas = $request->produk_kuantitas;
         $produk_berat = $request->berat;
         $produk_harga = $request->harga;
         $user_id = Auth::user()->id;

        if (Auth::id() == null) {
            return response()->json(['status' => "Silahkan Login untuk Melanjutkan "]);
        }else{
            if(Keranjang::where('user_id', Auth::user()->id)->where('produk_id',$produk_id)->exists()){
                return response()->json(['status'=>'Produk Telah ada di Keranjang']);
            }else{
                $tambahKeKeranjang = new Keranjang();
                $tambahKeKeranjang->user_id = Auth::user()->id;
                $tambahKeKeranjang->produk_id = $produk_id;
                $tambahKeKeranjang->kuantitas = $produk_kuantitas;
                $tambahKeKeranjang->berat_produk = $produk_berat;
                $tambahKeKeranjang->harga_produk = $produk_harga;
                $tambahKeKeranjang->save();
                return response()->json(['status'=>'Berhasil Menambahkan Produk ke Keranjang']);
            }
        }
    }

    public function ubah_kuantitas_keranjang(Request $request){
        if($request->ajax()){
            $data = $request->all();
            // echo "<pre>"; print_r($data); die;

            // Tampil Detail Keranjang
            $detailKeranjang = Keranjang::find($data['cartid']);
            
            // Tampil Ketersediaan Stok Produk
            $stokTersedia = Produk::select('stok_produk')->where([
                'id'=>$detailKeranjang['produk_id']])->first()->toArray();

            // echo "Diminta",$data['kts']; 
            // echo "<br>";
            // echo "Tersedia".$stokTersedia['stok_produk']; die;

            // Cek Stok tersedia atau tidak
            if($data['kts'] > $stokTersedia['stok_produk']){
                $data_keranjang = Keranjang::where('user_id', Auth::user()->id)->get();
                return response()->json([
                    'status'=>false,
                    'view'=>(String)View::make('Frontend.isi_keranjang')
                    ->with(compact('data_keranjang'))
                ]);
            }
            Keranjang::where('id', $data['cartid'])->update(['kuantitas'=>$data['kts']]);
            $data_keranjang = Keranjang::where('user_id', Auth::user()->id)->get();
            return response()->json([
                'status'=>true,
                'view'=>(String)View::make('Frontend.isi_keranjang')
                ->with(compact('data_keranjang'))
            ]);
        }
    }

    public function hapus_produk_dalam_keranjang(Request $request){
        if($request->ajax()){
            $data = $request->all();
            // Cek apakah sesuai dengan data yang di Pilih
            // echo "<pre>"; print_r($data); die;
            Keranjang::where('id', $data['cartid'])->delete();
            $data_keranjang = Keranjang::where('user_id', Auth::user()->id)->get();
            return response()->json([
                'status'=>true,
                'view'=>(String)View::make('Frontend.isi_keranjang')
                ->with(compact('data_keranjang'))
            ]);
        }
    }
}
