<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class review extends Model
{
    protected $fillable = ['name', 'email', 'rating', 'review', 'product_id'];

    public function product()
    {
        return $this->belongsTo(product::class, 'product_id','id');
    }
}
