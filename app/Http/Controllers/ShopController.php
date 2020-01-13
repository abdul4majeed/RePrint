<?php

namespace App\Http\Controllers;

use App\Shop;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shops = Shop::all();
        return view('shops')->with('shops',$shops);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Shop  $shop
     * @return \Illuminate\Http\Response
     */
    public function show(Shop $shop)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Shop  $shop
     * @return \Illuminate\Http\Response
     */
    public function edit(Shop $shop)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Shop  $shop
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Shop $shop)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Shop  $shop
     * @return \Illuminate\Http\Response
     */
    public function destroy(Shop $shop)
    {
        //
    }

    public function get_shop_services(Request $req)
    {
        session()->put('shop_id',$req->shop_id);
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
    }
}
