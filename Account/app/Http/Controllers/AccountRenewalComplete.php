<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\account;
use App\Models\password;
use Carbon\Carbon;

class AccountRenewalComplete extends Controller
{
    public function accountrenewalcomplete(Request $request){
        
        if($request->has('fix')){
            return redirect('/accountrenewal')
            ->withInput();
        }
        
        $output = session()->get('login_session');

        $data = [
            'account_id'=>$request->account_id,
            'admin'=>$request->admin,
            'lock'=>$request->lock,
            'delete'=>$request->delete,
        ];

        $account = new account;
        
        $date = new Carbon();
        $date->format("Y-m-d H:i:s");  
        
        try{
            DB::beginTransaction();
            
            $account = account::find($data["account_id"]);
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

            if($data["delete"]==1){
                $account->delete = $data["delete"];
            }else{
                $account->delete = 0;
            }

            if($data["lock"]==1){
                $account->lock = $data["lock"];
            }else{
                $account->lock = 0;
            }
            $account->save();

            DB::commit();

            return view('/accountrenewalcomplete',$data,$output);

        }catch(\Exception $e){
            //レポートを出力
            report($e);
            //ロールバック
            DB::rollBack();
            $message = __('messages.E14');
            return redirect('/accountrenewal')
            ->with('message',$message);

        }
    }
}
