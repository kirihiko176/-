<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Login;
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

//menu画面
Route::get('/menu',[Login::class,'menu']);

//ハッシュ確認用
Route::get('/dump',[dump::class,'dump']);
Route::post('/dump_out',[dump::class,'dump_out']);