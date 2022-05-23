<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\account;


class AccountRenewal extends Controller
{
    public function accountrenewal(Request $request){
        $output = session()->get('login_session');

        if(empty($account_id_session = session()->get('account_id_session'))){
            $data = [
                'account_id'=>$request->account_id,
            ];
            if(empty($data['account_id'])){
                $message = __('messages.E16');
                return redirect('/accountlist')
                ->with('message',$message);
            }
            session()->put('account_id_session',$data['account_id']);
            $account_id_session = session()->get('account_id_session');
        }

        $results = account::where('account_id',$account_id_session)
        ->first();

        return view('/accountrenewal',['results'=>$results],$output);

    }

}
