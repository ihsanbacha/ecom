<?php

namespace App\Http\Controllers\back_end;

use App\Http\Controllers\Controller;
use App\Models\back_end\coupon_model;
use Illuminate\Http\Request;

class coupon_controller extends Controller
{ 
      // coupon table
      public function coupon_table()
      {
          $data = coupon_model::all();
          return view('back_end.coupon', compact('data'));
      }
      //manage_coupon
      public function manage_coupon($coupon_id = '')
      {
          if ($coupon_id > 0) {
              $arr = coupon_model::where(['coupon_id' => $coupon_id])->get();
              $row['coupon_id'] = $arr['0']->coupon_id;
              $row['title'] = $arr['0']->title;
              $row['code'] = $arr['0']->code;
              $row['value'] = $arr['0']->value;
              $row['type'] = $arr['0']->type;
              $row['min_order_amount'] = $arr['0']->min_order_amount;
              $row['is_one_time'] = $arr['0']->is_one_time;
           
          } else {
              $row['coupon_id'] = '';
              $row['title'] = '';
              $row['code'] = '';
              $row['value'] = '';
              $row['type'] ='';
              $row['min_order_amount'] ='';
              $row['is_one_time'] ='';
          
          }
          return view('back_end.manage_coupon', $row);
      }
  
      // save coupon
      public function save_coupon(Request $request)
      {
  
          $coupon_id = $request->post('coupon_id');
  
          if ($coupon_id > 0) {
              $row = coupon_model::find($coupon_id);
              $msg = 'coupon data updated succesfuly';
          } else {
            $request->validate([
                'title'=>'required',
                'value'=>'required',
                'code'=>'required|unique:coupons,code',
            ]);
              $row = new coupon_model;
              $msg = 'coupon data inserted succesfuly';
          }
      
          $row->title = $request->post('title');
          $row->code = $request->post('code');
          $row->value = $request->post('value');
          $row->type = $request->post('type');
          $row->min_order_amount = $request->post('min_order_amount');
          $row->is_one_time = $request->post('is_one_time');

          $row->save();
  
          return redirect('coupon')->with('msg', $msg);
      }
      // delete coupon
      public function delete_coupon($coupon_id)
      {
          $row = coupon_model::find($coupon_id);
          $row->delete();
          return redirect('coupon')->with('msg', 'coupon data deleted');
      }
      // coupon status 
      public function coupon_status($coupon_status, $coupon_id)
      {
          $row = coupon_model::find($coupon_id);
          $row->coupon_status = $coupon_status;
          $row->save();
          if ($coupon_status == 1) {
              return redirect('coupon')->with('msg', 'coupon status Active');
          } else {
              return redirect('coupon')->with('msg', 'coupon status Deactive');
          }
      }
}
