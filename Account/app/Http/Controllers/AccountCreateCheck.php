<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\account;
use App\Libraries\Validation;

class AccountCreateCheck extends Controller
{
    public function accountcreatecheck(Request $request){

    $output = session()->get('login_session');

    $data = [
        'account_id'=>$request->account_id,
        'password'=>$request->password,
        'admin'=>$request->admin,
    ];

    //バリデーションチェック
    $message = Validation::Validation($data);

    //メッセージがあればリダイレクト
    if($message != ""){
        return redirect('/accountcreate')
        ->with('message',$message)
        ->withInput();
    }

    $account = account::where('account_id','=',$data['account_id'])->count();

    if($account > 0){
    $message = __('messages.E15');
    return redirect('/accountcreate')
    ->with('message',$message)
    ->withInput();
    }

    return view('/accountcreatecheck',$data,$output);

    }
}
