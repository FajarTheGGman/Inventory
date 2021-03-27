<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inventory;
use App\Models\Opsi;

class EditController extends Controller
{

    public function send(Request $user){
        Inventory::where('pengelola', $user->session()->get('role'))->orWhere('tempat', $user->tempat)->orWhere('kategori', $user->kategori)->orWhere('barang', $user->name)->update([ 'barang' => $user->newname, 'jumlah' => $user->jumlah, 'baik' => $user->baik, 'rusak' => $user->rusak, 'kategori' => $user->kategori ]);
        return back()->with('berhasil', 'Barang berhasil di edit');
    }

    public function Edit(Request $user){
        $opsi = Opsi::all();

        if(!$user->session()->get('username')){
            return back();
        }else{
            return view('Edit', ['opsi' => $opsi]);
        }
    }
}
