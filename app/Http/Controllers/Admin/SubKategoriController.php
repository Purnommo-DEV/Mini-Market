<?php

namespace App\Http\Controllers\Admin;

use App\Models\SubKategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Kategori;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use RealRashid\SweetAlert\Facades\Alert;

class SubKategoriController extends Controller
{
    public function admin_subkategori(){
        $data_kategori = Kategori::get();
        $data_subkategori = SubKategori::get();
        return view('Admin.SubKategori.data_subkategori', compact('data_subkategori', 'data_kategori'));
    }

    public function admin_tambah_subkategori(Request $request){
        
        SubKategori::create($request->all());
        Alert::success('Sukses','Berhasil Menambah Kategori');
        return redirect()->back();
    }

    public function admin_ubah_subkategori(Request $request, $id){
        
        SubKategori::findOrFail($id)->update($request->all());
        Alert::success('Sukses','Berhasil Mengubah Kategori');
        return redirect()->back();
    }

    public function admin_hapus_subkategori($id){
        SubKategori::find($id)->delete();
        Alert::success('Sukses','Berhasil Menghapus Kategori');
        return redirect()->back();
    }
}
