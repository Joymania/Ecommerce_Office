<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    protected $fillable = [
        'category_id',
        'brand_id',
        'tag_id',
        'review_id',
        'name',
        'price',
        'short_desc',
        'long_desc',
        'image'
    ];

    public function category()
    {
        $this->belongsTo(category::class, 'category_id','id');
    }
    public function brand()
    {
        $this->belongsTo(brand::class, 'brand_id', 'id');
    }
    public function tag()
    {
        $this->belongsTo(tag::class, 'tag_id','id');
    }
}
