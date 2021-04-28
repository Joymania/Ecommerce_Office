<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class expenseCategory extends Model
{
  protected $fillable = [
    'name'
];

    public function Expense()
    { 

      return $this->hasMany(Expense::class,'category_id','id'); 
    }
  
    public function delete() {
      $this->Expense()->delete();
      return parent::delete();
  }

  public $timestamps = false;
}
 