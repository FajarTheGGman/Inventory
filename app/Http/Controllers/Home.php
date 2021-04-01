<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

use App\Models\Inventory;
use App\Models\Users;
use App\Models\Opsi;
use App\Models\Pengelola;
use App\Models\KelompokAset;
use App\Models\Ruangan;
use App\Models\SumberDana;

use App\Exports\InventoryExcel;
use App\Imports\InventoryImport;
use Maatwebsite\Excel\Facades\Excel;


class Home extends Controllers{

    public $allData = [];

    public function __construct(){
       $db = Inventory::where('pengelola', 'ydsk')->get();

        foreach($db as $x){
            array_push($this->allData, $x);
        }
    }

    public function DownloadExcel(Request $user){
        if(!$user->session()->get('username')){
            return back();
        }else{
            return Excel::download(new InventoryExcel, 'semuabarang.xlsx');
        }
    }

    public function AmbilFile(Request $user){
        $user->file->move(public_path('/'), $user->file->storeAs('xlsx', 'file.xlsx'));
        Excel::import(new InventoryImport, 'file.xlsx');
        return back();
    }

    public function SemuaBarang(Request $data){
        if($data->cari){
            $db = Inventory::where('nama', 'like', '%'.$data->nama.'%')->where('tempat', $data->tempat)->where('sumber_dana', $data->sumberaset)->paginate(10);
        }else{
            if($data->session()->get('role') !== 'admin'){
                $db = Inventory::where('pengelola', $data->session()->get('role'))->paginate(10);
            }else{
                $db = Inventory::paginate(10);
            }
        }

        $aset = KelompokAset::all();
        $tempat = Ruangan::all();
        $pengelola = Pengelola::all();
        $sumberdana = SumberDana::all();

        if(!$data->session()->get('username')){
            return back();
        }else{
            return view('SemuaBarang', compact('db'), ['total_data' => $db->count(), 'aset' => $aset, 'ruangan' => $tempat, 'pengelola' => $pengelola, 'sumberdana' => $sumberdana, 'role' => $data->session()->get('role')]);
        }
    }

    public function validasi(Request $user){
        $data = Users::where('username', $user->username)->first();

        if($data){
            $hash_verify = Hash::check($user->password, $data->password);

            if($hash_verify){
                $session = Users::where('username', $user->username)->orWhere('password', $data->password)->first();
                
                $user->session()->put(['role' => $session->role, 'username' => $session->username]);

                return redirect('/dashboard');
            }else{
                return back()->with('gagal', 'Username Atau Password Salah');
            }
        }else{
            return back()->with('gagal', 'Username Atau Password Salah');
        }

    }

    public function Login(Request $user){
        $db = Pengelola::all()->count();

        if($db == 0){
            Pengelola::insert([
                'pengelola' => 'pustekom',
                'keterangan' => 'Pustekom Kosgoro'
            ]);

            Pengelola::insert([
                'pengelola' => 'ydsk',
                'keterangan' => 'Yayasan Kosgoro'
            ]);

            Pengelola::insert([
                'pengelola' => 'sma',
                'keterangan' => 'Sma Kosgoro'
            ]);

            Pengelola::insert([
                'pengelola' => 'smp',
                'keterangan' => 'Smp Kosgoro'
            ]);

            Pengelola::insert([
                'pengelola' => 'smk',
                'keterangan' => 'Smk Kosgoro'
            ]);
        }

        $sesi = $user->session()->get('role');
        
        if($sesi){
            return back();
        }else{
            return view('Login');
        }
    }

    public function AllData(Request $user){

        $opsi = Opsi::all();

        if($user->tempat){
            if(!$user->pengelola){
                $pengelola = $user->session()->get('role');
            }else{
                $pengelola = $user->pengelola;
            }

            $db = Inventory::where('tempat', $user->tempat)->where('kategori', $user->kategori)->where('pengelola', $pengelola)->get();
        }else{
            if($user->session()->get('role') == 'admin'){
                $db = Inventory::all();
            }else{
                $db = Inventory::where('pengelola', $user->session()->get('role'))->get();
            }
        }

        if(!$user->session()->get('username')){
            return back();
        }else{
            return view('AllData', ['data' => $db, 'opsi' => $opsi, 'role' => $user->session()->get('role')]);
        }

    }

    public function Logout(Request $user){
        $user->session()->flush();
        return redirect('/');
    }

    public function RegisterData(Request $input){
        $data = Users::where('username', $input->username)->first();

        if($data){
            return back()->with('gagal', 'Username atau password sudah terdaftar');
        }else{
            echo $data;
            $db = new Users;
            $hash = Hash::make($input->password);
            $db->username = $input->username;
            $db->password = $hash;
            $db->email = $input->email;
            $db->role = $input->role;
            $db->save();
            return back()->with('berhasil', 'Akun Berhasil Dibuat Silahkan Login');
        }
    }

    public function Register(){
        $data = Pengelola::all();
        return view('Register', ['data' => $data]);
    }

    public function Home(Request $user){
        $sesi = $user->session()->get('role');
        $barang = Inventory::all()->count();
        $pengelola = Users::all()->count();
        $tempat = Ruangan::all()->count();
        $kategori = KelompokAset::all()->count();

        $total_dana_ydsk = Inventory::where('pengelola', 'ydsk')->sum('harga');
        $total_dana_sma = Inventory::where('pengelola', 'sma')->sum('harga');
        $total_dana_smp = Inventory::where('pengelola', 'smp')->sum('harga');
        $total_dana_smk = Inventory::where('pengelola', 'smk')->sum('harga');
        $total_dana_pustekom = Inventory::where('pengelola', 'pustekom')->sum('harga');

        $role_ydsk = Users::where('role', 'ydsk')->count();
        $role_pustekom = Users::where('role', 'pustekom')->count();
        $role_sma = Users::where('role', 'sma')->count();
        $role_smp = Users::where('role', 'smp')->count();
        $role_smk = Users::where('role', 'smk')->count();

        if(!$sesi){
            return back();
        }else{
            return view('Dashboard', [ 
                'total_barang' => $barang, 
                'pengelola' => $pengelola, 
                'tempat' => $tempat, 
                'kategori' => $kategori,
                'ydsk' => $total_dana_ydsk,
                'sma' => $total_dana_sma,
                'smp' => $total_dana_smp,
                'smk' => $total_dana_smk,
                'pustekom' => $total_dana_pustekom,
                'role_ydsk' => $role_ydsk,
                'role_pustekom' => $role_pustekom,
                'role_sma' => $role_sma,
                'role_smp' => $role_smp,
                'role_smk' => $role_smk
            ]);
        }
    }
}


?>
