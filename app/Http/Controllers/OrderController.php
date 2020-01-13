<?php

namespace App\Http\Controllers;

use App\Mail\OrderCreatedMailClient;
use App\Mail\OrderCreatedMailOwner;
use App\Order;
use App\OrderDocument;
use App\Shop;
use App\ShopServices;
use App\ShopSubServices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{
    
    public function place_order(Request $req)
    {
        $this->get_client_information();
        $this->get_order_information($req->services,$req->sub_services);

        session()->put("services_id", $req->services);
        session()->put("sub_services_id", $req->sub_services);
        session()->put("payment", $req->payment);
        // Validate Here 
       
        $this->create_order();

        // Send Mail to Client and Shop Admin

                
        if($req->payment == "1")
        {
            return redirect()->route('fatroorah-payment');
        }
        elseif($req->payment == "2")
        {
            return redirect()->route('tap-payment');
        }
        elseif($req->payment == "3")
        {

            $order = Order::find(session()->get('order_id'));
            $order->order_status = 1;
            $order->payment_status = 1 ;
            $order->update();

            $shop = (Shop::find(session()->get('shop_id')));

            $data = ['firstName' => session()->get('fristName'),
                    'service_name'=>session()->get('service_name'),
                    'service_price'=>session()->get('service_price'),
                    'sub_service_name'=>session()->get('sub_service_name'),
                    'order_id'=>session()->get('order_id'),
                    'sub_service_price'=>session()->get('sub_service_price'),
                    'payment'=>session()->get('payment'),
                    'totalPrice'=>session()->get('totalPrice'),
                    'shop_name'=>$shop->shop_name,
                    'shop_phone'=>$shop->shop_phone,
                    'shop_email'=>$shop->shop_email,
                    'shop_address'=>$shop->shop_address,
                    'shop_city'=>$shop->shop_city];

            Mail::to(Auth::user()->email)->send(new OrderCreatedMailClient($data));
            Mail::to($shop->shop_email)->send(new OrderCreatedMailOwner($data));

            return redirect()->route('client_dashboard')->withErrors(['ordercreated'=>'Your Order created successfully.']);
        }
    }

    public function get_client_information()
    {
        $user = Auth::user();
        $firstName = $user->firstname;  // First Name
        // $middleName = $user->middlename; // Middle Name
        $lastName = $user->lastname;  // Last Name
        $email  = $user->email; // Email
        // $phone_code  = $user->phone_code;  // Phone
        // $phone_number  = $user->phone_number;  // Phone

        session()->put('fristName',$firstName);
        // session()->put('middleName',$middleName);
        session()->put('lastName',$lastName);
        session()->put('email',$email);
        // session()->put('phone_code',$phone_code);
        // session()->put('phone_number',$phone_number);
    }

    public function get_order_information($service_id,$sub_service_id)
    {
        $services = ShopServices::find($service_id)->first();
        $service_name = $services->service_name;
        $service_price = $services->service_price;

        $subServices = ShopSubServices::find($sub_service_id)->first();
        $sub_service_name = $subServices->sub_service_name;
        $sub_service_price = $subServices->sub_service_price;

        $totalPrice = $service_price + $sub_service_price;

        session()->put('service_name',$service_name);
        session()->put('service_price',$service_price);
        session()->put('sub_service_name',$sub_service_name);
        session()->put('sub_service_price',$sub_service_price);
        session()->put('totalPrice',$totalPrice);
    }

    public function create_order()
    {
        $order = Order::create([
            'shop_id' => session()->get('shop_id'),
            'service_id' => session()->get('services_id'),
            'sub_service_id' => session()->get('sub_services_id'),
            'payment_type' => session()->get('payment'),
            'bill' => session()->get('totalPrice'),
            'user_id' =>Auth::user()->id,
        ]);

        session()->put('order_id',$order->id);

        foreach (session()->get('document') as $fileName) {
            
            OrderDocument::create([
                'name'=> $fileName,
                'order_id' => $order->id,
            ]);
        }

    }
}
