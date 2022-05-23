<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Models\account;
use App\Libraries\Validation;
use Carbon\Carbon;
use Session;



class Login extends Controller
{
    //セッションを削除してログイン画面に遷移
    public function login_first(){
        session()->forget('login_session');

        return view('/login');
    }

    //login認証
    public function login(Request $request){

        $data = [
            'account_id'=>$request->account_id,
            'password'=>$request->password
        ];

        $message = Validation::Validation($data);

        try{
            //$messageが空の場合DBに接続
            if(empty($message)){
                
                DB::beginTransaction();
                
                //account_idを検索
                $account = account::where('account_id',$data['account_id'])
                ->first();

                //accountテーブルから値を取得できなかった場合リダイレクト
                if($account == null){
                    $message = __('messages.E9');
                    return redirect('/login')
                    ->with('message',$message);
                }

                //削除フラグが1の場合
                if(intval($account->delete) == 1){
                    $message = __('messages.E10');
                    return redirect('/login')
                    ->with('message',$message);
                }

                //ロックフラグが1の場合
                if(intval($account->lock) == 1){
                    $message = __('messages.E11');
                    return redirect('/login')
                    ->with('message',$message);
                }
        
                //現在時刻を定義
                $date = new Carbon();
                $date->format("Y-m-d H:i:s");                

                //ログイン失敗回数が10回以内の場合
                if(intval($account->failure) < 10){
                    //accountテーブルとpasswordテーブルを結合して最新のものを取得
                    $results = account::join('password','account.account_id','=','password.account_id')
                    ->orderByRaw('CONVERT(password.serial_number,int) desc')
                    ->where('account.account_id',$data['account_id'])
                    ->first();

                    //ハッシュ化して突合
                    if(Hash::check($data['password'],$results->password)){

                        //ログイン失敗回数をリセット
                        $account->failure =0;
                        //ID
                        $account->updated_at = $date;
                        $account->save();
                        DB::commit();

                        //セッション情報を保存
                        session()->put('login_session',['account'=>$results]);
                        $output = session()->get('login_session');
                        
                        //menu画面に遷移
                        return view('/menu',$output);

                    }else{
                        //ハッシュ化したパスワードが一致しない場合
                        $message = __('messages.E12');

                        //ログイン失敗回数を加算
                        $account->increment();
                        //現在時を設定
                        $account->updated_at = $date;
                        $account->save();
                        DB::commit();

                        //リダイレクト
                        return redirect('/login')
                        ->with('message',$message);
                    }
                }else{
                    //ログイン失敗回数が10超の場合
                    $message = __('messages.E13');
                    //ロックフラグを設定
                    $account->lock = 1;
                    //現在時を設定
                    $account->updated_at = $date;
                    $account->save();
                    DB::commit();
                    return redirect('/login')
                    ->with('message',$message);
                }             
            }

            //$messageが存在する場合リダイレクト
            return redirect('/login')
            ->with('message',$message);

        }catch(\Exception $e){
            //レポートを出力
            report($e);
            //ロールバック
            DB::rollBack();
            $message = __('messages.E14');
            return redirect('/login')
            ->with('message',$message);

        }

    }
    //menu画面遷移
    public function menu(){
        //セッション情報を取得
        $output = session()->get('login_session');
        return view('/menu',$output);
    }


}

