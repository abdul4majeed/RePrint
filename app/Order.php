<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'shop_id' ,
        'service_id' ,
        'sub_service_id' ,
        'payment_type' ,
        'bill',
        'user_id'
    ];

    public function shop()
    {
        return $this->belongsTo(Shop::class,'shop_id');
    }

    public function service()
    {
        return $this->belongsTo(ShopServices::class,'service_id');
    }

    public function sub_service()
    {
        return $this->belongsTo(ShopSubServices::class,'sub_service_id');
    }

    public function payment_type_relation()
    {
        return $this->belongsTo(PaymentType::class,'payment_type');
    }

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function payment_status_relation()
    {
        return $this->belongsTo(PaymentStatus::class,'payment_status');
    }

    public function order_status_relation()
    {
        return $this->belongsTo(OrderStatus::class,'order_status');
    }
}
