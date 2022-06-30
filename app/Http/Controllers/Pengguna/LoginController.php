<?php

namespace App\Http\Controllers\Pengguna;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function halaman_login(){
        return view('Frontend.login');
    }

    public function cek_login(Request $request){
        $request->validate([

            'email' => 'required|email',
            'password' => 'required',
        ]);

        if(Auth::attempt($request->only('email','password'))){
            if (auth()->user()->peran == 'Pelanggan') {
                return redirect()->route('Home');
            } 
            elseif (auth()->user()->peran == 'Admin') {
                return redirect()->route('HalamanDaftarProduk');
            }
        }else{
            toast('Gagal Login, <br> <small>Cek kembali Email dan Password Anda</small>','error');
            return redirect()->route('Login')
    
            ->with('error','Email-Address And Password Are Wrong.');
        }
    }
    public function logout(Request $request){
        Auth::logout();
        return redirect()->route('Home');
    }
}
