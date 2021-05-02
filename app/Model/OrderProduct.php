<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{
    protected $table = 'order_product';
    protected $guarded=[];
    public function color(){
        return $this->belongsTo(color::class,'color_id','id');
    }
    public function size(){
        return $this->belongsTo(size::class,'size_id','id');
    }
    public function order_detail(){
        return $this->belongsTo(Order::class,'order_id','id');
    }
    public function product(){
        return $this->belongsTo(product::class,'product_id','id');
    }

}
