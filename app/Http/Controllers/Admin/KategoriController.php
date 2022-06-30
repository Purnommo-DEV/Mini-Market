<?php

namespace App\Http\Controllers\Admin;

use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\SubKategori;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use RealRashid\SweetAlert\Facades\Alert;

class KategoriController extends Controller
{
    public function admin_kategori(){
        $data_kategori = Kategori::get();
        return view('Admin.Kategori.data_kategori', compact('data_kategori'));
    }

    public function admin_tambah_kategori(Request $request){
        
        $tambah_kategori = new Kategori();
        $tambah_kategori->nama_kategori =  $request->nama_kategori;
        $kategori_id = DB::getPdo()->lastInsertId();
        
        if ($request->hasFile('gambar_kategori')) {
            $gambar_kategori = $request->file('gambar_kategori');
            $filename  = 'Kategori_'.$kategori_id .'.'. $gambar_kategori->getClientOriginalExtension();
			$path = public_path('Admin/gambar/gambar_kategori/' . $filename);
			Image::make($gambar_kategori->getRealPath())->resize(200, 200)->save($path);
			$tambah_kategori->gambar_kategori = $filename;
        }
        $tambah_kategori->save();
        Alert::success('Sukses','Berhasil Menambah Kategori');
        return redirect()->back();
    }

    public function admin_ubah_kategori(Request $request, $id){
        
        $ubah_kategori = Kategori::findOrFail($id);
        $ubah_kategori->nama_kategori = $request->nama_kategori;

        if ($request->hasFile('gambar_kategori')) {
            $path_gambar = 'gambar/gambar_kategori' . $ubah_kategori->gambar_kategori;
            if (File::exists($path_gambar)) {
                File::delete($path_gambar);
            }
            $gambar_kategori = $request->file('gambar_kategori');
            $filename  = 'Kategori_'.$id .'.'. $gambar_kategori->getClientOriginalExtension();
			$path = public_path('Admin/gambar/gambar_kategori/' . $filename);
			Image::make($gambar_kategori->getRealPath())->resize(200, 200)->save($path);
			$ubah_kategori->gambar_kategori = $filename;
        }
        $ubah_kategori->save();
        Alert::success('Sukses','Berhasil Mengubah Kategori');
        return redirect()->back();
    }

    public function admin_hapus_kategori($id){
        $hapus_kategori = Kategori::find($id);
        $path_gambar = 'gambar/gambar_kategori' . $hapus_kategori->gambar_kategori;
            if (File::exists($path_gambar)) {
                File::delete($path_gambar);
            }
        $hapus_kategori->delete();
        Alert::success('Sukses','Berhasil Menghapus Kategori');
        return redirect()->back();
    }
}
