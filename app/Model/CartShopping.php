<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class CartShopping extends Model
{

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

}
