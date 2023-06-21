<?php

use App\Http\Controllers\admin\admin_controller;
use App\Http\Controllers\back_end\category_controller;
use App\Http\Controllers\back_end\coupon_controller;
use App\Http\Controllers\back_end\colour_controller;
use App\Http\Controllers\back_end\size_controller;
use App\Http\Controllers\back_end\user_controller;
use App\Http\Controllers\back_end\product_controller;
use App\Http\Controllers\back_end\taxs_controller;
use App\Http\Controllers\back_end\brand_controller;
use App\Http\Controllers\back_end\customers_controller;
use App\Http\Controllers\back_end\banner_controller;
use App\Http\Controllers\back_end\order_controller;
use App\Http\Controllers\back_end\review_controller;
use App\Http\Controllers\front_end\front_controller;

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//login routes
Route::get('login', [admin_controller::class, 'login']);
Route::post('login', [admin_controller::class, 'admin_auth'])->name('admin.login');

// frontend routes
Route::get('/', [front_controller::class, 'index']);
Route::get('product_category/{cat_id}', [front_controller::class, 'product_category']);
Route::get('product_detail/{id}', [front_controller::class, 'product_detail']);
Route::get('/search/{search}', [front_controller::class, 'search']);
Route::get('cart', [front_controller::class, 'cart']);
Route::post('add_to_cart', [front_controller::class, 'add_to_cart']);
// customer rigister and logout system
Route::get('customer_register', [front_controller::class, 'customer_register']);
Route::post('customer_save', [front_controller::class, 'customer_save'])->name('save.customer');
Route::post('login_process', [front_controller::class, 'login_process'])->name('login.process');
Route::get('customer_logout', function () {
    session()->forget('customer_login');
    session()->forget('customer_id');
    session()->forget('customer_name');
    return redirect('/');
});
// email varification
Route::get('/varification/{id}', [front_controller::class, 'email_varification']);
// forgot paasword
Route::post('forgot_password', [front_controller::class, 'forgot_password']);
Route::post('forgot_password_process', [front_controller::class, 'forgot_password_process']);
Route::get('/forgot_password_change/{id}', [front_controller::class, 'forgot_password_change']);
// checkout
Route::get('checkout', [front_controller::class, 'checkout']);
// apply_coupon_code
Route::post('apply_coupon_code', [front_controller::class, 'apply_coupon_code']);
// remove_coupon_code
Route::post('remove_coupon_code', [front_controller::class, 'remove_coupon_code']);
// place order
Route::post('place_order', [front_controller::class, 'place_order']);
// order placed
Route::get('order_placed', [front_controller::class, 'order_placed']);
// product review
Route::post('product_review', [front_controller::class, 'product_review']);

// middleware
Route::group(['middleware' => 'user_auth'], function () {
    // my order
    Route::get('my_order', [front_controller::class, 'my_order']);
    Route::get('/my_order_detail/{id}', [front_controller::class, 'my_order_detail']);
});

// instamojo_payment_redirect
Route::get('instamojo_payment_redirect', [front_controller::class, 'instamojo_payment_redirect']);
// end frontend routes

