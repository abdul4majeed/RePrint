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
    if($req->payment == "myfatorah")
    {
        return redirect()->route('fatroorah-payment');
    }
    elseif($req->payment == "tap")
    {
        return redirect()->route('tap-payment');
    }
    elseif($req->payment == "cash_on_delivery")
    {
        return "cash on delivery save record in db and continue";
    }
    // dd($req->all());
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


Route::get('tap-payment',function(){
    return view('payment');
})->name('tap-payment');

Route::post('charge',function(Request $req){

    $ammount = 1;
    $token = $req->tapToken;
    $currency = "KWD";
    $threeDSecure = "true";
    $save_card = "false";
    $description = "Test Description";
    $statement_descriptor = "Sample";
    $metadata_one ="test 1";
    $metadata_two ="test 2";
    $reference_transaction = "txn_0001";
    $reference_order = "ord_0001";
    $receipt_email  = "false";
    $receipt_sms  = "true";
    $customer_first_name = "first name";
    $customer_middle_name = "middle name";
    $customer_last_name = "last name";
    $customer_email = "test@test.com";
    $customer_phone_code = "965";
    $customer_phone_number = "50000000";
    $post_url = route('post_url');
    $redirect_url = "http://127.0.0.1:8000/redirect_url";
    $json = "{\"amount\":$ammount,\"currency\":\"$currency\",\"threeDSecure\":$threeDSecure,\"save_card\":$save_card,\"description\":\"$description\",\"statement_descriptor\":\"$statement_descriptor\",\"metadata\":{\"udf1\":\"$metadata_one\",\"udf2\":\"$metadata_two\"},\"reference\":{\"transaction\":\"$reference_transaction\",\"order\":\"$reference_order\"},\"receipt\":{\"email\":$receipt_email,\"sms\":$receipt_sms},\"customer\":{\"first_name\":\"$customer_first_name\",\"middle_name\":\"$customer_middle_name\",\"last_name\":\"$customer_last_name\",\"email\":\"$customer_email\",\"phone\":{\"country_code\":\"$customer_phone_code\",\"number\":\"$customer_phone_number\"}},\"source\":{\"id\":\"$token\"},\"post\":{\"url\":\"$post_url\"},\"redirect\":{\"url\":\"$redirect_url\"}}";
    $curl = curl_init();
    // dd($json);

    curl_setopt_array($curl, array(
      CURLOPT_URL => "https://api.tap.company/v2/charges",
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 30,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "POST",
      CURLOPT_POSTFIELDS => $json,
      CURLOPT_HTTPHEADER => array(
        "authorization: Bearer sk_test_XKokBfNWv6FIYuTMg5sLPjhJ",
        "content-type: application/json"
      ),
    ));
    
    $response = curl_exec($curl);
    $err = curl_error($curl);
    
    curl_close($curl);
    
    if ($err) {
      echo "cURL Error #:" . $err;
    } else {
        $decoded = json_decode($response);
        if($decoded->status == "INITIATED")
        {
            return redirect()->to($decoded->transaction->url);
        }
    }
})->name('charge');

Route::post('post_url',function(Request $req){
    dd($req->all());
})->name('post_url');


Route::get('/redirect_url',function(Request $req){
    $id = $req->tap_id;
    $curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.tap.company/v2/charges/$id",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_POSTFIELDS => "{}",
  CURLOPT_HTTPHEADER => array(
    "authorization: Bearer sk_test_XKokBfNWv6FIYuTMg5sLPjhJ"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  dd($response);
}
})->name('redirect_url');


// MyFatrooh

