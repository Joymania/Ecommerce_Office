<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class SubImage extends Model
{
    protected $fillable = ['product_id','image','color_id'];

    public function product()
    {
        return $this->belongsTo(product::class, 'product_id', 'id');
    }

    public function color()
    {
        return $this->belongsTo(color::class,'color_id','id');
    }
}
