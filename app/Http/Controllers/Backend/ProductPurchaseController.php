<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductPurchaseController extends Controller
{
    public function create(){
        
        $data = [];
        $data['suppliers'] = collect([

            ['id' => 1, 'name' => 'Rakib'],
            ['id' => 2, 'name' => 'Sakib'],
            ['id' => 3, 'name' => 'Habib'],
            ['id' => 4, 'name' => 'Hasib']
        ]);

        return view('admin.products_purchase.create', $data);
        // return "Hello Masud ";
    }
}
