<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class CartShopping extends Model
{

    public function product(){
        return $this->belongsTo(product::class,'product_id','id');
    }

}
