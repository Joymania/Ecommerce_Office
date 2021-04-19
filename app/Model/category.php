<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    protected $fillable = ['name', 'created_by', 'updated_by'];

    public function products()
    {
        return $this->hasMany(product::class, 'category_id', 'id');
    }

    public function subCategories()
    {
        return $this->hasMany(sub_category::class, 'category_id','id');
    }
}
