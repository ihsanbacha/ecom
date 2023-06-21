<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\back_end\admin_model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class admin_controller extends Controller
{
    public function login(){
        if(session('user_id')){
              return redirect('user');
        }else{
            return view('back_end.login');
        }
       
       }
    public function admin_auth(Request $request){
           
        $email = $request->post('email');
        $password = $request->post('password');
        $login = admin_model::where(['email' => $email])->first();

        if($login){
           if($login->status == 1){
             
            if(Hash::check($password, $login->password)){

                $request->session()->put('admin_login',true);
                $request->session()->put('user_id',$login->user_id);
               
                return redirect('user');
            }
            return redirect('login')->with('msg', 'enter correct password');
           }
           return redirect('login')->with('msg', 'this user are block');
        }
       return redirect('login')->with('msg', 'please enter correct email');
       }
          

}
