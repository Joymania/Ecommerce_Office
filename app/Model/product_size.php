<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class product_size extends Model
{
    public function size(){
        return $this->belongsTo(size::class);
    }
}
