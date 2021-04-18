<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class brand extends Model
{
    protected $fillable = ['name', 'created_by', 'updated_by'];

    public function products()
    {
        return $this->hasMany(product::class, 'brand_id','id');
    }
}
