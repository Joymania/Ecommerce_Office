<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    protected $fillable = [
        'category_id',
        'amount',
        'note',
        'expense_by'
    ];

    public function expenseCategory ()
    {
        return $this->belongsTo(expenseCategory::class , 'category_id','id');
    }

}
