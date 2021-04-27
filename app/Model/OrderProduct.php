<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{
    protected $table = 'order_product';
    protected $guarded=[];

    
    public function product()
    { 
        return $this->belongsTo(product::class, 'product_id','id');
    }
} 
  