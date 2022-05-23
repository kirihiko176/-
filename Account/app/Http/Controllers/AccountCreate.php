<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AccountCreate extends Controller
{
    public function accountcreate(Request $request){

    //セッションの取得
    $output = session()->get('login_session');
    return view('/accountcreate',$output);
    }

}
