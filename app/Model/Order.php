<?php

namespace App\Model;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $guarded=[];

    public function user(){
        return $this->belongsTo(User::class,'user_id','id');
    }
    public function products(){
        return $this->belongsToMany(product::class)->withPivot('qty','size_id','color_id');
    }
    public function color(){
        return $this->belongsToMany(color::class,'order_product','order_id','color_id');
    }
    public function size(){
        return $this->belongsToMany(size::class,'order_product','order_id','size_id');
    }
    public function orderProduct(){
        return $this->belongsTo(OrderProduct::class);
    }
    public function shippingMethod(){
        return $this->belongsTo(shippingMethods::class,'shipping_method_id','id');
    }
}
