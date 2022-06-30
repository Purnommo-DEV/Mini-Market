<?php

namespace App\Http\Controllers\Admin;

use App\Models\Produk;
use App\Models\Pemasok;
use App\Models\Kategori;
use App\Models\Keranjang;
use App\Models\Pembelian;
use App\Models\SubKategori;
use Illuminate\Support\Str;
use App\Models\GambarProduk;
use Illuminate\Http\Request;
use App\Models\PembelianDetail;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use RealRashid\SweetAlert\Facades\Alert;

class ProdukController extends Controller
{
    public function admin_produk(){
        $kategori = Kategori::get();
        $subkategori = SubKategori::get();
        $data_produk = Produk::get();
        $data_pemasok = Pemasok::get();
        return view('Admin.Produk.data_produk', compact('kategori', 'subkategori', 'data_produk', 'data_pemasok'));
    }

    public function admin_data_kategori($kategori_id){
        $subkategori = SubKategori::where('kategori_id', $kategori_id)->pluck('nama_subkategori', 'id');
        return response()->json($subkategori);
    }

    public function admin_halaman_tambah_produk(Request $request){
        $kategori = Kategori::pluck('nama_kategori', 'id');
        $subkategori = SubKategori::get();
        $data_pemasok = Pemasok::get();
        return view('Admin.Produk.tambah_produk', compact('kategori', 'subkategori', 'data_pemasok'));
    }

    public function admin_tambah_produk(Request $request){

        $tambah_produk = new Produk();
        $tambah_produk->kategori_id = $request->kategori_id;
        $tambah_produk->subkategori_id = $request->subkategori_id;
        $tambah_produk->pemasok_id = $request->pemasok_id;
        $tambah_produk->nama_produk = $request->nama_produk;
        $tambah_produk->slug_produk = Str::slug($tambah_produk->nama_produk);
        $tambah_produk->satuan_produk = $request->satuan_produk;
        $tambah_produk->berat_produk = $request->berat_produk;
        $tambah_produk->stok_produk = $request->stok_produk;
        $tambah_produk->harga_beli_produk = $request->harga_beli_produk;
        $tambah_produk->harga_jual_produk = $request->harga_jual_produk;
        $tambah_produk->diskon_produk = $request->diskon_produk;
        $tambah_produk->deskripsi_produk = $request->deskripsi_produk;
        $tambah_produk->save();
        $produk_id = DB::getPdo()->lastInsertId();

        $tambah_gambar_produk = new GambarProduk();
        $tambah_gambar_produk->produk_id =$produk_id;
        
        if ($request->hasFile('gambar1')) {
            $gambar1 = $request->file('gambar1');
            $filename  = 'PR1_'.$produk_id .'.'. $gambar1->getClientOriginalExtension();
			$path = public_path('Admin/gambar/gambar_produk/' . $filename);
			Image::make($gambar1->getRealPath())->resize(350, 550)->save($path);
			$tambah_gambar_produk->gambar1 = $filename;
        }
        if ($request->hasFile('gambar2')) {
            $gambar2 = $request->file('gambar2');
            $filename  = 'PR2_'.$produk_id .'.'. $gambar2->getClientOriginalExtension();
			$path = public_path('Admin/gambar/gambar_produk/' . $filename);
			Image::make($gambar2->getRealPath())->resize(350, 550)->save($path);
			$tambah_gambar_produk->gambar2 = $filename;
        }
        if ($request->hasFile('gambar3')) {
            $gambar3 = $request->file('gambar3');
            $filename  = 'PR2_'.$produk_id .'.'. $gambar3->getClientOriginalExtension();
			$path = public_path('Admin/gambar/gambar_produk/' . $filename);
			Image::make($gambar3->getRealPath())->resize(350, 550)->save($path);
			$tambah_gambar_produk->gambar3 = $filename;
        }
        $tambah_gambar_produk->save();
        Alert::success('Sukses','Berhasil Menambah Produk');
        return redirect()->route('HalamanDaftarProduk');
    }

