<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inventory;
use App\Models\Ruangan;
use App\Models\KelompokAset;
use App\Models\SumberDana;

class EditController extends Controller
{

    public function send(Request $user, $id){
        Inventory::where('id', $id)->where('pengelola', $user->session()->get('role'))->update([
            'nama' => $user->nama,
            'tahun_pembelian' => $user->tahunbeli,
            'jenis' => $user->jenis,
            'merk' => $user->merk,
            'jumlah' => $user->jumlah,
            'harga' => $user->harga,
            'tempat' => $user->tempat,
            'kelompok_aset' => $user->kelompok_aset,
            'kondisi' => $user->kondisi,
            'sumber_dana' => $user->sumberdana,
            'keterangan' => $user->keterangan
        ]);
        return back()->with('berhasil', 'Barang berhasil di edit');
    }

    public function Edit(Request $user, $id){
        $tempat = Ruangan::all();
        $aset = KelompokAset::all();
        $dana = SumberDana::all();

        $db = Inventory::where('id', $id)->first();

        if(!$user->session()->get('username')){
            return back();
        }else{
            return view('Edit', [
                'tempat' => $tempat, 
                'aset' => $aset, 
                'dana' => $dana,
                'nama' => $db->nama,
                'tahun_pembelian' => $db->tahun_pembelian,
                'jenis' => $db->jenis,
                'merk' => $db->merk,
                'jumlah' => $db->jumlah,
                'harga' => $db->harga,
                'id' => $id
                ]);
        }
    }
}
