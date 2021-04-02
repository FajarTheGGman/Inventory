<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inventory;
use App\Models\Ruangan;
use App\Models\KelompokAset;
use App\Models\SumberDana;

class InputController extends Controller
{
    
    public function Send(Request $input){
        $kode = $input->session()->get('role').'-'.$input->tempat.'/'.$input->sumberdana.'/'.$input->tahunbeli;

        echo $input->kelompokaset;


        Inventory::insert([
            'pengelola' => $input->session()->get('role'),
            'tempat' => $input->tempat,
            'kelompok_aset' => $input->kelompokaset,
            'jenis' => $input->jenis,
            'nama' => $input->nama,
            'jumlah' => $input->jumlah,
            'kondisi' => $input->kondisi,
            'kode' => $kode,
            'merk' => $input->merk,
            'harga' => $input->harga,
            'tahun_pembelian' => $input->tahunbeli,
            'sumber_dana' => $input->sumberdana,
            'keterangan' => $input->keterangan,
            'waktu_di_tambahkan' => Date('d').'-'.Date('m').'-'.Date('y')
        ]);
        return back()->with('berhasil', "Barang berhasil di inputkan");
    }

    public function Input(Request $user){
        $tempat = Ruangan::all();
        $aset = KelompokAset::all();
        $dana = SumberDana::all();

        $role = $user->session()->get('role');

        if(!$user->session()->get('username')){
            return back();
        }else{
            return view('Input', ['tempat' => $tempat, 'role' => $role, 'aset' => $aset, 'dana' => $dana ]);
        }
    }
}
