<?php

namespace App\Http\Controllers\back_end;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class order_controller extends Controller
{
     // my orders
     public function show_customer_orders(Request $request)
     {
 
         $data['orders'] = DB::table('orders')
             ->leftJoin('order_status', 'order_status.id', '=', 'orders.order_id')
             ->select('orders.*', 'order_status.orders_status')
             ->get();
         return view('back_end.show_customer_orders', $data);
     }
     // my order detail
     public function show_customer_order_detail($id)
     {
         $data['orders'] = DB::table('orders')
             ->leftJoin('order_status', 'order_status.id', '=', 'orders.order_id')
             ->leftJoin('order_detail', 'order_detail.orders_id', '=', 'orders.order_id')
             //->leftJoin('customers', 'customers.customer_id', '=', 'orders.customer_id')
             ->leftJoin('products', 'products.product_id', '=', 'order_detail.product_id')
             ->where(['order_id' => $id])
             ->select('orders.*', 'order_status.orders_status','order_detail.*','products.product_image',)
             ->get();
             return view('back_end.show_customer_order_detail', $data);
     }
     // customer_order_status_save
     public function update_order_status($id){
        $data['orders'] = DB::table('orders')
        ->leftJoin('order_status', 'order_status.id', '=', 'orders.order_id')
        ->leftJoin('order_detail', 'order_detail.orders_id', '=', 'orders.order_id')
        ->where(['order_id' => $id])
        ->get();
      return view('back_end.update_order_status', $data);

     }
     public function update_order_status_save(Request $request,){
       // orders
        DB::table('orders')
        ->where(['order_id'=>$request->order_id])
        ->update(['payment_status'=>$request->payment_status]);
        // order status
        DB::table('order_status')
        ->where(['id'=>$request->order_id])
        ->update(['orders_status'=>$request->order_status]);

        return redirect('show_customer_orders')->with('msg', 'updated success');;

     }
}
