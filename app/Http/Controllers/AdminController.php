<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

// Models
use App\Models\Users;
use App\Models\SumberDana;
use App\Models\Ruangan;

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
        $check = Users::where('username', $user->username)->count();

        if($check == 1){
            Users::where('username', $user->username)->delete();
            return back()->with('berhasil', 'berhasil');
        }else{
            return back()->with('gagal', 'gagal');
        }
    }

    public function User(Request $user){
        if($user->session()->get('role') !== 'admin'){
            return back();
        }else{
            $data = Users::paginate(10);
            return view('admin/DaftarUser', ['data' => $data]);
        }
    }

    public function DeleteUser(Request $user){
        if($user->session()->get('role') == 'admin'){
            return view('admin/DeleteUser');
        }else{
            return redirect('/dashboard');
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
