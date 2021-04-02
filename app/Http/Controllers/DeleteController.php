<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inventory;

class DeleteController extends Controller
{
    public function send(Request $user){
        $data = Inventory::where('tempat', $user->lab)->orWhere('pengelola', $user->session()->get('role'))->orWhere('barang', $user->nama)->orWhere('kategori', $user->kategori)->delete();
        return back()->with('berhasil', 'Barang berhasil di hapus');
    }

    public function DeleteId(Request $user, $id){
      $db = Inventory::where('id', $id)->delete();
      return back();
    }

}
