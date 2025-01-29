<?php

namespace App\Http\Controllers;

use App\Models\pegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function index()
    {
        return view('loginPage');
    }

    public function loginProcess(Request $request){
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        $dataPegawai = pegawai::with('level') 
            ->where('username', $request->username)
            ->first();

            // dd($dataPegawai->level->level);

        if($dataPegawai){
            if (Hash::check($request->password, $dataPegawai->password)) {

                session([ 'user' => 
                    [
                        'name' => $dataPegawai->nama_pegawai,
                        'level' => $dataPegawai->level->level
                    ]
                ]);
                
                $level = $dataPegawai->level; 
                if ($level && $level->id_level == 1) {
                    return redirect()->route('pegawai.index');
                } else if ($level && $level->id_level == 2) {
                    return redirect()->route('menu.index');
                } else if ($level && $level->id_level == 3) {
                    return redirect()->route('pemesanan.index');
                } else {
                    return redirect()->route('login')->with('error', 'akses tidak ditemukan');
                }
            } else {
                return redirect()->route('login')->with('error', 'Username atau password salah');
            }
        } else {
            return redirect()->route('login')->with('error', 'Username atau password salah');
        }
    }

    public function logoutProcess(){
        session()->forget('user');
        return redirect()->route('login');
    }
}
