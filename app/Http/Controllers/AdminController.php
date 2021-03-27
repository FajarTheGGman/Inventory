<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Users;
use App\Models\Opsi;

class AdminController extends Controller
{
    public $username;
    public $password;

    public function Edit(Request $input){
        if($input->username == ''){
            $db = Users::where('username', $input->username)->first();
            $this->username = $db[0]->username;
        }

        if($input->password == ''){
            $db = Users::where('username', $input->username)->first();
            $this->password = $db[0]->password;
        }

        $pw = Hash::make($input->password);

        Users::where('username', $input->username)->update([ 'username' => $input->newusername, 'password' => $pw, 'role' => $input->role ]);
        return back()->with('berhasil', 'Berhasil Edit User');
    }

    public function Delete(Request $user){
        Users::where('username', $user->username)->delete();

        return back();
    }

    public function DeleteUser(Request $user){
        if($user->session()->get('role') == 'admin'){
            return view('admin/DeleteUser');
        }else{
            return redirect('/dashboard');
        }
    }

    public function MasterDataDelete($id){
        $db = Opsi::where('id', $id)->delete();
        return back();
    }

    public function MasterDataInput(Request $user){
        if($user->session()->get('role') !== 'admin'){
            return back();
        }else{
            return view('admin/MasterDataInput');
        }
    }

    public function MasterDataInputData(Request $user){
        if($user->session()->get('role') !== 'admin'){
            return back();
        }else{
            Opsi::insert([
                'tempat' => $user->tempat,
                'kategori' => $user->kategori
            ]);

            return back()->with('berhasil', 'Berhasil Memasukkan Data');
        }
    }

    public function MasterData(Request $user){
        $data = Opsi::paginate(10);
        if($user->session()->get('role') !== 'admin'){
            return back();
        }else{
            return view('admin/MasterData', compact('data'));
        }

    }

    public function EditUser(Request $user){
        if($user->session()->get('role') == 'admin'){
            return view('admin/EditUser');
        }else{
            return redirect('/dashboard');
        }
    }
}
