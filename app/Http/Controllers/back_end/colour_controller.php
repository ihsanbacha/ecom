<?php

namespace App\Http\Controllers\back_end;

use App\Http\Controllers\Controller;
use App\Models\back_end\colour_model;
use Illuminate\Http\Request;

class colour_controller extends Controller
{
      // colour table
      public function colour_table()
      {
          $data = colour_model::all();
          return view('back_end.colour', compact('data'));
      }
      //manage colour
      public function manage_colour($colour_id = '')
      {
          if ($colour_id > 0) {
              $arr = colour_model::where(['colour_id' => $colour_id])->get();
              $row['colour_id'] = $arr['0']->colour_id;
              $row['colour'] = $arr['0']->colour;
          } else {
              $row['colour_id'] = '';
              $row['colour'] = '';
          
          }
          return view('back_end.manage_colour', $row);
      }
  
      // save colour
      public function save_colour(Request $request)
      {
  
          $colour_id = $request->post('colour_id');
  
          if ($colour_id > 0) {
              $row = colour_model::find($colour_id);
              $msg = 'colour data updated succesfuly';
          } else {
            $request->validate([
                'colour'=>'required|unique:colours',              
            ]);
              $row = new colour_model;
              $msg = 'colour data inserted succesfuly';
          }
      
          $row->colour = $request->post('colour');
        
          $row->save();
  
          return redirect('colour')->with('msg', $msg);
      }
      // delete colour
      public function delete_colour($colour_id)
      {
          $row = colour_model::find($colour_id);
          $row->delete();
          return redirect('colour')->with('msg', 'colour data deleted');
      }
      // colour status 
      public function colour_status($colour_status, $colour_id)
      {
          $row = colour_model::find($colour_id);
          $row->colour_status = $colour_status;
          $row->save();
          if ($colour_status == 1) {
              return redirect('colour')->with('msg', 'colour status Active');
          } else {
              return redirect('colour')->with('msg', 'colour status Deactive');
          }
      }
 }
