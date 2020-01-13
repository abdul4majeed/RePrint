<?php

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

use App\Order;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
Route::group(['prefix'=>'client'],function(){
    Route::get('/dashboard', function () {
        return view('client.index');
    })->name('client_dashboard');

    Route::get('/create/order', function () {
        return view('client.createorder');
    })->name('client_new_order');

    Route::get('/list/order', function () {
       $order = Order::with('shop','service','sub_service','payment_type_relation','user','payment_status_relation','order_status_relation')->where('user_id',Auth::user()->id)->get();
        return view('client.orders')->with('orders',$order);
    })->name('client_order');
    
});