Route::get('myfatroohah',function(){
    ####### Initiate Payment ######
$token = "7Fs7eBv21F5xAocdPvvJ-sCqEyNHq4cygJrQUFvFiWEexBUPs4AkeLQxH4pzsUrY3Rays7GVA6SojFCz2DMLXSJVqk8NG-plK-cZJetwWjgwLPub_9tQQohWLgJ0q2invJ5C5Imt2ket_-JAlBYLLcnqp_WmOfZkBEWuURsBVirpNQecvpedgeCx4VaFae4qWDI_uKRV1829KCBEH84u6LYUxh8W_BYqkzXJYt99OlHTXHegd91PLT-tawBwuIly46nwbAs5Nt7HFOozxkyPp8BW9URlQW1fE4R_40BXzEuVkzK3WAOdpR92IkV94K_rDZCPltGSvWXtqJbnCpUB6iUIn1V-Ki15FAwh_nsfSmt_NQZ3rQuvyQ9B3yLCQ1ZO_MGSYDYVO26dyXbElspKxQwuNRot9hi3FIbXylV3iN40-nCPH4YQzKjo5p_fuaKhvRh7H8oFjRXtPtLQQUIDxk-jMbOp7gXIsdz02DrCfQIihT4evZuWA6YShl6g8fnAqCy8qRBf_eLDnA9w-nBh4Bq53b1kdhnExz0CMyUjQ43UO3uhMkBomJTXbmfAAHP8dZZao6W8a34OktNQmPTbOHXrtxf6DS-oKOu3l79uX_ihbL8ELT40VjIW3MJeZ_-auCPOjpE3Ax4dzUkSDLCljitmzMagH2X8jN8-AYLl46KcfkBV"; #token value to be placed here;
$basURL = "https://apitest.myfatoorah.com";
$curl = curl_init();
curl_setopt_array($curl, array(
  CURLOPT_URL => "$basURL/v2/InitiatePayment",
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => "{\"InvoiceAmount\": 1,\"CurrencyIso\": \"KWD\"}",
  CURLOPT_HTTPHEADER => array("Authorization: Bearer $token","Content-Type: application/json"),
));
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$response = curl_exec($curl);
$err = curl_error($curl);
curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
    $decodeResponse = json_decode($response);
    if($decodeResponse->IsSuccess)
    {
        return view('fatrah')->with('cards',$decodeResponse->Data->PaymentMethods);
    }
}
})->name('fatroorah-payment');

Route::post('exe_fatroah',function(Request $req){

    
    $paymentId = $req->card_id;
    $callBackUrl = "http://www.example.com";// route('fatrooh_redirect');
    $errorUrl = "http://www.test.com" ; //route('fatrooh_error');
    ####### Execute Payment ######
    $token = "7Fs7eBv21F5xAocdPvvJ-sCqEyNHq4cygJrQUFvFiWEexBUPs4AkeLQxH4pzsUrY3Rays7GVA6SojFCz2DMLXSJVqk8NG-plK-cZJetwWjgwLPub_9tQQohWLgJ0q2invJ5C5Imt2ket_-JAlBYLLcnqp_WmOfZkBEWuURsBVirpNQecvpedgeCx4VaFae4qWDI_uKRV1829KCBEH84u6LYUxh8W_BYqkzXJYt99OlHTXHegd91PLT-tawBwuIly46nwbAs5Nt7HFOozxkyPp8BW9URlQW1fE4R_40BXzEuVkzK3WAOdpR92IkV94K_rDZCPltGSvWXtqJbnCpUB6iUIn1V-Ki15FAwh_nsfSmt_NQZ3rQuvyQ9B3yLCQ1ZO_MGSYDYVO26dyXbElspKxQwuNRot9hi3FIbXylV3iN40-nCPH4YQzKjo5p_fuaKhvRh7H8oFjRXtPtLQQUIDxk-jMbOp7gXIsdz02DrCfQIihT4evZuWA6YShl6g8fnAqCy8qRBf_eLDnA9w-nBh4Bq53b1kdhnExz0CMyUjQ43UO3uhMkBomJTXbmfAAHP8dZZao6W8a34OktNQmPTbOHXrtxf6DS-oKOu3l79uX_ihbL8ELT40VjIW3MJeZ_-auCPOjpE3Ax4dzUkSDLCljitmzMagH2X8jN8-AYLl46KcfkBV"; #token value to be placed here;

    $basURL = "https://apitest.myfatoorah.com";

    $object =  "{\"PaymentMethodId\":\"$paymentId\",\"CustomerName\": \"Ahmed\",\"DisplayCurrencyIso\": \"KWD\", \"MobileCountryCode\":\"+965\",\"CustomerMobile\": \"92249038\",\"CustomerEmail\": \"aramadan@myfatoorah.com\",\"InvoiceValue\": 2,\"CallBackUrl\": \"$callBackUrl\",\"ErrorUrl\": \"$errorUrl\",\"Language\": \"en\",\"CustomerReference\" :\"ref 1\",\"CustomerCivilId\":12345678,\"UserDefinedField\": \"Custom field\",\"ExpireDate\": \"\",\"CustomerAddress\" :{\"Block\":\"\",\"Street\":\"\",\"HouseBuildingNo\":\"\",\"Address\":\"\",\"AddressInstructions\":\"\"},\"InvoiceItems\": [{\"ItemName\": \"Product 01\",\"Quantity\": 1,\"UnitPrice\": 2}]}";
  
$curl = curl_init();
curl_setopt_array($curl, array(
  CURLOPT_URL => "$basURL/v2/ExecutePayment",
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => $object,
  CURLOPT_HTTPHEADER => array("Authorization: Bearer $token","Content-Type: application/json"),
));
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
    $decodeResponse = json_decode($response);
    if($decodeResponse->IsSuccess)
    {
        return redirect()->to($decodeResponse->Data->PaymentURL);
    }

}
})->name('exe_fatrah');

