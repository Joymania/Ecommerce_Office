<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class wishlist extends Model
{
    protected $guarded=[];

    public function product(){
        return $this->belongsTo(product::class,'product_id','id');
    }
}
