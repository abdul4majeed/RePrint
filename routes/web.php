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

use App\Shop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
})->name('home');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/blog', function () {
    return view('blog');
})->name('blog');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::get('/journal', function () {
    return view('journal');
})->name('journal');

Route::get('/form/login', function () {
    return view('login');
})->name('login');

Route::get('/form/register', function () {
    return view('register');
})->name('register');

Route::get('/single', function () {
    return view('single');
})->name('single');


Route::get('/work/single', function () {
    return view('work-single');
})->name('work-single');

Route::get('/work', function () {
    return view('work');
})->name('work');


Route::get('/document', function () {
    return view('common.document');
})->name('document');

Route::resource('shops','ShopController');


Route::post('order',function(Request $req){
    dd($req->all());
})->name('order');


Route::post('shop/services',function(Request $req){
    $shop = Shop::find($req->shop_id);
    $data = [];

    foreach ($shop->services as $service) {
        $main_service = $service;
        // $shop_services = [
            $main_service_data = [
                'id' => $main_service->id,
                'name' => $main_service->service_name,
                'price' => $main_service->service_price,
                'sub_services' => [],
            // ], 
            ];

        foreach($main_service->sub_services as $sub_service)
        {
           $shop_sub_services = [
                'id' => $sub_service->id,
                'name' => $sub_service->sub_service_name,
                'price' => $sub_service->sub_service_price,
             ];
             array_push($main_service_data['sub_services'],$shop_sub_services);

        }
        array_push($data,$main_service_data);
       
    }
    return view('shop_services')->with('services',$data);

})->name('get_shop_services');




Route::post('/upload/document', "OrderDocumentController@upload_document")->name('uploadFile');

Route::post('/register',"RegisterationController@user_registeration")->name('registerProcess');


Route::post('/login',"RegisterationController@user_login")->name('loginProcess');

Route::get('/logout',"RegisterationController@user_logout")->name('logoutProcess');

