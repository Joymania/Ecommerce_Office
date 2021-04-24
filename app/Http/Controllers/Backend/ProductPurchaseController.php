<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Model\product;
use App\Model\Purchase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

        // todo: need to improve below line
        $data['products_src'] = product::all();

        return view('admin.products_purchase.create', $data);
    }

    public function store(Request $request){

        // todo: need to apply Server validation
        // dd($request->orders);
        
        DB::beginTransaction();

        try {
            $purchase = Purchase::create([
                'tax_percentage'=> $request->order_tax_rate?? 0,
                'tax_amount'=> $request->tax_amount ?? 0,
                'discount'=> $request->discount ?? 0,
                'shipping_cost'=> $request->shipping_cost ?? 0,
                'grand_total'=> $request->grand_total,
                'note'=> $request->note,
                'supplier_id'=> $request->supplier_id,
            ]);

            $ordered_products = json_decode($request->orders);

            foreach($ordered_products as $product){
    
                $purchase->products()->attach(
                    $product->id,
                    [
                        'quantity'=>$product->qty,
                        'received'=>$product->received_qty,
                        'discount'=>$product->discount,
                        'tax'=>$product->tax
                    ]
                );
            }
            DB::commit();
            return redirect()->back()->with('msg', 'Purchase request has been submitted.');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('msg', 'Failed! Please try again.');
        }
    }
}
