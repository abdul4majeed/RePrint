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

use App\Mail\WeclomeMail;
use App\Shop;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;

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

Route::get('form/forget/password', function () {
    return view('resetpassword.forgetpassword');
})->name('forgetpassword');

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

Route::post('/forget/password','RegisterationController@forget_password')->name('forgetPasswordProcess');

Route::get('/reset/password/{token}/{email}', 'RegisterationController@showPasswordResetForm')->name('reset-password-form');
Route::post('/reset/password/{token}/{email}', 'RegisterationController@resetPassword')->name('reset-password');

// Route::get('sendmail',function(){

//     $url_host = env('APP_URL','http:localhost');

//     $url_host = ($url_host.'/verify_account');

//     $data = ['name' => 'Abdul Majeed','email'=>'abdul4majeed@gmail.com','token'=>time().'-'.time(),'url'=>$url_host];
//     Mail::to('reprint0project@gmail.com')->send(new WeclomeMail($data));


//         echo 'Msg Sended';
// });

Route::get('verify_account/{email}/{token}',function($email,$token ){
    $user = User::where('email',$email)->where('token',$token)->first();
    if($user == null)
    {
        return redirect()->route('login')->withErrors(['accountnofound'=>'Sorry Your email can not be verified.']);
    }
    else
    {
        if($user != null  && $user->email_verified_at == null)
        {
            $user->email_verified_at = Carbon::now();
            $user->save();
    
            return redirect()->route('login')->withErrors(['emailsucc'=>'Your account has been activated.Please try to login.']);
    
        }
        else
        {
            return redirect()->route('login')->withErrors(['emailalreadyverify'=>'Your email is already verified.']);
        }
    }

})->name('verify_account');

