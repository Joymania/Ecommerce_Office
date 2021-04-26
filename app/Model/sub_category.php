<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model; 

class sub_category extends Model
{

    protected $fillable = ['category_id','sub_category_name'];

    public function category() 
    {
        return $this->belongsTo(category::class,'category_id','id');
    }

    public $timestamps = false;
}
