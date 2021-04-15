<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class tag extends Model
{
    protected $fillable = ['name', 'created_by', 'updated_by'];
}
