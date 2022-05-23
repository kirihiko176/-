<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Login;
use App\Http\Controllers\AccountList;
use App\Http\Controllers\AccountCreate;
use App\Http\Controllers\AccountCreateCheck;
use App\Http\Controllers\AccountCreateComplete;
use App\Http\Controllers\AccountRenewal;
use App\Http\Controllers\AccountRenewalCheck;
use App\Http\Controllers\AccountRenewalComplete;
use App\Http\Controllers\PasswordChange;
use App\Http\Controllers\PasswordChangeCheck;
use App\Http\Controllers\PasswordChangeComplete;

use App\Http\Controllers\dump;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

//ログイントップ
Route::get('/login',[Login::class,'login_first']);

//ログイン
Route::post('/menu',[Login::class,'login']);

//メニュー画面
Route::get('/menu',[Login::class,'menu']);

//アカウント一覧画面
Route::get('/accountlist',[AccountList::class,'accountlist']);

//アカウント作成画面
Route::get('/accountcreate',[AccountCreate::class,'accountcreate']);
//アカウント作成確認画面
Route::post('/accountcreatecheck',[AccountCreateCheck::class,'accountcreatecheck']);
//アカウント作成完了画面
Route::post('/accountcreatecomplete',[AccountCreateComplete::class,'accountcreatecomplete']);

//アカウント更新画面
Route::get('/accountrenewal',[AccountRenewal::class,'accountrenewal']);
Route::post('/accountrenewal',[AccountRenewal::class,'accountrenewal']);
//アカウント更新確認画面
Route::post('/accountrenewalcheck',[AccountRenewalCheck::class,'accountrenewalcheck']);
//アカウント更新完了画面
Route::post('/accountrenewalcomplete',[AccountRenewalComplete::class,'accountrenewalcomplete']);

//ハッシュ確認用
Route::get('/dump',[dump::class,'dump']);
Route::post('/dump_out',[dump::class,'dump_out']);