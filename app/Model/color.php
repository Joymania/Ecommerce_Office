<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class color extends Model
{
    protected $fillable = ['name', 'created_by', 'updated_by'];

     public function products()
     {
         return $this->belongsToMany(product::class, 'product_colors')->withTimestamps();
     }

     public function subImages()
     {
         return $this->hasOne(SubImage::class,'color_id','id');
     }
}
