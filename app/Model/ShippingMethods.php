<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ShippingMethods extends Model
{
    public function carts()
    {
        return $this->hasMany(CartShopping::class, 'cart_id','id');
    }
    public function orders()
    {
        return $this->hasMany(Order::class, 'order_id','id');
    }
}
