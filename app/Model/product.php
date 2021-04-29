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
        'image',
        'stock',
        'stock_warning',
        'sub_category_id',
        'promo_price',
        'start_date',
        'end_date',
        'buying_price'
    ];

    public function OrderProduct()
    {

      return $this->hasMany(OrderProduct::class,'order_id','id');
    }

    public function category()
    {
        return $this->belongsTo(category::class, 'category_id','id');
    }
    public function brand()
    {
        return $this->belongsTo(brand::class, 'brand_id', 'id');
    }

    public function tag()
    {
        return $this->belongsTo(tag::class, 'tag_id','id');
    }

    public function colors()
    {
        return $this->belongsToMany(color::class, 'product_colors')->withTimestamps();
    }

    public function reviews()
    {
        return $this->hasMany(review::class, 'product_id', 'id');
    }

    public function sizes()
    {
        return $this->belongsToMany(size::class, 'product_sizes')->withTimestamps();
    }

    public function sub_images()
    {
        return $this->hasMany(SubImage::class, 'product_id','id');
    }

    public function orders(){
        return $this->belongsToMany(Order::class)->withPivot('qty' );//'size', 'price'
    }


}
