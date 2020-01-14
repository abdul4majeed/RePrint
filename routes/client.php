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

use App\ClientSurvey;
use App\Order;
use Illuminate\Http\Request;
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

     Route::post('/servey', function (Request $req) {
        session()->put('survey_shop_id',$req->shop_id);
        session()->put('survey_order_id',$req->order_id);

        return view('client.survey');
    })->name('client_survey');

    Route::post('/servey/process', function (Request $req) {
        
        ClientSurvey::create([
            'shop_id' => session()->get('survey_shop_id'),
            'order_id' => session()->get('survey_order_id') ,
            'user_id' => Auth::user()->id ,
            'rating' => $req->rating,
            'feeback' => $req->feedback,
        ]);

        $order = Order::find(session()->get('survey_order_id'));
        $order->feed_back = 1;
        $order->update();
        
        return redirect()->route('client_order');
        // return view('client.survey');
    })->name('client_process_survey');
    
});
