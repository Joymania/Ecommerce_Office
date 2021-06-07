<?php

namespace App\Exports;
use App\Model\Order;
use DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;


class Excelsales implements FromCollection, WithMapping, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Order::join('users','orders.user_id','users.id')
        ->join('order_product','order_product.order_id','orders.id')
        ->select('orders.*','users.name','users.email','order_product.qty')     
        ->whereIn('orders.status',[1,2])
        ->get();
    }

    public function map($order): array
    {
        return [
            $order->id,
            $order->biling_fname.$order->biling_lname,
            $order->biling_address,
            $order->biling_phone,
            $order->qty,
            $order->payment,
            $order->bkash_mobile,
            $order->transaction,
            $order->subtotal,  
            $order->date,
     


        ];
    }
    public function headings(): array
    {
        return [
            '#Order No',
            'Biller Name',
            'Biller Address',
            'Biller Phone',
            'Product Quantity',
            'Payment Method',
            'Bkash Number',
            'Bkash Transaction ID',
            'Total Amount',
            'Date',

        ];
    }
}
