<?php

namespace App\Http\Controllers\back_end;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use App\Http\Controllers\Controller;
use App\Models\back_end\brand_model;

class brand_controller extends Controller
{
       // brandtable
    public function brand_table()
    {
        $data = brand_model::all();
        return view('back_end.brand', compact('data'));
    }
    //manage_brand
    public function manage_brand($brand_id = '')
    {
        if ($brand_id > 0) {
            $arr = brand_model::where(['brand_id' => $brand_id])->get();
            $row['brand_id'] = $arr['0']->brand_id;
            $row['brand_name'] = $arr['0']->brand_name;
            $row['is_home'] = $arr['0']->is_home;
            $row['brand_image'] = $arr['0']->brand_image;
        } else {
            $row['brand_id'] = '';
            $row['brand_name'] = '';
            $row['brand_image'] = '';
            $row['is_home'] = '';
        }
      
        return view('back_end.manage_brand', $row);
    }

    // save brand
    public function save_brand(Request $request)
    {

        $brand_id = $request->post('brand_id');
        if ($brand_id > 0) {
            $row = brand_model::find($brand_id);
            $msg = 'brand data updated succesfuly';
        } else {
            $request->validate([
                'brand_image' => 'required',
                'brand_name' => 'required|unique:brands'
            ]);
            $row = new brand_model;
            $msg = 'brand data inserted succesfuly';
        }
        // image code
        if ($request->hasFile('brand_image')) {
            // delete old image
            $old_image = 'back_end/brand/' . $row->brand_image;
            if (File::exists($old_image)) {
                File::delete($old_image);
            }
            // save and move image to forlder
            $file = $request->file('brand_image');
            $ext = $file->getClientOriginalExtension();
            $image_new_name = time() . '.' . $ext;
            $file->move('back_end/brand', $image_new_name);
            $row->brand_image = $image_new_name;
        }

        $row->brand_name = $request->post('brand_name');
    
        $row->is_home = $request->post('is_home');
        $row->save();
        return redirect('brand')->with('msg', $msg);
    }
    // delete brand
    public function delete_brand($brand_id)
    {

        $row = brand_model::find($brand_id);
        $old_image = 'back_end/brand/' . $row->brand_image;
        if (File::exists($old_image)) {
            File::delete($old_image);
        }
        $row->delete();
        return redirect('brand')->with('msg', 'data deleted');
    }
    // brand status  
    public function brand_status($brand_status, $brand_id)
    {
        $row = brand_model::find($brand_id);
        $row->brand_status = $brand_status;
        $row->save();
        if ($brand_status == 1) {
            return redirect('brand')->with('msg', 'brand status Active');
        } else {
            return redirect('brand')->with('msg', 'brand status Deactive');
        }
    }

}
