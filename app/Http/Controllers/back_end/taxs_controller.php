<?php

namespace App\Http\Controllers\back_end;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use App\Models\back_end\taxs_model;
use App\Http\Controllers\Controller;

class taxs_controller extends Controller
{
      // taxs table
      public function taxs_table()
      {
          $data = taxs_model::all();
          return view('back_end.taxs', compact('data'));
      }
      //manage taxs
      public function manage_taxs($taxs_id = '')
      {
          if ($taxs_id > 0) {
              $arr = taxs_model::where(['taxs_id' => $taxs_id])->get();
              $row['taxs_id'] = $arr['0']->taxs_id;
              $row['taxs_desc'] = $arr['0']->taxs_desc;
              $row['taxs_value'] = $arr['0']->taxs_value;
             
          } else {
            $row['taxs_id'] ='';
            $row['taxs_desc'] ='';
            $row['taxs_value'] = '';
          }
       
          return view('back_end.manage_taxs', $row);
      }
  
      // save taxs
      public function save_taxs(Request $request)
      {
  
          $taxs_id = $request->post('taxs_id');
          if ($taxs_id > 0) {
              $row = taxs_model::find($taxs_id);
              $msg = 'taxs data updated succesfuly';
          } else {
              $request->validate([
                  'taxs_value' => 'required',
                  'taxs_desc' => 'required'
              ]);
              $row = new taxs_model;
              $msg = ' taxs data inserted succesfuly';
          }
        
  
          $row->taxs_desc = $request->post('taxs_desc');
          $row->taxs_value = $request->post('taxs_value');
          $row->save();
          return redirect('taxs')->with('msg', $msg);
      }
      // delete taxs
      public function delete_taxs($taxs_id)
      {
  
          $row = taxs_model::find($taxs_id);
        
          $row->delete();
          return redirect('taxs')->with('msg', 'taxs data deleted');
      }
      // taxs status  
      public function taxs_status($taxs_status, $taxs_id)
      {
          $row = taxs_model::find($taxs_id);
          $row->taxs_status = $taxs_status;
          $row->save();
          if ($taxs_status == 1) {
              return redirect('taxs')->with('msg', 'taxs status Active');
          } else {
              return redirect('taxs')->with('msg', 'taxs status Deactive');
          }
      }
}
