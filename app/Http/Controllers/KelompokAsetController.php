<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KelompokAset;

class KelompokAsetController extends Controller
{
    public function Delete(Request $user, $id){
        if($user->session()->get('role') !== 'admin'){
            return back();
        }else{
            KelompokAset::where('id', $id)->delete();
            return back();
        }
    }

    public function Kirim(Request $user){
        if($user->session()->get('role') !== 'admin'){
            return back();
        }else{
            $check = KelompokAset::where('nama', $user->nama)->where('umur_ekonomis', $user->nama)->where('keterangan', $user->keterangan)->count();

            if($check == 1){
                return back()->with('gagal', 'gagal');
            }else{
                KelompokAset::insert([
                    'nama' => $user->nama,
                    'umur_ekonomis' => $user->umurekonomis,
                    'keterangan' => $user->keterangan
                ]);
                return back()->with('berhasil', 'Data Berhasil Di Input');
            }
        }
    }

    public function Input(Request $user){
        if($user->session()->get('role') !== 'admin'){
            return back();
        }else{
            return view('admin/KelompokAsetInput');
        }
    }

    public function Index(Request $user){
        $data = KelompokAset::paginate(10);

        if($user->session()->get('role') !== 'admin'){
            return back();
        }else{
            return view('admin/KelompokAset', ['data' => $data]);
        }
    }
}
