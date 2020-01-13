<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderDocument extends Model
{
    protected $fillable =
    [
        'name',
        'order_id',
    ];
}
