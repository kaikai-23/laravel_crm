<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

//resourseにはpostcodeアクションは含まれてないので下記を追加しなければならない。route:listのときの->nameをしてしてあげる。
//また順番showがパラメータを受けているため、Route::resourceよりも上にかかないといけない
Route::get ('/customers/postcode', [App\Http\Controllers\CustomerController::class, 'postcode'])->name('customers.postcode');

Route::resource('customers',  App\Http\Controllers\CustomerController::class);


