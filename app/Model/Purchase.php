<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    protected $guarded = [];//

    public function products()
    {
        return $this->belongsToMany('App\Model\product');
    }

}
