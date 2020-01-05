<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShopSubServices extends Model
{
    protected $fillable = [
        'services_id' ,
            'sub_service_name' ,
            'sub_service_price' 
    ];
}
