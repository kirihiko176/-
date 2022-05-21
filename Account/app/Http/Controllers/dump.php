<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class dump extends Controller
{
    public function dump(){
        return view('/var_dump');
    }
    public function dump_out(){
        var_dump(12345678);
        var_dump(Hash::make(12345678));
        return view('/var_dump_out');
    }
}
