<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    protected $fillable = [
        'shop_name',
        'shop_owner_name',
        'shop_phone',
        'shop_email',
        'shop_address',
        'shop_city'
    ];

    public function services()
    {
        return $this->hasMany(ShopServices::class,'shop_id');
    }
}
