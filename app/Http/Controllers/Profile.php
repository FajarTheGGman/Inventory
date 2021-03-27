<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;
use Illuminate\Support\Facades\Hash;

class Profile extends Controller
{

    public function UsernameData(Request $user){
        if($user->username == $user->session()->get('username')){
            return "<script>alert('Username tidak boleh sama !')</script>";
        }else{
            Users::where('username', $user->session()->get('username'))->update([
                'username' => $user->username
            ]);
            return back()->with('berhasil', 'Ganti Username Berhasil, Silahkan Login Kembali');
        }
    }

    public function PasswordData(Request $user){
        if($user->oldpassword == $user->newpassword){
            return "<script>alert('Password tidak boleh sama !')</script>";
        }else{
            $hash = Hash::make($user->newpassword);
            Users::where('username', $user->session()->get('username'))->orWhere('password', $user->oldpassword)->update([
                'password' => $hash
            ]);
            return back()->with('berhasil', 'Ganti Password Berhasil');
        }
    }

    public function RoleData(Request $user){
        Users::where('username', $user->session()->get('username'))->update([
            'role' => $user->role
        ]);
        $user->session()->flush();
        return redirect('/');
    }

    public function Username(Request $user){
        if(!$user->session()->get('username')){
            return back();
        }else{
            return view('profile/ChangeUsername');
        }
    }

    public function Role(Request $user){
        if(!$user->session()->get('username')){
            return back();
        }else{
            return view('profile/ChangeRole');
        }
    }

    public function Password(Request $user){
        if(!$user->session()->get('username')){
            return back();
        }else{
            return view('profile/ChangePassword');
        }
    }

    public function Profile(Request $user){
        $role = $user->session()->get('role');
        $username = $user->session()->get('username');

        if(!$username){
            return back();
        }else{
            return view('Profile', ['role' => $role, 'username' => $username]);
        }
    }
}
