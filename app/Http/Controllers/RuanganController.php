<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ruangan;

class RuanganController extends Controller
{

    public function Delete(Request $user, $id){
        if($user->session()->get('role') !== 'admin'){
            return back();
        }else{
            Ruangan::where('id', $id)->delete();

            return back();
        }
    }

    public function Kirim(Request $data){
        if($data->session()->get('role') !== 'admin'){
            return back();
        }else{
            $check = Ruangan::where('nama', $data->nama)->where('kode', $data->kode)->count();

            if($check == 1){
                return back()->with('gagal', 'gagal');
            }else{
                Ruangan::insert([
                    'nama' => $data->nama,
                    'kode' => $data->kode,
                    'keterangan' => $data->keterangan
                ]);
               return back()->with('berhasil', 'Data Berhasil Tambahkan');
            }
        }
    }

    public function Input(Request $user){
        if($user->session()->get('role') !== 'admin'){
            return back();
        }else{
            return view('admin/RuanganInput');
        }
    }

    public function Index(Request $user){
        $data = Ruangan::paginate(10);
        if($user->session()->get('role') !== 'admin'){
            return back();
        }else{
            return view('admin/Ruangan', ['data' => $data]);
        }
    }
}
