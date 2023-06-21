<?php

namespace App\Http\Controllers\back_end;

use App\Http\Controllers\Controller;
use App\Models\back_end\product_model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;

class product_controller extends Controller
{
    // product table
    public function product_table()
    {
        $data = product_model::all();
        return view('back_end.product', compact('data'));
    }
    //manage_product
    public function manage_product( $product_id = '')
    {
        
        if ($product_id > 0) {
            $arr = product_model::where(['product_id' => $product_id])->get();
            $row['product_id'] = $arr['0']->product_id;
            $row['category_id'] = $arr['0']->category_id;
            $row['product_name'] = $arr['0']->product_name;
            $row['model'] = $arr['0']->model;
            $row['brand'] = $arr['0']->brand;
            $row['product_image'] = $arr['0']->product_image;
            $row['short_desc'] = $arr['0']->short_desc;
            $row['desc'] = $arr['0']->desc;
            $row['keywords'] = $arr['0']->keywords;
            $row['technical_specification'] = $arr['0']->technical_specification;
            $row['uses'] = $arr['0']->uses;
            $row['warranty'] = $arr['0']->warranty;
            $row['is_tranding'] = $arr['0']->is_tranding;
            $row['is_discounted'] = $arr['0']->is_discounted;
            $row['is_featured'] = $arr['0']->is_featured;
            $row['is_promo'] = $arr['0']->is_promo;
            $row['tax_type'] = $arr['0']->tax_type;
            $row['tax'] = $arr['0']->tax;
            $row['lead_time'] = $arr['0']->lead_time;

            // for populate product attribute data 
            $row['product_attr'] = DB::table('product_attributes')->where(['product_id' => $product_id])->get();
            // for populate product images attribute data 
            $row['productImagesArr'] = DB::table('product_images')->where(['product_id' => $product_id])->get();
        } else {

            $row['product_id'] = '';
            $row['category_id'] = '';
            $row['product_name'] = '';
            $row['model'] = '';
            $row['brand'] = '';
            $row['product_image'] = '';
            $row['short_desc'] = '';
            $row['desc'] = '';
            $row['keywords'] = '';
            $row['technical_specification'] = '';
            $row['uses'] = '';
            $row['warranty'] = '';
            $row['is_tranding'] = '';
            $row['is_discounted'] = '';
            $row['is_featured'] = '';
            $row['is_promo'] = '';
            $row['tax_type'] = '';
            $row['tax'] = '';
            $row['lead_time'] = '';

            // for product attribute data declar empty
            $row['product_attr']['0']['id'] = '';
            $row['product_attr']['0']['product_id'] = '';
            $row['product_attr']['0']['sku'] = '';
            $row['product_attr']['0']['mrp'] = '';
            $row['product_attr']['0']['price'] = '';
            $row['product_attr']['0']['qty'] = '';
            $row['product_attr']['0']['size_id'] = '';
            $row['product_attr']['0']['colour_id'] = '';
            // for product attribute images data declar empty
            $row['productImagesArr']['0']['id'] = '';
            $row['productImagesArr']['0']['product_images'] = '';
        }
        // show colour,size.category,and brand dropdown in product form
        $row['cat'] = DB::table('categories')->where(['status' => 1])->get();
        $row['colour'] = DB::table('colours')->where(['colour_status' => 1])->get();
        $row['size'] = DB::table('sizes')->where(['size_status' => 1])->get();
        $row['brands'] = DB::table('brands')->where(['brand_status' => 1])->get();
        return view('back_end.manage_product', $row);
    }
    // save product
    public function save_product(Request $request)
    {
       
        $product_id = $request->post('product_id');
        // for update data
        if ($product_id > 0) {
            $row = product_model::find($product_id);
            $msg = 'product_data updated succesfuly';
        } else {
            // for insert data
            $request->validate([
                'product_name' => 'required|unique:products',
                'model' => 'required',
                'brand' => 'required',
                'short_desc' => 'required',
                'desc' => 'required',
                'keywords' => 'required',
                'technical_specification' => 'required',
                'uses' => 'required',
                'warranty' => 'required',
                'images' => 'required',
                // 'product_image' => 'required|mimes:png,jpg,jpeg',
            ]);
            $row = new product_model();
            $msg = 'product_data inserted succesfuly';
        }
        // image code
        if ($request->hasFile('product_image')) {
            // delete old image
            $old_image = 'back_end/product/' . $row->product_image;
            if (File::exists($old_image)) {
                File::delete($old_image);
            }
            // save and move image to forlder
            $file = $request->file('product_image');
            $ext = $file->getClientOriginalExtension();
            $image_new_name = time() . '.' . $ext;
            $file->move('back_end/product', $image_new_name);
            $row->product_image = $image_new_name;
        }
        // save / update
        $row->category_id = $request->post('category_id');
        $row->product_name = $request->post('product_name');
        $row->model = $request->post('model');
        $row->brand = $request->post('brand');
        $row->short_desc = $request->post('short_desc');
        $row->desc = $request->post('desc');
        $row->keywords = $request->post('keywords');
        $row->technical_specification = $request->post('technical_specification');
        $row->uses = $request->post('uses');
        $row->warranty = $request->post('warranty');
        $row->is_tranding = $request->post('is_tranding');
        $row->is_discounted = $request->post('is_discounted');
        $row->is_featured = $request->post('is_featured');
        $row->is_promo = $request->post('is_promo');
        $row->tax_type = $request->post('tax_type');
        $row->tax = $request->post('tax');
        $row->lead_time = $request->post('lead_time');
        $row->save();
        $pid = $row->product_id;
        ////////////////////////// 2 ////////////////////////////////////
        // product attributes
        $attr_id = $request->post('attr_id');
        $skuArr = $request->post('sku');
        $mrpArr = $request->post('mrp');
        $priceArr = $request->post('price');
        $qtyArr = $request->post('qty');
        $sizeArr = $request->post('size_id');
        $colourArr = $request->post('colour_id');

        // take foreach loop
        foreach ($attr_id as $key => $value) {
            $product_attr['product_id'] = $pid;
            $product_attr['id'] = $attr_id[$key];
            $product_attr['sku'] = $skuArr[$key];
            $product_attr['mrp'] = $mrpArr[$key];
            $product_attr['price'] = $priceArr[$key];
            $product_attr['quantity'] = $qtyArr[$key];
            $product_attr['size_id'] = $sizeArr[$key];
            $product_attr['colour_id'] = $colourArr[$key];
            // atrribute image code
            if ($request->hasFile("attr_image.$key")) {
                $row['row'] = DB::table('product_attributes')->where(['id' => $attr_id])->get();
                // delete old image
                $old_image = 'back_end/product_attribute/' . $row->attr_image;
                if (File::exists($old_image)) {
                    File::delete($old_image);
                }
                // save and move image to folder
                $random = rand('111111111', '999999999');
                $file = $request->file("attr_image.$key");
                $ext = $file->getClientOriginalExtension();
                $image_new_name = $random . '.' . $ext;
                $file->move('back_end/product_attribute', $image_new_name);
                $product_attr['attr_image'] = $image_new_name;
            }
            // save or update in attribute table
            if ($product_id != '') {
                // update
                DB::table('product_attributes')->where(['id' => $attr_id[$key]])->update($product_attr);
            } else {
                // insert
                DB::table('product_attributes')->insert($product_attr);
            }
        }
        // end product attributes
        ////////////////////////// 3 //////////////////////////////////////
        /*Product Images Start*/
        $piidArr = $request->post('piid');
        foreach ($piidArr as $key => $val) {
            $productImageArr['product_id'] = $pid;
            if ($request->hasFile("images.$key")) {
                $rand = rand('111111111', '999999999');
                $images = $request->file("images.$key");
                $ext = $images->extension();
                $image_name = $rand . '.' . $ext;
                $request->file("images.$key")->move('back_end/product_images', $image_name);
                $productImageArr['product_images'] = $image_name;

                if ($piidArr[$key] != '') {
                    DB::table('product_images')->where(['id' => $piidArr[$key]])->update($productImageArr);
                } else {
                    DB::table('product_images')->insert($productImageArr);
                }
            }
            /*Product Images End*/
        }
        return redirect('product')->with('msg', $msg);
    }
    // delete product
    public function delete_product($product_id)
    {
        $row = product_model::find($product_id);
        // old image delete from product folder
        $old_image = 'back_end/product/' . $row->product_image;
        if (File::exists($old_image)) {
            File::delete($old_image);
        }
        $row->delete();
        // delete data from atrrtibute table
        DB::table('product_attributes')->where(['product_id' => $product_id])->delete();
        return redirect('product')->with('msg', 'product data deleted');
    }
    // remove attributr box
    public function delete_product_attr($attr_id)
    {
        DB::table('product_attributes')->where(['id' => $attr_id])->delete();
        return back();
    }
    // remove delete product images box
    public function delete_product_images($id)
    {
        DB::table('product_images')->where(['id' => $id])->delete();
        return back();
    }
    // product status 
    public function product_status($product_status, $product_id)
    {
        $row = product_model::find($product_id);
        $row->product_status = $product_status;
        $row->save();
        if ($product_status == 1) {
            return redirect('product')->with('msg', 'product status Active');
        } else {
            return redirect('product')->with('msg', 'product status Deactive');
        }
    }
}
