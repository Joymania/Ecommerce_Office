<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class logo extends Model
{
    protected $fillable = [
		'image',
    ];

    public $timestamps = false;
}
