<?php

namespace App\Libraries;

class Validation
{
    //セッションを削除してログイン画面に遷移
    public static function Validation($data){
        $message = "";

        //ID空の場合
        if(empty($data['account_id'])){
            $message = __('messages.E1');
            return $message;
        }

        //ID長さ4未満の場合
        if(mb_strlen($data['account_id']) < 4){
            $message = __('messages.E2');
            return $message;
        }
        
        //ID長さ10超の場合
        if(mb_strlen($data['account_id']) > 10){
            $message = __('messages.E3');
            return $message;
        }

        //ID書式チェック
        if(!preg_match("/^[a-zA-Z0-9-\/:-@\[-`\{-\~\.]+$/",$data['account_id'])){
            $message = __('messages.E4');
            return $message;
        }

        //password空の場合
        if(empty($data['password'])){
            $message = __('messages.E5');
            return $message;
        }

        //password長さ8未満の場合
        if(mb_strlen($data['password']) < 8){
            $message = __('messages.E6');
            return $message;
        }
        
        //ID長さ20超の場合
        if(mb_strlen($data['password']) > 20){
            $message = __('messages.E7');
            return $message;
        }

        //ID書式チェック
        if(!preg_match("/^[a-zA-Z0-9-\/:-@\[-`\{-\~\.]+$/",$data['password'])){
            $message = __('messages.E8');
            return $message;
        }
    }
}