    public function admin_halaman_ubah_produk($id){
        $data_produk = Produk::where('id',$id)->first();
        $data_gambar_produk = GambarProduk::where('produk_id',$id)->first();
        $kategori = Kategori::get();
        $subkategori = SubKategori::get();
        $data_pemasok = Pemasok::get();
        return view('Admin.Produk.edit_produk', compact('kategori', 'subkategori', 'data_pemasok', 'data_produk', 'data_gambar_produk'));
    }

    public function admin_ubah_produk(Request $request, $id){
        $ubah_produk = Produk::where('id',$id)->first();
        $ubah_produk->kategori_id = $request->kategori_id;
        $ubah_produk->subkategori_id = $request->subkategori_id;
        $ubah_produk->pemasok_id = $request->pemasok_id;
        $ubah_produk->nama_produk = $request->nama_produk;
        $ubah_produk->slug_produk = Str::slug($ubah_produk->nama_produk);
        $ubah_produk->satuan_produk = $request->satuan_produk;
        $ubah_produk->berat_produk = $request->berat_produk;
        $ubah_produk->stok_produk = $request->stok_produk;
        $ubah_produk->harga_beli_produk = $request->harga_beli_produk;
        $ubah_produk->harga_jual_produk = $request->harga_jual_produk;
        $ubah_produk->diskon_produk = $request->diskon_produk;
        $ubah_produk->deskripsi_produk = $request->deskripsi_produk;
        $ubah_produk->save();

        $ubah_gambar_produk = GambarProduk::where('produk_id', $id)->first();
        
        if ($request->hasFile('gambar1')) {
            $gambar1 = $request->file('gambar1');
            $filename  = 'PR1_'.$ubah_produk->id .'.'. $gambar1->getClientOriginalExtension();
			$path = public_path('Admin/gambar/gambar_produk/' . $filename);
			Image::make($gambar1->getRealPath())->resize(350, 550)->save($path);
			$ubah_gambar_produk->gambar1 = $filename;
        }
        if ($request->hasFile('gambar2')) {
            $gambar2 = $request->file('gambar2');
            $filename  = 'PR2_'.$ubah_produk->id .'.'. $gambar2->getClientOriginalExtension();
			$path = public_path('Admin/gambar/gambar_produk/' . $filename);
			Image::make($gambar2->getRealPath())->resize(350, 550)->save($path);
			$ubah_gambar_produk->gambar2 = $filename;
        }
        if ($request->hasFile('gambar3')) {
            $gambar3 = $request->file('gambar3');
            $filename  = 'PR2_'.$ubah_produk->id .'.'. $gambar3->getClientOriginalExtension();
			$path = public_path('Admin/gambar/gambar_produk/' . $filename);
			Image::make($gambar3->getRealPath())->resize(350, 550)->save($path);
			$ubah_gambar_produk->gambar3 = $filename;
        }
        $ubah_gambar_produk->save();
        Alert::success('Sukses','Berhasil Mengubah Data Produk');
        return redirect()->route('HalamanDaftarProduk');
    }

    public function admin_hapus_produk($id){
        Produk::where('id', $id)->delete();
        Alert::success('Sukses','Berhasil Menghapus Data');
        return redirect()->route('HalamanDaftarProduk');
    }

    public function tambah_ke_keranjang(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();
            $hitungProduk = Keranjang::where([
                'user_id'=>Auth::user()->id,
                'produk_id'=>$data['produk_id']])->count();
            if($hitungProduk>0){
                return response()->json(['success'=>'Produk Telah ada di Keranjang']);
            }
            $tambah_ke_keranjang = new Keranjang();
            $tambah_ke_keranjang->user_id = Auth::user()->id;
            $tambah_ke_keranjang->produk_id = $request->input('produk_id');
            $tambah_ke_keranjang->berat_produk = $request->input('berat_produk');
            $tambah_ke_keranjang->harga_produk = $request->input('harga_produk');
            $tambah_ke_keranjang->kuantitas = $request->input('kuantitas');
            $tambah_ke_keranjang->save();
            return response()->json(['success'=>'Produk Telah di Tambah ke Keranjang']);
        }
    }

}
