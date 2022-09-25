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

Route::resource('customers',  App\Http\Controllers\CustomerController::class);

//resourseにはpostcodeアクションは含まれてないので下記を追加しなければならない。route:listのときの->nameをしてしてあげる。
Route::get ('/customers/postcode', [App\Http\Controllers\CustomerController::class, 'postcode'])->name('customers.postcode');
