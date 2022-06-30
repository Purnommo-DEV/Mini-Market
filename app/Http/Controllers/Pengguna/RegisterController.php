<?php

namespace App\Http\Controllers\Pengguna;

use App\Models\Kota;
use App\Models\User;
use App\Models\Provinsi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function halaman_register(){
        $provinsi = Provinsi::pluck('nama', 'id');
        $kota = Kota::get();
        return view('Frontend.register', compact('provinsi', 'kota'));
    }

    public function register(Request $request){
        $daftar_baru = new User();
        $daftar_baru->name = $request->name;
        $daftar_baru->email = $request->email;
        $daftar_baru->nomor_hp = $request->nomor_hp;
        $daftar_baru->alamat = $request->alamat;
        $daftar_baru->password = Hash::make($request->password);
        $daftar_baru->provinsi_id = $request->provinsi_id;
        $daftar_baru->kota_id = $request->kota_id;
        $daftar_baru->peran = "Pelanggan";
        $daftar_baru->save();
    return redirect()->route('HalamanLogin');
    }
}
