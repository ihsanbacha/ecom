<?php

namespace App\Http\Controllers\back_end;

use App\Http\Controllers\Controller;
use App\Models\back_end\size_model;
use Illuminate\Http\Request;

class size_controller extends Controller
{
    // size table
    public function size_table()
    {
        $data = size_model::all();
        return view('back_end.size', compact('data'));
    }
    //manage_size
    public function manage_size($size_id = '')
    {
        if ($size_id > 0) {
            $arr = size_model::where(['size_id' => $size_id])->get();
            $row['size_id'] = $arr['0']->size_id;
            $row['size'] = $arr['0']->size;
          
         
        } else {
            $row['size_id'] = '';
            $row['size'] = '';
        
        }
        return view('back_end.manage_size', $row);
    }

    // save size
    public function save_size(Request $request)
    {

        $size_id = $request->post('size_id');

        if ($size_id > 0) {
            $row = size_model::find($size_id);
            $msg = 'size data updated succesfuly';
        } else {
          $request->validate([
              'size'=>'required',
              
          ]);
            $row = new size_model;
            $msg = 'size data inserted succesfuly';
        }
    
        $row->size = $request->post('size');
     

        $row->save();

        return redirect('size')->with('msg', $msg);
    }
    // delete size
    public function delete_size($size_id)
    {
        $row = size_model::find($size_id);
        $row->delete();
        return redirect('size')->with('msg', 'size data deleted');
    }
    // size status 
    public function size_status($size_status, $size_id)
    {
        $row = size_model::find($size_id);
        $row->size_status = $size_status;
        $row->save();
        if ($size_status == 1) {
            return redirect('size')->with('msg', 'size status Active');
        } else {
            return redirect('size')->with('msg', 'size status Deactive');
        }
    }
}
