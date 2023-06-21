<?php

namespace App\Http\Controllers\back_end;

use App\Http\Controllers\Controller;
use App\Models\back_end\user_model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class user_controller extends Controller
{
    // user table
    public function user_table()
    {
        $data = user_model::all();
        return view('back_end.user', compact('data'));
    }
    //manage_user
    public function manage_user($id = '')
    {
        if ($id > 0) {
            $arr = user_model::where(['user_id' => $id])->get();
            $row['user_id'] = $arr['0']->user_id;
            $row['f_name'] = $arr['0']->f_name;
            $row['l_name'] = $arr['0']->l_name;
            $row['email'] = $arr['0']->email;
            $row['password'] = $arr['0']->password;
            $row['user_image'] = $arr['0']->user_image;
        } else {
            $row['user_id'] = '';
            $row['f_name'] = '';
            $row['l_name'] = '';
            $row['email'] = '';
            $row['password'] = '';
            $row['user_image'] = '';
        }
        return view('back_end.manage_user', $row);
    }

    // save user
    public function save_user(Request $request)
    {

        $id = $request->post('user_id');
        $password = $request->post('password');
        $old_password = $request->post('old_password');

        if ($id > 0) {
            $row = user_model::find($id);
            $msg = 'data updated succesfuly';
        } else {
            $row = new user_model;
            $msg = 'data inserted succesfuly';
        }
        // image code
        if ($request->hasFile('user_image')) {
            // delete old image
            $old_image = 'back_end/user/' . $row->user_image;
            if (File::exists($old_image)) {
                File::delete($old_image);
            }
            // save and move image to forlder
            $file = $request->file('user_image');
            $ext = $file->getClientOriginalExtension();
            $image_new_name = time() . '.' . $ext;
            $file->move('back_end/user', $image_new_name);
            $row->user_image = $image_new_name;
        }
        // password 
        if (empty($password)) {
            $row->password = $old_password;
        } else {
            $row->password = Hash::make($password);
        }
        $row->f_name = $request->post('f_name');
        $row->l_name = $request->post('l_name');
        $row->email = $request->post('email');

        $row->save();

        return redirect('user')->with('msg', $msg);
    }
    // delete user
    public function delete_user($id)
    {

        $row = user_model::find($id);
        $old_image = 'back_end/user/' . $row->user_image;
        if (File::exists($old_image)) {
            File::delete($old_image);
        }
        $row->delete();
        return redirect('user')->with('msg', 'data deleted');
    }
    // status active
    public function status($status, $id)
    {
        $row = user_model::find($id);
        $row->status = $status;
        $row->save();
        if ($status == 1) {
            return redirect('user')->with('msg', 'status Active');
        } else {
            return redirect('user')->with('msg', 'status Deactive');
        }
    }
}
