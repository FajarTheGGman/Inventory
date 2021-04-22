<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengelola;

class PengelolaController extends Controller
{
    public function Delete(Request $user, $id){
        if($user->session()->get('role') !== 'admin'){
            return back();
        }else{
            Pengelola::where('id', $id)->delete();

            return back()->with('berhasil', 'Data Berhasil Di Hapus');
        }
    }

    public function Kirim(Request $user){
        if($user->session()->get('role') !== 'admin'){
            return back();
        }else{
            $check = Pengelola::where('pengelola', $user->nama)->count();

            if($check == 1){
                return back()->with('gagal', 'gagal');
            }else{
                Pengelola::insert([
                    'pengelola' => $user->nama,
                    'keterangan' => $user->keterangan
                ]);
                return back()->with('berhasil', 'Data Berhasil di input');
            }
        }
    }

    public function Input(Request $user){
        if($user->session()->get('role') !== 'admin'){
            return back();
        }else{
            return view('admin/PengelolaInput');
        }
    }

    public function Index(Request $user){
        if($user->session()->get('role') !== 'admin'){
            return back();
        }else{
            $data = Pengelola::paginate(10);
            return view('admin/Pengelola', ['data' => $data]);
        }
    }
}
