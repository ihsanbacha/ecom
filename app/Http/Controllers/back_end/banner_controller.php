<?php

namespace App\Http\Controllers\back_end;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use App\Http\Controllers\Controller;
use App\Models\back_end\banner_model;

class banner_controller extends Controller
{
   // banner table
   public function banner_table()
   {
       $data = banner_model::all();
       return view('back_end.banner', compact('data'));
   }
   //manage banner
   public function manage_banner($banner_id = '')
   {
       if ($banner_id > 0) {
           $arr = banner_model::where(['banner_id' => $banner_id])->get();
           $row['banner_id'] = $arr['0']->banner_id;
           $row['banner_text'] = $arr['0']->banner_text;
           $row['banner_link'] = $arr['0']->banner_link;
           $row['banner_image'] = $arr['0']->banner_image;
       } else {
           $row['banner_id'] = '';
           $row['banner_text'] = '';
           $row['banner_link'] = '';
           $row['banner_image'] = '';
       
       }
       return view('back_end.manage_banner', $row);
   }

   // save banner
   public function save_banner(Request $request)
   {

       $banner_id = $request->post('banner_id');
       if ($banner_id > 0) {
           $row = banner_model::find($banner_id);
           $msg = 'banner data updated succesfuly';
       } else {
           $request->validate([
               'banner_image' => 'required',
               'banner_text' => 'required',
           ]);
           $row = new banner_model;
           $msg = 'banner data inserted succesfuly';
       }
       //banner image code
       if ($request->hasFile('banner_image')) {
           // delete old image
           $old_image = 'back_end/banner/' . $row->banner_image;
           if (File::exists($old_image)) {
               File::delete($old_image);
           }
           // save and move image to forlder
           $file = $request->file('banner_image');
           $ext = $file->getClientOriginalExtension();
           $image_new_name = time() . '.' . $ext;
           $file->move('back_end/banner', $image_new_name);
           $row->banner_image = $image_new_name;
       }

       $row->banner_text = $request->post('banner_text');
       $row->banner_link = $request->post('banner_link');
       $row->save();
       return redirect('banner')->with('msg', $msg);
   }
   // delete banner
   public function delete_banner($banner_id)
   {
       $row = banner_model::find($banner_id);
       $old_image = 'back_end/banner/' . $row->banner_image;
       if (File::exists($old_image)) {
           File::delete($old_image);
       }
       $row->delete();
       return redirect('banner')->with('msg', 'banner data deleted');
   }
   // banner_status  
   public function banner_status($banner_status, $banner_id)
   {
       $row = banner_model::find($banner_id);
       $row->banner_status = $banner_status;
       $row->save();
       if ($banner_status == 1) {
           return redirect('banner')->with('msg', 'banner status Active');
       } else {
           return redirect('banner')->with('msg', 'banner status Deactive');
       }
   }
}
