<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class product_color extends Model
{
    protected $fillable = ['name', 'created_by', 'updated_by'];

    public function color(){
        return $this->belongsTo(color::class);
    }
}
