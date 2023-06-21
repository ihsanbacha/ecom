<?php

namespace App\Http\Controllers\back_end;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class review_controller extends Controller
{
    // review data
    public function customer_orders_review()
    {

        $data['data'] = DB::table('product_review')
            ->leftJoin('customers', 'customers.customer_id', '=', 'product_review.customer_id')
            ->leftJoin('products', 'products.product_id', '=', 'product_review.product_id')
            ->get();

        return view('back_end.customer_orders_review', $data);
    }

    // review_status 
    public function review_status($review_status, $review_id)
    {

        DB::table('product_review')
            ->where(['review_id' => $review_id])
            ->update(['status' => $review_status]);
        if ($review_status == 1) {
            return redirect('customer_orders_review')->with('msg', 'status Active');
        } else {
            return redirect('customer_orders_review')->with('msg', 'status Deactive');
        }
    }
}
