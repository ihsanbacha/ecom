<?php
use Illuminate\Support\Facades\DB;
// for category and parent category 
function get_cat_data(){
     // 1 retrive data from category table
     $data['home_cat2'] = Db::table('categories')
     ->where(['status' => 1])
     ->where(['is_home' => 1])
     ->get();
   
 // 1 retrive data from category table
 foreach ($data['home_cat2'] as $row) {
     $data['home_cat_parent'][$row->cat_id] = Db::table('categories')
     ->where(['status' => 1])
     ->where(['is_home' => 1])
     ->where(['parent_cat_id' => $row->cat_id])
     ->get();
 }
    return $data;
}

// temp id function
function getUserTempId(){
	if(!session()->has('user_temp_id')){
		$rand=rand(111111111,999999999);
		session()->put('user_temp_id',$rand);
		return $rand;
	}else{
		return session()->get('user_temp_id');
	}
}

// for cart count
function cart_record_count(){
	  // for register user
      if (session()->has('customer_login')) {
        $user_id = session()->get('customer_id');
        $user_type = "reg";
    } else {
        // for non register user
        $user_id = getUserTempId();
        $user_type = "not_reg";
    }
    $data= DB::table('cart')
            ->leftJoin('products', 'products.product_id', '=', 'cart.product_id')
            ->leftJoin('product_attributes', 'product_attributes.id', '=', 'cart.product_attr_id')
            ->leftJoin('sizes', 'sizes.size_id', '=', 'product_attributes.size_id')
            ->leftJoin('colours', 'colours.colour_id', '=', 'product_attributes.colour_id')
            ->where(['user2_id' => $user_id])
            ->where(['user_type' => $user_type])
            ->select(
                'products.product_id',
                'products.product_name',
                'products.product_image',
                'product_attributes.id',
                'product_attributes.price',
                'sizes.size',
                'colours.colour',
                'product_attributes.quantity',
                'cart.qty'
            )
            ->get();
    return $data;
}

// coupon data
function coupon_code_data($coupon_code){
    $total_price = 0;
    // 1 retrive coupon data
    $data = DB::table('coupons')
        ->where(['code' =>$coupon_code])
        ->get();

    if (isset($data[0])) {

        // 2 check status 
        if ($data[0]->coupon_status == 1) {
            // 3 check is one time used
            if ($data[0]->is_one_time == 1) {
                $status = "error";
                $msg = "coupon already used";
            } else {
                // 4 min_order_amount
                $min_order_amount = $data[0]->min_order_amount;
                if ($min_order_amount > 0) {
                    $count = cart_record_count();
                   
                    $total_price = 0;
                    foreach ($count as $list) {
                        $total_price = $total_price + ($list->qty * $list->price);
                    }

                    //min_order_amount compare to price
                    if ($min_order_amount > $total_price) {
                        $status = "error";
                        $msg = "cart amount must be grater than $min_order_amount ";
                    } else {
                        $status = "success";
                        $msg = "coupon applied";
                    }
                }
            }
        } else {
            $status = "error";
            $msg = "this coupon expire";
        }

       
    } else {
        $status = "error";
        $msg = "please enter valid coupon code";
    }
      ////
      if ($status == 'success') {
        $type = $data[0]->type;
        $value = $data[0]->value;
        if ($type == 'value') {
            $total_price =  $total_price - $value;
        }
        if ($type == 'per') {
            $new_price = ($value / 100) * $total_price;
            $total_price =  $total_price - $new_price;
        }
    }
  
 
    return json_encode([
        'status' => $status,
        'msg' => $msg,
        'total_price' => $total_price,
       
    ]);


}


/// coupon code
function coupon_code() {
    $data = DB::table('coupons')
    ->where(['coupon_status' =>1])
    ->get();
    return $data;
}


function prx($arr){
         echo "<pre>";
         print_r($arr);
         die();
}
