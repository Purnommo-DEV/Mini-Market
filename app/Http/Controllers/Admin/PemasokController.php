<?php

namespace App\Http\Controllers\Admin;

use App\Models\Pemasok;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class PemasokController extends Controller
{
    public function admin_pemasok(){
        $data_pemasok = Pemasok::get();
        return view('Admin.Pemasok.data_pemasok', compact('data_pemasok'));
    }

    public function admin_tambah_pemasok(Request $request){
        
        Pemasok::create($request->all());
        Alert::success('Sukses','Berhasil Menambah Kategori');
        return redirect()->back();
    }

    public function admin_ubah_pemasok(Request $request, $id){
        
        Pemasok::findOrFail($id)->update($request->all());
        Alert::success('Sukses','Berhasil Mengubah Kategori');
        return redirect()->back();
    }

    public function admin_hapus_pemasok($id){
        Pemasok::find($id)->delete();
        Alert::success('Sukses','Berhasil Menghapus Kategori');
        return redirect()->back();
    }
}