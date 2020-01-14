<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClientSurvey extends Model
{
    protected $fillable = 
    [ 'shop_id', 
    'order_id', 
    'user_id', 
    'rating', 
    'feeback', 
    ];
}
