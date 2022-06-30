<?php

namespace App\Http\Controllers\Admin;

use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;
use RealRashid\SweetAlert\Facades\Alert;

class SliderController extends Controller
{
    public function admin_slider(){
        $data_slider = Slider::get();
        return view('Admin.Slider.data_slider', compact('data_slider'));
    }

    public function admin_tambah_slider(Request $request){
        $tambah_slider = new Slider();
        $tambah_slider->judul = $request->judul;
        $tambah_slider->deskripsi = $request->deskripsi;
        if ($request->hasFile('gambar_slider')) {
            $gambar_slider = $request->file('gambar_slider');
            $filename  = 'Slider_'.$tambah_slider->id .'.'. $gambar_slider->getClientOriginalExtension();
			$path = public_path('Admin/gambar/gambar_slider/' . $filename);
			Image::make($gambar_slider->getRealPath())->resize(1900, 700)->save($path);
			$tambah_slider->gambar_slider = $filename;
        }
        $tambah_slider->save();
        Alert::success('Sukses','Berhasil Menambahkan Slider');
        return back();
    }

    public function admin_ubah_slider(Request $request, $id){
        $ubah_slider = Slider::find($id);
        $ubah_slider->judul = $request->judul;
        $ubah_slider->deskripsi = $request->deskripsi;
        if ($request->hasFile('gambar_slider')) {
            $gambar_slider = $request->file('gambar_slider');
            $filename  = 'Slider_'.$id .'.'. $gambar_slider->getClientOriginalExtension();
			$path = public_path('Admin/gambar/gambar_slider/' . $filename);
			Image::make($gambar_slider->getRealPath())->resize(1900, 700)->save($path);
			$ubah_slider->gambar_slider = $filename;
        }
        $ubah_slider->save();
        Alert::success('Sukses','Berhasil Menambahkan Slider');
        return back();
    }

    public function admin_hapus_slider($id){
        $hapus_slider = Slider::find($id);
        $path_gambar = 'Admin/gambar/gambar_slider' . $hapus_slider->gambar_slider;
            if (File::exists($path_gambar)) {
                File::delete($path_gambar);
            }
        $hapus_slider->delete();
        Alert::success('Sukses','Berhasil Menghapus Slider');
        return redirect()->back();
    }
}
