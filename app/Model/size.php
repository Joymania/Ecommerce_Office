<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class size extends Model
{
    protected $fillable = ['name','desc','size','created_by','updated_by'];

    public function products()
    {
        return $this->belongsToMany(product::class, 'product_sizes')->withTimestamps();
    }
}
