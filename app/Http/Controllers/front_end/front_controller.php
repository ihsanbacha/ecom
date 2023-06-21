<?php

namespace App\Http\Controllers\front_end;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;

class front_controller extends Controller
{

    // index page
    public function index()
    {

        // 1 retive data from category table
        $data['home_cat'] = Db::table('categories')
            ->where(['status' => 1])
            ->where(['is_home' => 1])
            ->get();

        // 2 retrive data from products table use foreach loop
        foreach ($data['home_cat'] as $row) {
            $data['product_data'][$row->cat_id] =
                DB::table('products')
                ->where(['product_status' => 1])
                ->where(['category_id' => $row->cat_id])
                ->get();

            // 3 retrive data from products atrributes table use foreach loop
            foreach ($data['product_data'][$row->cat_id] as $list1) {
                $data['product_attr'][$list1->product_id] =
                    DB::table('product_attributes')
                    ->leftJoin('sizes', 'sizes.size_id', '=', 'product_attributes.size_id')
                    ->leftJoin('colours', 'colours.colour_id', '=', 'product_attributes.colour_id')
                    ->where(['product_attributes.product_id' => $list1->product_id])
                    ->get();
            }
        }

        // 1 FOR FEATURED DATA
        // 1 retrive data from products table use foreach loop
        $data['product_featured_data'][$row->cat_id] =
            DB::table('products')
            ->where(['product_status' => 1])
            ->where(['is_featured' => 1])
            ->get();

        // 2 retrive data from products atrributes table use foreach loop
        foreach ($data['product_featured_data'][$row->cat_id] as $list1) {
            $data['product_featured_attr'][$list1->product_id] =
                DB::table('product_attributes')
                ->leftJoin('sizes', 'sizes.size_id', '=', 'product_attributes.size_id')
                ->leftJoin('colours', 'colours.colour_id', '=', 'product_attributes.colour_id')
                ->where(['product_attributes.product_id' => $list1->product_id])
                ->get();
        }
        // END FEATURED DATA

        // 2 FOR TRANDIND DATA
        // 1 retrive data from products table use foreach loop
        $data['product_tranding_data'][$row->cat_id] =
            DB::table('products')
            ->where(['product_status' => 1])
            ->where(['is_tranding' => 1])
            ->get();

        // 2 retrive data from products atrributes table use foreach loop
        foreach ($data['product_tranding_data'][$row->cat_id] as $list1) {
            $data['product_tranding_attr'][$list1->product_id] =
                DB::table('product_attributes')
                ->leftJoin('sizes', 'sizes.size_id', '=', 'product_attributes.size_id')
                ->leftJoin('colours', 'colours.colour_id', '=', 'product_attributes.colour_id')
                ->where(['product_attributes.product_id' => $list1->product_id])
                ->get();
        }
        // END FOR TRANDIND DATA

        // 3 FOR DISCOUNTED DATA
        // 1 retrive data from products table use foreach loop
        $data['product_discounted_data'][$row->cat_id] =
            DB::table('products')
            ->where(['product_status' => 1])
            ->where(['is_discounted' => 1])
            ->get();

        // 2 retrive data from products atrributes table use foreach loop
        foreach ($data['product_discounted_data'][$row->cat_id] as $list1) {
            $data['product_discounted_attr'][$list1->product_id] =
                DB::table('product_attributes')
                ->leftJoin('sizes', 'sizes.size_id', '=', 'product_attributes.size_id')
                ->leftJoin('colours', 'colours.colour_id', '=', 'product_attributes.colour_id')
                ->where(['product_attributes.product_id' => $list1->product_id])
                ->get();
        }
        // END DISCOUNTED DATA

        // banner data 
        $data['home_banner'] = Db::table('home_banner')
            ->where(['banner_status' => 1])
            ->get();

        // show brands data on home page
        $data['home_brands'] = Db::table('brands')
            ->where(['brand_status' => 1])
            ->where(['is_home' => 1])
            ->get();

        return view('front_end.index', $data);
    }
    // product detail
    public function product_detail($id)
    {
        // for product review
        $data['product_review'] =
            DB::table('product_review')
            ->leftJoin('customers', 'customers.customer_id', '=', 'product_review.customer_id')
            ->where(['product_id' => $id])
            ->get();

        // 1 retrive data from products table
        $data['product_data'] =
            DB::table('products')
            ->leftJoin('brands', 'brands.brand_id', '=', 'products.brand')
            ->where(['product_status' => 1])
            ->where(['product_id' => $id])
            ->get();

        // 2 retrive data from products product_images table use foreach loop
        foreach ($data['product_data'] as $list1) {
            $data['product_images'][$list1->product_id] =
                DB::table('product_images')
                ->where(['product_images.product_id' => $list1->product_id])
                ->get();
        }
        // 2 retrive data from products atrributes table use foreach loop
        foreach ($data['product_data'] as $list1) {
            $data['product_attr'][$list1->product_id] =
                DB::table('product_attributes')
                ->leftJoin('sizes', 'sizes.size_id', '=', 'product_attributes.size_id')
                ->leftJoin('colours', 'colours.colour_id', '=', 'product_attributes.colour_id')
                ->where(['product_attributes.product_id' => $list1->product_id])
                ->get();
        }
        // 1 retrive data from products table for related products
        $data['related_product_data'] =
            DB::table('products')
            ->where(['product_status' => 1])
            ->where('product_id', '!=', $id)
            ->get();

        // 2 retrive data from related product atrributes table use foreach loop
        foreach ($data['related_product_data'] as $list1) {
            $data['related_product_attr'][$list1->product_id] =
                DB::table('product_attributes')
                ->leftJoin('sizes', 'sizes.size_id', '=', 'product_attributes.size_id')
                ->leftJoin('colours', 'colours.colour_id', '=', 'product_attributes.colour_id')
                ->where(['product_attributes.product_id' => $list1->product_id])
                ->get();
        }

        return view('front_end.product_detail', $data);
    }
    // search product
    public function search(Request $request, $search)
    {

        // 1 retrive data from products table
        $data['product_data'] =
            DB::table('products')
            ->where(['product_status' => 1])
            ->where('product_name', 'like', "%$search%")
            ->orwhere('short_desc', 'like', "%$search%")
            ->orwhere('desc', 'like', "%$search%")
            ->orwhere('model', 'like', "%$search%")
            ->orwhere('technical_specification', 'like', "%$search%")
            ->orwhere('keywords', 'like', "%$search%")
            ->get();

        // 2 retrive data from products product_images table use foreach loop
        foreach ($data['product_data'] as $list1) {
            $data['product_images'][$list1->product_id] =
                DB::table('product_images')
                ->where(['product_images.product_id' => $list1->product_id])
                ->get();
        }
        // 2 retrive data from products atrributes table use foreach loop
        foreach ($data['product_data'] as $list1) {
            $data['product_attr'][$list1->product_id] =
                DB::table('product_attributes')
                ->leftJoin('sizes', 'sizes.size_id', '=', 'product_attributes.size_id')
                ->leftJoin('colours', 'colours.colour_id', '=', 'product_attributes.colour_id')
                ->where(['product_attributes.product_id' => $list1->product_id])
                ->get();
        }

        return view('front_end.search', $data);
    }
    // add to cart
    public function add_to_cart(Request $request)
    {
        // for register user
        if ($request->session()->has('customer_login')) {
            $user_id = $request->session()->get('customer_id');
            $user_type = "reg";
        } else {
            // for non register user
            $user_id = getUserTempId();
            $user_type = "not_reg";
        }

        // retrive input data
        $size_id = $request->post('size_id');
        $colour_id = $request->post('colour_id');
        $product_id = $request->post('product_id');
        $pqty = $request->post('pqty');

        // for retrive  product attribute id
        $data =
            DB::table('product_attributes')
            ->select('product_attributes.id', 'product_attributes.quantity')
            ->leftJoin('sizes', 'sizes.size_id', '=', 'product_attributes.size_id')
            ->leftJoin('colours', 'colours.colour_id', '=', 'product_attributes.colour_id')
            ->where(['product_id' => $product_id])
            ->where(['colours.colour' => $colour_id])
            ->where(['sizes.size' => $size_id])
            ->get();
        $product_attr_id = $data[0]->id;
        $quantity = $data[0]->quantity;


        // cart check for update 
        $check = DB::table('cart')
            ->where(['user2_id' => $user_id])
            ->where(['user_type' => $user_type])
            ->where(['product_id' => $product_id])
            ->where(['product_attr_id' => $product_attr_id])
            ->get();
        if (isset($check[0])) {
            $update_id = $check[0]->cart_id;
            if ($pqty == 0) {
                DB::table('cart')
                    ->where(['cart_id' => $update_id])
                    ->delete();
                $msg = "remove";
            } elseif ($pqty == 1) {
                // cart msg
                $msg = "this product already added";
            } else {
                if ($quantity < 1) {
                    $msg = "availible quantity in stock is &nbsp; $quantity ";
                } else {
                    // cart update
                    DB::table('cart')
                        ->where(['cart_id' => $update_id])
                        ->update(['qty' =>  $pqty]);
                    $msg = "updated";
                }
            }
        } else {
            if ($quantity < 1) {
                $msg = "availible quantity in stock is &nbsp; $quantity ";
            } else {
                //for insert data
                $data = DB::table('cart')->insertGetId([
                    'user2_id' => $user_id,
                    'user_type' => $user_type,
                    'product_id' => $product_id,
                    'product_attr_id' => $product_attr_id,
                    'qty' =>  $pqty,
                    'added_on' => date('Y-m-d h:i:s')
                ]);
                $msg = "data added to cart";
            }
        }
        //cart
        $data = DB::table('cart')
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
                'sizes.size_id',
                'colours.colour',
                'colours.colour_id',
                'cart.qty'
            )
            ->get();
        return response()->json(['msg' => $msg, 'cart_data' => $data, 'count' => count($data)]);
    }
    // cart
    public function cart(Request $request)
    {

        // for register user
        if ($request->session()->has('customer_login')) {
            $user_id = $request->session()->get('customer_id');
            $user_type = "reg";
        } else {
            // for non register user
            $user_id = getUserTempId();
            $user_type = "not_reg";
        }

        $data['data'] = DB::table('cart')
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
                'product_attributes.quantity',
                'product_attributes.price',
                'sizes.size',
                'colours.colour',
                'cart.qty',
                'cart.cart_id'
            )
            ->get();
        return view('front_end.cart', $data);
    }
    // product category
    public function product_category(Request $request, $cat_id)
    {
        // for data filter
        $sort = "";
        $sort_text = "";
        $filter_price_start = "";
        $filter_price_end = "";
        if ($request->get('sort') !== null) {
            $sort = $request->get('sort');
        }
        $query = DB::table('products');
        $query = $query->leftJoin('categories', 'categories.cat_id', '=', 'products.category_id');
        $query = $query->leftJoin('product_attributes', 'product_attributes.product_id', '=', 'products.product_id');
        $query = $query->where(['product_status' => 1]);
        $query = $query->where(['categories.cat_id' => $cat_id]);
        if ($sort == 'Desc') {
            $query = $query->orderBy('product_attributes.price', 'desc');
            $sort_text = "Desc";
        }
        if ($sort == 'name') {
            $query = $query->orderBy('products.product_name', 'desc');
            $sort_text = "name";
        }
        if ($sort == 'date') {
            $query = $query->orderBy('products.product_id', 'desc');
            $sort_text = "date";
        }
        if (
            $request->get('filter_price_start') !== null
            && $request->get('filter_price_end') !== null
        ) {
            $filter_price_start = $request->get('filter_price_start');
            $filter_price_end = $request->get('filter_price_end');
            if ($filter_price_start > 0 &&  $filter_price_end > 0) {
                $query = $query->whereBetween('product_attributes.price', [$filter_price_start, $filter_price_end]);
            }
        }
        $query = $query->distinct()->select('products.*');
        $query = $query->get();
        $data['product_data'] = $query;
        $data['sort'] = $sort;
        $data['sort_text'] = $sort_text;
        $data['filter_price_start'] = $filter_price_start;
        $data['filter_price_end'] = $filter_price_end;

        // 3 retrive data from products atrributes table use foreach loop
        foreach ($data['product_data'] as $list1) {
            $data['product_attr'][$list1->product_id] =
                DB::table('product_attributes')
                ->leftJoin('sizes', 'sizes.size_id', '=', 'product_attributes.size_id')
                ->leftJoin('colours', 'colours.colour_id', '=', 'product_attributes.colour_id')
                ->where(['product_attributes.product_id' => $list1->product_id])
                ->get();
        }

        return view('front_end.product_category', $data);
    }
    // customer register view
    public function customer_register()
    {
        // for if user login
        if (session()->has('customer_login') != null) {
            return redirect('/');
        }
        return view('front_end.customer_register');
    }
    // customer save
    public function customer_save(Request $request)
    {

        //   make validator
        $valid = validator::make($request->all(), [
            'customer_name' => 'required',
            'customer_email' => 'required|email|unique:customers,customer_email',
            'customer_mobile' => 'required|numeric',
            'customer_password' => 'required',
        ]);
        if (!$valid->passes()) {
            return response()->json([
                'status' => 'error',
                'error' => $valid->errors()
            ]);
        } else {
            // insert data
            $rand_id = rand(111111111, 999999999);
            $arr = [
                'customer_name' => $request->customer_name,
                'customer_email' => $request->customer_email,
                'customer_mobile' => $request->customer_mobile,
                'customer_password' => Crypt::encrypt($request->customer_password),
                'rand_id' => $rand_id,
                'created_at' => date('Y-m-d h:i:s'),
                'updated_at' => date('Y-m-d h:i:s'),
            ];
            $query = DB::table('customers')->insert($arr);
            if ($query) {
                // send email
                $data = ['customer_name' => $request->customer_name, 'rand_id' => $rand_id];
                $user['to'] = $request->customer_email;
                mail::send('front_end/email_varification', $data, function ($message) use ($user) {
                    $message->to($user['to']);
                    $message->subject('email varification');
                });
                return response()->json([
                    'status' => 'success',
                    'msg' => 'registeration successfully please check your email for varify your email'
                ]);
            }
        }
    }
    // login process
    public function login_process(Request $request)
    {

        $status = '';
        $msg = '';
        $data = DB::table('customers')
            ->where(['customer_email' => $request->login_email])
            ->get();
        if (isset($data[0])) {
            $password = Crypt::decrypt($data[0]->customer_password);
            $is_varify = $data[0]->customer_is_varify;
            $customer_status = $data[0]->customer_status;
            if ($is_varify != 1) {
                return response()->json([
                    "status" => "error",
                    'msg' => "please varify your email"
                ]);
            }
            if ($customer_status != 1) {
                return response()->json([
                    "status" => "error",
                    'msg' => 'this user are block please contact to admin!!'
                ]);
            }
            if ($password == $request->login_password) {
                // for rememberme data 
                if ($request->rememberme === null) {
                    setcookie('login_email', $request->login_email, 100);
                    setcookie('login_password', $request->login_password, 100);
                } else {
                    setcookie('login_email', $request->login_email, time() + 60 * 60 * 24 * 100);
                    setcookie('login_password', $request->login_password, time() + 60 * 60 * 24 * 100);
                }
                // set session
                $request->session()->put('customer_login', true);
                $request->session()->put('customer_id', $data[0]->customer_id);
                $request->session()->put('customer_name', $data[0]->customer_name);
                // update cart table
                $temp_id = getUserTempId();
                DB::table('cart')
                    ->where([
                        'user_type' => 'not_reg',
                        'user2_id' => $temp_id
                    ])
                    ->update([
                        'user_type' => 'reg',
                        'user2_id' => $data[0]->customer_id
                    ]);
                $status = "success";
                $msg = "you are login successfull";
            } else {
                $status = "error";
                $msg = "please enter valid password";
            }
        } else {
            $status = "error";
            $msg = "please enter valid email";
        }

        return response()->json([
            'status' => $status,
            'msg' => $msg
        ]);
    }
    // email varification
    public function email_varification(Request $request, $id)
    {
        $data = DB::table('customers')
            ->where(['rand_id' => $id])
            ->get();
        if (isset($data[0])) {
            DB::table('customers')
                ->where(['rand_id' => $id])
                ->update(['customer_is_varify' => 1]);
        }
        return redirect('/');
    }
    //forgot password email
    public function forgot_password(Request $request)
    {
        $rand_id = rand(111111111, 999999999);
        // 1 check forgot email in database
        $data = DB::table('customers')
            ->where(['customer_email' => $request->forgot_email])
            ->get();

        if (isset($data[0])) {
            // 2 update data
            DB::table('customers')
                ->where(['customer_email' => $request->forgot_email])
                ->update([
                    'customer_is_forgot_password' => 1,
                    'rand_id' => $rand_id
                ]);
            // 3 send email
            $data = ['rand_id' => $rand_id];
            $user['to'] = $request->forgot_email;
            mail::send('front_end/forgot_email_pass', $data, function ($message) use ($user) {
                $message->to($user['to']);
                $message->subject('forgot_password');
            });
            return response()->json([
                'status' => 'success',
                'msg' => 'please check your email'
            ]);
        } else {
            return response()->json([
                'status' => 'error',
                'msg' => 'this email not exist in database'
            ]);
        }
    }
    // forgot password change
    public function forgot_password_change(Request $request, $id)
    {
        $data = DB::table('customers')
            ->where(['rand_id' => $id])
            ->where(['customer_is_forgot_password' => 1])
            ->get();
        if (isset($data[0])) {
            $request->session()->put('forgot_pass_user_id', $data[0]->customer_id);
            return view('front_end.forgot_password_change');
        } else {
            return redirect('/');
        }
    }
    // forgot password change
    public function forgot_password_process(Request $request)
    {
        // update forgot password
        $data = DB::table('customers')
            ->where(['customer_id' => $request->session()->get('forgot_pass_user_id')])
            ->update([
                'rand_id' => 0,
                'customer_is_forgot_password' => 0,
                'customer_password' => Crypt::encrypt($request->customer_password_change),
            ]);
        // return msg
        return response()->json([
            'status' => 'success',
            'msg' => 'your password has been change'
        ]);
    }
    // checkout
    public function checkout(Request $request)
    {
        // 1 check cart data
        $cart_data['cart_data'] = cart_record_count();

        if (isset($cart_data['cart_data'][0])) {
            // check session
            if ($request->session()->has('customer_login')) {
                $u_id = $request->session()->get('customer_id');
                // user data retive form customers table
                $user_info = DB::table('customers')
                    ->where(['customer_id' => $u_id])
                    ->get();

                // patch data in value
                $cart_data['customers']['customer_name'] = $user_info[0]->customer_name;
                $cart_data['customers']['customer_email'] = $user_info[0]->customer_email;
                $cart_data['customers']['customer_mobile'] = $user_info[0]->customer_mobile;
                $cart_data['customers']['customer_city'] = $user_info[0]->customer_city;
                $cart_data['customers']['customer_state'] = $user_info[0]->customer_state;
                $cart_data['customers']['customer_zip'] = $user_info[0]->customer_zip;
                $cart_data['customers']['customer_address'] = $user_info[0]->customer_address;
            } else {
                // empty value
                $cart_data['customers']['customer_name'] = '';
                $cart_data['customers']['customer_email'] = '';
                $cart_data['customers']['customer_mobile'] = '';
                $cart_data['customers']['customer_city'] = '';
                $cart_data['customers']['customer_state'] = '';
                $cart_data['customers']['customer_zip'] = '';
                $cart_data['customers']['customer_address'] = '';
            }
        } else {
            return redirect('/');
        }
        // coupon code
        return view('front_end.checkout', $cart_data);
    }
    //apply_coupon_code
    public function apply_coupon_code(Request $request)
    {
        $arr = coupon_code_data($request->coupon_code);

        $arr = json_decode($arr, true);
        return response()->json([
            'status' => $arr['status'],
            'msg' => $arr['msg'],
            'total_price' => $arr['total_price'],
        ]);
    }
    //remove_coupon_code
    public function remove_coupon_code(Request $request)
    {
        $total_price = 0;
        // 1 retrive coupon data
        $data = DB::table('coupons')
            ->where(['code' => $request->coupon_code])
            ->get();

        $count = cart_record_count();
        $total_price = 0;
        foreach ($count as $list) {
            $total_price = $total_price + ($list->qty * $list->price);
        }

        return response()->json([
            'status' => 'success',
            'msg' => 'coupon code has been remove',
            'total_price' => $total_price
        ]);
    }
    //place_order
    public function place_order(Request $request)
    {

        // for intamojo this empty url
        $payment_url = '';
        $arr = coupon_code_data($request->coupon_code);

        // for guest user
        if (!$request->session()->has('customer_login')) {

            //   make validator
            $valid = validator::make($request->all(), [
                'customer_name' => 'required',
                'customer_email' => 'required|email|unique:customers,customer_email',
                'customer_mobile' => 'required|numeric',
            ]);
            if (!$valid->passes()) {

                $status = 'error';
                $msg = 'this email already exist';

                return response()->json([
                    'status' => $status,
                    'msg' => $msg,
                ]);
            } else {
                // resgister guest user
                // insert data
                $rand_id = rand(111111111, 999999999);
                $arr = [
                    'customer_name' => $request->customer_name,
                    'customer_email' => $request->customer_email,
                    'customer_mobile' => $request->customer_mobile,
                    'customer_address' => $request->customer_address,
                    'customer_city' => $request->customer_city,
                    'customer_state' => $request->customer_state,
                    'customer_zip' => $request->customer_zip,
                    'customer_is_varify' => 1,
                    'customer_password' => Crypt::encrypt($rand_id),
                    'rand_id' => 0,
                    'created_at' => date('Y-m-d h:i:s'),
                    'updated_at' => date('Y-m-d h:i:s'),
                ];
            
                if (empty($arr)) {
                    $status = "error";
                    $msg = "please insert your detaill address";
                } else {


                    $user_id = DB::table('customers')->insertGetId($arr);
                    // atuo login
                    // set session
                    $request->session()->put('customer_login', true);
                    $request->session()->put('customer_id', $user_id);
                    $request->session()->put('customer_name', $request->customer_name);
                    // update cart table
                    $temp_id = getUserTempId();
                    DB::table('cart')
                        ->where([
                            'user_type' => 'not_reg',
                            'user2_id' => $temp_id
                        ])
                        ->update([
                            'user_type' => 'reg',
                            'user2_id' =>  $user_id
                        ]);
                    // send email to user to find out password
                    // send email
                    $data = ['customer_name' => $request->customer_name, 'customer_password' => $rand_id];
                    $user['to'] = $request->customer_email;
                    mail::send('front_end/send_password', $data, function ($message) use ($user) {
                        $message->to($user['to']);
                        $message->subject('YOUR PASSWORD');
                    });
                }
            }
        }


        // for register user
        if ($request->session()->has('customer_login')) {

            $user_id = $request->session()->get('customer_id');
            // form requests
            $customer_id = $user_id;
            $customer_name = $request->customer_name;
            $customer_email = $request->customer_email;
            $customer_mobile = $request->customer_mobile;
            $customer_address = $request->customer_address;
            $customer_city = $request->customer_city;
            $customer_state = $request->customer_state;
            $customer_zip = $request->customer_zip;
            $coupon_code = $request->coupon_code;
            $payment_type = $request->payment_type;
            //cart amount
            $count = cart_record_count();
            $total_price = 0;
            foreach ($count as $list) {
                $total_price = $total_price + ($list->qty * $list->price);
            }
            //check coupon code
            $arr = coupon_code_data($request->coupon_code);
            $arr = json_decode($arr, true);

            if ($arr['total_price']) {
                $total_price = $arr['total_price'];
            } else {
                $total_price = 0;
                foreach ($count as $list) {
                    $total_price = $total_price + ($list->qty * $list->price);
                }
            }
            // retive data from coupon code table
            $data = DB::table('coupons')
                ->where(['coupon_status' => 1])
                ->get();
            foreach ($data as $list) {
                if ($list->code != $request->coupon_code) {
                    $coupon_code = "NULL";
                } else {
                    $coupon_code = $request->coupon_code;
                }
            }

            // 1 array for insert
            $arr = [
                'customer_id' => $customer_id,
                'customer_name' => $customer_name,
                'customer_email' => $customer_email,
                'customer_mobil' => $customer_mobile,
                'customer_address' => $customer_address,
                'customer_city' => $customer_city,
                'customer_state' => $customer_state,
                'customer_zip_code' => $customer_zip,
                'coupon_code' => $coupon_code,
                'payment_type' => $payment_type,
                'payment_status' => 'pending',
                'order_status' => 1,
                'total_amt' => $total_price,
                'created_at' => date('Y-m-d h:i:s'),
                'updated_at' => date('Y-m-d h:i:s'),
            ];
            $order_id = DB::table('orders')->insertGetId($arr);
            if ($order_id > 0) {
                // 2  insert cart data into order detail table
                foreach ($count as $list) {
                    $arr2 = [
                        "orders_id" => $order_id,
                        "product_id" => $list->product_id,
                        "product_name" => $list->product_name,
                        "product_attr_id" => $list->id,
                        "price" => $list->price,
                        "size" => $list->size,
                        "colour" => $list->colour,
                        "qty" => $list->qty,
                    ];
                    // insert
                    DB::table('order_detail')->insertGetId($arr2);
                }


                // payment gateway
                if ($request->payment_type == 'gateway') {
                    // $final_amt=$totalPrice-$coupon_value;
                    $ch = curl_init();
                    curl_setopt($ch, CURLOPT_URL, 'https://test.instamojo.com/api/1.1/payment-requests/');
                    curl_setopt($ch, CURLOPT_HEADER, FALSE);
                    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
                    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
                    curl_setopt(
                        $ch,
                        CURLOPT_HTTPHEADER,
                        array(
                            "X-Api-Key:test_972f540d82858446282f1e327cf",
                            "X-Auth-Token:test_fac8ae76dc8ee981cc2da724fa1"
                        )
                    );
                    $payload = array(
                        'purpose' => 'Buy Product',
                        'amount' => $total_price,
                        'phone' => $customer_mobile,
                        'buyer_name' => $customer_name,
                        'redirect_url' => 'http://127.0.0.1:8000/instamojo_payment_redirect',
                        'send_email' => true,
                        'send_sms' => true,
                        'email' => $customer_email,
                        'allow_repeated_payments' => false
                    );
                    curl_setopt($ch, CURLOPT_POST, true);
                    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($payload));
                    $response = curl_exec($ch);
                    curl_close($ch);
                    $response = json_decode($response);

                    if (isset($response->payment_request->id)) {
                        $txn_id = $response->payment_request->id;
                        $payment_status = "success";
                        DB::table('orders')
                            ->where(['order_id' => $order_id])
                            ->update([
                                'txn_id' => $txn_id,
                                'payment_status' => $payment_status,
                            ]);
                        $payment_url = $response->payment_request->longurl;
                    } else {
                        $msg = "";
                        foreach ($response->message as $key => $val) {
                            $msg .= strtoupper($key) . ": " . $val[0] . '<br/>';
                        }
                        return response()->json(['status' => 'error', 'msg' => $msg, 'payment_url' => $payment_url]);
                    }
                }

                // ORDER STATUS UPDATE
                // 2  insert  data into order_status table
                $arr1 = [
                    "orders_status" => "placed",
                    "order_status_no" => $order_id,
                    'created_at' => date('Y-m-d '),
                    'updated_at' => date('Y-m-d '),
                ];
                // update product qty
                $product_id = $request->product_id;
                $cart_qty = $request->product_qty;
                $product_qty = $request->cart_qty;
                foreach ($product_id as $key => $value) {
                    $product_attr['product_id'] = $product_id[$key];
                    $cart_qty['qty'] = $cart_qty[$key];
                    $product_qty['product_id'] = $product_qty[$key];
                    $qty =   $cart_qty['qty'] = $cart_qty[$key] -  $product_qty['product_id'] = $product_qty[$key];
                    //   product_attr table data update
                    DB::table('product_attributes')
                        ->where(['product_id' => $product_attr['product_id']])
                        ->update(['quantity' =>  $qty]);
                }
                // insert
                DB::table('order_status')->insertGetId($arr1);

                // 3 delete this from cart table
                DB::table('cart')
                    ->where(['user2_id' => $user_id, 'user_type' => 'reg'])
                    ->delete();

                $status = "success";
                $msg = "order placed";
            } else {
                $status = "error";
                $msg = "order faild";
            }
            if ($msg = "order placed") {
                $status = "success";
                $msg = "your order has been placed thank you !!";
            }

            return response()->json([
                'status' => $status,
                'msg' => $msg,
                'payment_url' => $payment_url
            ]);
        }
    }
    // cod order placed
    public function order_placed(Request $request)
    {
        if ($request->session()->has('order_id')) {
            return view('front_end.order_placed');
        } else {
            return redirect('/');
        }
    }
    // instamojo_payment_redirect
    public function instamojo_payment_redirect(Request $request)
    {
        // check payement request
        if ($request->get('payment_request_id')) {

            DB::table('orders')
                ->where(['txn_id' => $request->get('payment_request_id')])
                ->update([
                    'payment_id' =>  $request->get('payment_id'),
                    'payment_status' =>  $request->get('payment_status'),
                ]);
            return view('front_end.order_placed');
        } else {
            die('something wrong');
        }
    }
    // my orders
    public function my_order(Request $request)
    {

        $data['orders'] = DB::table('orders')
            ->leftJoin('order_status', 'order_status.id', '=', 'orders.order_id')
            ->select('orders.*', 'order_status.orders_status')
            ->where(['customer_id' => session('customer_id')])
            ->get();
        return view('front_end.my_order', $data);
    }
    // my order detail
    public function my_order_detail(Request $request, $id)
    {


        $data['orders'] = DB::table('orders')
            ->leftJoin('order_status', 'order_status.id', '=', 'orders.order_id')
            ->leftJoin('order_detail', 'order_detail.orders_id', '=', 'orders.order_id')
            ->leftJoin('products', 'products.product_id', '=', 'order_detail.product_id')
            ->where(['customer_id' => session('customer_id')])
            ->where(['order_id' => $id])
            ->select('orders.*', 'order_status.orders_status', 'order_detail.*', 'products.product_image')
            ->get();
        return view('front_end.my_order_detail', $data);
    }
    //product review
    public function product_review(Request $request)
    {

        $uid = $request->session()->get('customer_id');
        $customer_name = $request->session()->get('customer_name');

        $data = DB::table('orders')
            ->leftJoin('order_detail', 'order_detail.orders_id', '=', 'orders.order_id')
            ->where(['product_id' => $request->product_id])
            ->where(['customer_id' => $uid])
            ->get();



        if ($request->session()->get('customer_login')) {
            if (empty($data[0])) {
                $status = "p_error";
                $msg = "please  first buy this product after that  to submit your review !!";
                return response()->json([
                    'status' => $status,
                    'msg' => $msg,
                ]);
                die();
            }
            $data = date('Y-m-d h:i:s');
            $arr = [
                "customer_id" => $uid,
                "product_id" => $request->product_id,
                "rating" => $request->rating,
                "review" => $request->product_review,
                "status" => 1,
                "created_at" => $data,
                "updated_at" =>  $data,
            ];

            DB::table('product_review')->insert($arr);
            $status = "p_success";
            $msg = "thank you for your review";
        } else {
            $status = "p_error";
            $msg = "please login first to submit your review";
        }
        return response()->json([
            'status' => $status,
            'msg' => $msg,
            'product_review' => $request->product_review,
            'rating' => $request->rating,
            'customer_name' => $customer_name,
            'date' => $data,
        ]);
    }
}
