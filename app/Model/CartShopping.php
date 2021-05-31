<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class CartShopping extends Model
{
    protected $fillable = [
        'shipping_method_id'
    ];

    public function product(){
        return $this->belongsTo(product::class,'product_id','id');
    }
    public function color(){
        return $this->belongsTo(color::class,'product_color','id');
    }
    public function size()
    {
        return $this->belongsTo(size::class, 'product_size', 'id');
    }
    public function shippingMethod(){
        return $this->belongsTo(shippingMethods::class,'shipping_method_id','id');
    }

}
