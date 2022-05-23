<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\account;
use App\Libraries\Validation;

class AccountRenewalCheck extends Controller
{
    public function accountrenewalcheck(Request $request){
    
        $output = session()->get('login_session');
        $account_id_session = session()->get('account_id_session');
    
        $data = [
            'account_id'=>$request->account_id,
            'admin'=>$request->admin,
            'lock'=>$request->lock,
            'delete'=>$request->delete,
        ];
        return view('/accountrenewalcheck',$data,$output);
    }    
}
