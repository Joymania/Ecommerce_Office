<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class CartShopping extends Model
{

    // public function user(){
    //     return $this->belongsTo(User::class);
    // }
    public function product(){
        return $this->belongsTo(product::class,'product_id','id');
    }

}
