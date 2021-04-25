<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class SubImage extends Model
{
    protected $fillable = ['product_id','image'];

    public function product()
    {
        return $this->belongsTo(product::class, 'product_id', 'id');
    }
}
