<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inventory;
use App\Models\Opsi;

class InputController extends Controller
{
    
    public function Send(Request $input){
        $x = new Inventory;
        $x->pengelola = $input->session()->get('role');
        $x->tempat = $input->tempat;
        $x->kategori = $input->kategori;
        $x->barang = $input->nama;
        $x->jumlah = $input->jumlah;
        $x->baik = $input->baik;
        $x->rusak = $input->rusak;
        $x->waktu_di_tambahkan = Date('d').'-'.Date('m').'-'.Date('y');
        $x->save();
        return back()->with('berhasil', "Barang berhasil di inputkan");
    }

    public function Input(Request $user){
        $opsi = Opsi::all();

        $role = $user->session()->get('role');

        if(!$user->session()->get('username')){
            return back();
        }else{
            return view('Input', ['opsi' => $opsi, 'role' => $role]);
        }
    }
}
