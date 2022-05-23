<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Models\account;
use App\Models\password;
use Carbon\Carbon;

class AccountCreateComplete extends Controller
{
    public function accountcreatecomplete(Request $request){
        
        if($request->has('fix')){
            return redirect('/accountcreate')
            ->withInput();
        }
        
        $output = session()->get('login_session');

        $data = [
            'account_id'=>$request->account_id,
            'password'=>$request->password,
            'admin'=>$request->admin,
        ];

        $account = new account;
        $password = new password;
        
        $date = new Carbon();
        $date->format("Y-m-d H:i:s");  

        $hash_pass=password_hash($data["password"],PASSWORD_DEFAULT);
        
        try{
            DB::beginTransaction();
            
            $account->account_id = $data["account_id"];
            $account->delete = 0;
            $account->lock = 0;
            $account->failure = 0;
            $account->created_at = $date;
            $account->updated_at = $date;
            if($data["admin"]==1){
                $account->admin = $data["admin"];
            }else{
                $account->admin = 0;
            }
            $account->save();

            $password->account_id = $data["account_id"];
            $password->serial_number = 1;
            $password->password = $hash_pass;
            $password->created_at = $date;
            $password->updated_at = $date;
            $password->save();
            DB::commit();

            return view('/accountcreatecomplete',$data,$output);

        }catch(\Exception $e){
            //レポートを出力
            report($e);
            //ロールバック
            DB::rollBack();
            $message = __('messages.E14');
            return redirect('/accountcreate')
            ->with('message',$message);

        }
    }
}