// admin panel middleware
Route::group(['middleware' => 'admin_auth'], function () {

    // category routes
    Route::get('category', [category_controller::class, 'category_table']);
    Route::get('manage_category', [category_controller::class, 'manage_category']);
    Route::get('manage_category/{cat_id}', [category_controller::class, 'manage_category']);
    Route::post('manage_category', [category_controller::class, 'save_category'])->name('cat.save');
    Route::get('delete_category/{cat_id}', [category_controller::class, 'delete_category']);
    Route::get('cat_status/{cat_status}/{cat_id}', [category_controller::class, 'cat_status']);
    // user routes
    Route::get('user', [user_controller::class, 'user_table']);
    Route::get('manage_user', [user_controller::class, 'manage_user']);
    Route::get('manage_user/{id}', [user_controller::class, 'manage_user']);
    Route::post('manage_user', [user_controller::class, 'save_user'])->name('save.user');
    Route::get('delete/{id}', [user_controller::class, 'delete_user']);
    Route::get('status/{status}/{id}', [user_controller::class, 'status']);
    // coupon routes
    Route::get('coupon', [coupon_controller::class, 'coupon_table']);
    Route::get('manage_coupon', [coupon_controller::class, 'manage_coupon']);
    Route::get('manage_coupon/{coupon_id}', [coupon_controller::class, 'manage_coupon']);
    Route::post('manage_coupon', [coupon_controller::class, 'save_coupon'])->name('save.coupon');
    Route::get('delete_coupon/{coupon_id}', [coupon_controller::class, 'delete_coupon']);
    Route::get('coupon_status/{coupon_status}/{coupon_id}', [coupon_controller::class, 'coupon_status']);
    // size routes
    Route::get('size', [size_controller::class, 'size_table']);
    Route::get('manage_size', [size_controller::class, 'manage_size']);
    Route::get('manage_size/{size_id}', [size_controller::class, 'manage_size']);
    Route::post('manage_size', [size_controller::class, 'save_size'])->name('save.size');
    Route::get('delete_size/{size_id}', [size_controller::class, 'delete_size']);
    Route::get('size_status/{size_status}/{size_id}', [size_controller::class, 'size_status']);
    // size routes
    Route::get('colour', [colour_controller::class, 'colour_table']);
    Route::get('manage_colour', [colour_controller::class, 'manage_colour']);
    Route::get('manage_colour/{colour_id}', [colour_controller::class, 'manage_colour']);
    Route::post('manage_colour', [colour_controller::class, 'save_colour'])->name('save.colour');
    Route::get('delete_colour/{colour_id}', [colour_controller::class, 'delete_colour']);
    Route::get('colour_status/{colour_status}/{colour_id}', [colour_controller::class, 'colour_status']);
    //product routes
    Route::get('product', [product_controller::class, 'product_table']);
    Route::get('manage_product', [product_controller::class, 'manage_product']);
    Route::get('manage_product/{product_id}', [product_controller::class, 'manage_product']);
    Route::post('manage_product', [product_controller::class, 'save_product'])->name('save.product');
    Route::get('delete_product/{product_id}', [product_controller::class, 'delete_product']);
    Route::get('manage_product/delete_product_attr/{attr_id}', [product_controller::class, 'delete_product_attr']);
    Route::get('manage_product/delete_product_images/{id}', [product_controller::class, 'delete_product_images']);
    Route::get('product_status/{product_status}/{product_id}', [product_controller::class, 'product_status']);
    // taxs routes
    Route::get('taxs', [taxs_controller::class, 'taxs_table']);
    Route::get('manage_taxs', [taxs_controller::class, 'manage_taxs']);
    Route::get('manage_taxs/{taxs_id}', [taxs_controller::class, 'manage_taxs']);
    Route::post('manage_taxs', [taxs_controller::class, 'save_taxs'])->name('taxs.save');
    Route::get('delete_taxs/{taxs_id}', [taxs_controller::class, 'delete_taxs']);
    Route::get('taxs_status/{taxs_status}/{taxs_id}', [taxs_controller::class, 'taxs_status']);
    // customer routes
    Route::get('customer', [customers_controller::class, 'customer_table']);
    Route::get('manage_customer', [customers_controller::class, 'manage_customer']);
    Route::get('manage_customer/{customer_id}', [customers_controller::class, 'manage_customer']);
    Route::get('manage_customer_view/{c_id}', [customers_controller::class, 'manage_customer_view']);
    Route::post('manage_customer', [customers_controller::class, 'save_customer'])->name('customer.save');
    Route::get('delete_customer/{customer_id}', [customers_controller::class, 'delete_customer']);
    Route::get('customer_status/{customer_status}/{customer_id}', [customers_controller::class, 'customer_status']);
    // brand routes
    Route::get('brand', [brand_controller::class, 'brand_table']);
    Route::get('manage_brand', [brand_controller::class, 'manage_brand']);
    Route::get('manage_brand/{brand_id}', [brand_controller::class, 'manage_brand']);
    Route::post('manage_brand', [brand_controller::class, 'save_brand'])->name('save.brand');
    Route::get('delete_brand/{brand_id}', [brand_controller::class, 'delete_brand']);
    Route::get('brand_status/{brand_status}/{brand_id}', [brand_controller::class, 'brand_status']);
    // banner routes
    Route::get('banner', [banner_controller::class, 'banner_table']);
    Route::get('manage_banner', [banner_controller::class, 'manage_banner']);
    Route::get('manage_banner/{banner_id}', [banner_controller::class, 'manage_banner']);
    Route::post('manage_banner', [banner_controller::class, 'save_banner'])->name('save.banner');
    Route::get('delete_banner/{banner_id}', [banner_controller::class, 'delete_banner']);
    Route::get('banner_status/{banner_status}/{banner_id}', [banner_controller::class, 'banner_status']);
    // customer oders routes
    Route::get('show_customer_orders', [order_controller::class, 'show_customer_orders']);
    Route::get('show_customer_order_detail/{id}', [order_controller::class, 'show_customer_order_detail']);
    Route::get('update_order_status/{id}', [order_controller::class, 'update_order_status']);
    Route::post('update_order_status/{id}', [order_controller::class, 'update_order_status_save']);
    // customerer orders review routes customer_orders_review
    Route::get('customer_orders_review', [review_controller::class, 'customer_orders_review']);
    Route::get('review_status/{review_status}/{review_id}', [review_controller::class, 'review_status']);


    // logout
    Route::get('logout', function () {
        session()->forget('admin_login');
        session()->forget('user_id');
        return redirect('login');
    });
});
