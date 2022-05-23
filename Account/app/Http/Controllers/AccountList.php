<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\account;

class AccountList extends Controller
{
    public function accountlist(Request $request){

        $output = session()->get('login_session');
        session()->forget('account_id_session');
    
        $data = [
            'account_id'=>$request->account_id,
            'lock'=>$request->lock,
            'delete'=>$request->delete,
            'admin'=>$request->admin,
        ];
        
        //検索
        $results = account::where('account_id','LIKE','%'.$data['account_id'].'%')
        ->where('lock','LIKE','%'.$data['lock'].'%')
        ->where('delete','LIKE','%'.$data['delete'].'%')
        ->where('admin','LIKE','%'.$data['admin'].'%')
        ->orderBy('account_id',"asc")
        ->paginate(10);

        
        return view('/accountlist',['accountlist'=>$results],$output,$data)
        ->with('results',$results);
    }


}