Route::get('fatrah/redirect',function(Request $req){
        $key = $req->paymentId;
        $keyType = "PaymentId";
       

        ####### Get Payment Detail ######
        $token = "7Fs7eBv21F5xAocdPvvJ-sCqEyNHq4cygJrQUFvFiWEexBUPs4AkeLQxH4pzsUrY3Rays7GVA6SojFCz2DMLXSJVqk8NG-plK-cZJetwWjgwLPub_9tQQohWLgJ0q2invJ5C5Imt2ket_-JAlBYLLcnqp_WmOfZkBEWuURsBVirpNQecvpedgeCx4VaFae4qWDI_uKRV1829KCBEH84u6LYUxh8W_BYqkzXJYt99OlHTXHegd91PLT-tawBwuIly46nwbAs5Nt7HFOozxkyPp8BW9URlQW1fE4R_40BXzEuVkzK3WAOdpR92IkV94K_rDZCPltGSvWXtqJbnCpUB6iUIn1V-Ki15FAwh_nsfSmt_NQZ3rQuvyQ9B3yLCQ1ZO_MGSYDYVO26dyXbElspKxQwuNRot9hi3FIbXylV3iN40-nCPH4YQzKjo5p_fuaKhvRh7H8oFjRXtPtLQQUIDxk-jMbOp7gXIsdz02DrCfQIihT4evZuWA6YShl6g8fnAqCy8qRBf_eLDnA9w-nBh4Bq53b1kdhnExz0CMyUjQ43UO3uhMkBomJTXbmfAAHP8dZZao6W8a34OktNQmPTbOHXrtxf6DS-oKOu3l79uX_ihbL8ELT40VjIW3MJeZ_-auCPOjpE3Ax4dzUkSDLCljitmzMagH2X8jN8-AYLl46KcfkBV"; #token value to be placed here;
    
        $basURL = "https://apitest.myfatoorah.com";
    
    $curl = curl_init();
    curl_setopt_array($curl, array(
      CURLOPT_URL => "$basURL/v2/GetPaymentStatus",
      CURLOPT_CUSTOMREQUEST => "POST",
      CURLOPT_POSTFIELDS => "{\"Key\":\"$key\",\"KeyType\": \"$keyType\"}",
      CURLOPT_HTTPHEADER => array("Authorization: Bearer $token","Content-Type: application/json"),
    ));
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    
    $response = curl_exec($curl);
    $err = curl_error($curl);
    
    curl_close($curl);
    
    if ($err) {
      echo "cURL Error #:" . $err;
    } else {
        $decodeResponse = json_decode($response);
        dd($decodeResponse);
        if($decodeResponse->IsSuccess)
        {
            return redirect()->to($decodeResponse->Data->PaymentURL);
        }
    
    }
})->name('fatrooh_redirect');


Route::get('fatrooh_error',function(Request $req){
    dd($req->all());
})->name('fatrooh_error');