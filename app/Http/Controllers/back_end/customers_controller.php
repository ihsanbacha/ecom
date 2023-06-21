<?php

namespace App\Http\Controllers\back_end;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use App\Http\Controllers\Controller;
use App\Models\back_end\customers_model;

class customers_controller extends Controller
{
      //  customer table
      public function customer_table()
      {
          $data = customers_model::all();
          return view('back_end.customer', compact('data'));
      }
      // customer view
      public function manage_customer_view($c_id){
        $row = customers_model::find($c_id);
        return view('back_end.manage_customer_view', compact('row'));
      }
      //manage_customer
      public function manage_customer($customer_id = '')
      {
          if ($customer_id > 0) {
              $arr = customers_model::where(['customer_id' => $customer_id])->get();
              $row['customer_id'] = $arr['0']->customer_id;
              $row['customer_name'] = $arr['0']->customer_name;
              $row['customer_mobile'] = $arr['0']->customer_mobile;
              $row['customer_image'] = $arr['0']->customer_image;
              $row['customer_email'] = $arr['0']->customer_email;
              $row['customer_password'] = $arr['0']->customer_password;
              $row['customer_address'] = $arr['0']->customer_address;
              $row['customer_city'] = $arr['0']->customer_city;
              $row['customer_state'] = $arr['0']->customer_state;
              $row['customer_zip'] = $arr['0']->customer_zip;
              $row['customer_company'] = $arr['0']->customer_company;
             
            
             
          } else {
              $row['customer_id'] = '';
              $row['customer_name'] = '';
              $row['customer_mobile'] = '';
              $row['customer_image'] = '';
              $row['customer_email'] ='';
              $row['customer_password'] = '';
              $row['customer_address'] = '';
              $row['customer_city'] = '';
              $row['customer_state'] ='';
              $row['customer_zip'] = '';
              $row['customer_company'] = '';
             
           
            
          }
        
          return view('back_end.manage_customer', $row);
      }
  
      // save customer
      public function save_customer(Request $request)
      {
  
          $customer_id = $request->post('customer_id');
          if ($customer_id > 0) {
              $row = customers_model::find($customer_id);
              $msg = 'customer_data updated succesfuly';
          } else {
              $request->validate([
                  'customer_image' => 'required',
                  'customer_name' => 'required'
              ]);
              $row = new customers_model;
              $msg = 'customer data inserted succesfuly';
          }
          // image code
          if ($request->hasFile('customer_image')) {
              // delete old image
              $old_image = 'back_end/customer/' . $row->customer_image;
              if (File::exists($old_image)) {
                  File::delete($old_image);
              }
              // save and move image to forlder
              $file = $request->file('customer_image');
              $ext = $file->getClientOriginalExtension();
              $image_new_name = time() . '.' . $ext;
              $file->move('back_end/customer', $image_new_name);
              $row->customer_image = $image_new_name;
          }
  
          $row->customer_name = $request->post('customer_name');
          $row->customer_email = $request->post('customer_email');
          $row->customer_mobile = $request->post('customer_mobile');
          $row->customer_password = $request->post('customer_password');
          $row->customer_address = $request->post('customer_address');
          $row->customer_city = $request->post('customer_city');
          $row->customer_state = $request->post('customer_state');
          $row->customer_zip = $request->post('customer_zip');
          $row->customer_company = $request->post('customer_company');
         
          $row->save();
          return redirect('customer')->with('msg', $msg);
      }
      // delete customer
      public function delete_customer($customer_id)
      {
  
          $row = customers_model::find($customer_id);
          $old_image = 'back_end/customer/' . $row->customer_image;
          if (File::exists($old_image)) {
              File::delete($old_image);
          }
          $row->delete();
          return redirect('customer')->with('msg', 'data deleted');
      }
      // cat_status  
      public function customer_status($customer_status, $customer_id)
      {
          $row = customers_model::find($customer_id);
          $row->customer_status = $customer_status;
          $row->save();
          if ($customer_status == 1) {
              return redirect('customer')->with('msg', 'customer status Active');
          } else {
              return redirect('customer')->with('msg', 'customer status Deactive');
          }
      }
}
