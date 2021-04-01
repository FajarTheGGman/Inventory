<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Inventory;
use App\Models\Users;
use App\Models\Pengelola;

class Api extends Controller
{
    public $pengelola = [];

    public function Total_Dana($id){
        $data = Inventory::where('pengelola', $id)->sum('harga');

        return $data;
    }

    public function Data_Pengelola(){
        $pengelola = Pengelola::all('pengelola');

        return $pengelola;
    }

    public function Total_Pengelola(){
        $pengelola = Users::where('role', 'admin')->count();
        
        return $pengelola;
    }
}
