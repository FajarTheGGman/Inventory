<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Inventory;
use App\Models\Users;
use App\Models\Opsi;

class Home extends Controllers{

    public $allData = [];

    public function __construct(){
       $db = Inventory::where('pengelola', 'ydsk')->get();

        foreach($db as $x){
            array_push($this->allData, $x);
        }
    }

    public function SemuaBarang(Request $data){
        if($data->cari){
            $db = Inventory::where('barang', 'like', '%'.$data->barang.'%')->where('kategori', $data->kategori)->where('tempat', $data->tempat)->where('pengelola', $data->pengelola)->paginate(10);
        }else{
            $db = Inventory::where('barang', 'like', '%'.$data->barang.'%')->paginate(10);
        }

        $opsi = Opsi::all();

        if(!$data->session()->get('username')){
            return back();
        }else{
            return view('SemuaBarang', compact('db'), ['total_data' => $db->count(), 'opsi' => $opsi]);
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
        $sesi = $user->session()->get('role');
        
        if($sesi){
            return back();
        }else{
            return view('Login');
        }
    }

    public function AllData(Request $user){

        //        $db = Inventory::all();
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
        $db = new Users;
        $hash = Hash::make($input->password);
        $db->username = $input->username;
        $db->password = $hash;
        $db->role = $input->role;
        $db->save();
        return back()->with('berhasil', 'Akun Berhasil Dibuat Silahkan Login');
    }

    public function Register(){
        return view('Register');
    }

    public function Home(Request $user){
        $sesi = $user->session()->get('role');
        $barang = Inventory::all()->count();
        $pengelola = Users::all()->count();
        $tempat = Opsi::all('tempat')->count();
        $kategori = Opsi::all('kategori')->count();

        if(!$sesi){
            return back();
        }else{
            return view('Dashboard', [ 'total_barang' => $barang, 'pengelola' => $pengelola, 'tempat' => $tempat, 'kategori' => $kategori ]);
        }
    }
}


?>
