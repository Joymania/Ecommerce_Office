<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    protected $fillable = [
		'name',
    'createdBy',
    'updatedBy',
    ];

    public function sub_category()
    {

      return $this->hasMany(sub_category::class,'category_id','id');
    }

    public function delete() {
      $this->sub_category()->delete();
      return parent::delete();
  } 



    public $timestamps = false;

    public function product()
    {
    return $this->hasMany(product::class, 'category_id', 'id');

   }

}
