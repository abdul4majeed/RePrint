<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaymentProcessorsController extends Controller
{
    #Tap Payment Gateways
    public function tap_payment_view()
    {
        return view('payment');
    }

    public function tap_payment_charge(Request $req)
    {
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
    }

    public function tap_post_url(Request $req)
    {
        dd($req->all());
    }

    public function tap_redirect_url(Request $req)
    {
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
    }

    #MyFatoorah Payment Gateway
    public function my_fatoorah_initiate_payment_and_return_view_with_card()
    {
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
    }

    public function my_fatoorah_payment_url_redirection_and_execution(Request $req)
    {
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
    }   

    public function my_fatoorah_redirect_url(Request $req)
    {
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
    }

    public function my_fatoorah_error_url(Request $req)
    {
        dd($req->all());
    }
}
