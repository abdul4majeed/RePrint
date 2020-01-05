<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShopServices extends Model
{
    protected $fillable = [
        'shop_id',
        'service_name',
        'service_price',
    ];

    public function sub_services()
    {
        return $this->hasMany(ShopSubServices::class,'services_id');
    }
}
