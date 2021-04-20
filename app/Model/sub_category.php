<?php
 
namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class sub_category extends Model
{
    protected $fillable = [
		'sub_category_name',
        'category_id',
    ]; 


    public function category()
    {
        return $this->belongsTo(category::class); 
    }

    public $timestamps = false;
}
