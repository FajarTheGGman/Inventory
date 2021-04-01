<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\SumberDana;

class SumberAset extends Controller
{
    public function SumberDanaDelete($id){
        $db = SumberDana::where('id', $id)->delete();
        return back();
    }

    public function SumberDanaInput(Request $user){
        if($user->session()->get('role') !== 'admin'){
            return back();
        }else{
            return view('admin/SumberDanaInput');
        }
    }

    public function SumberDanaInputData(Request $user){
        if($user->session()->get('role') !== 'admin'){
            return back();
        }else{
            SumberDana::insert([
                'nama' => $user->nama,
                'keterangan' => $user->keterangan
            ]);

            return back()->with('berhasil', 'Berhasil Memasukkan Data');
        }
    }

    public function Index(Request $user){
        $data = SumberDana::paginate(10);
        if($user->session()->get('role') !== 'admin'){
            return back();
        }else{
            return view('admin/SumberDana', compact('data'));
        }

    }
}
