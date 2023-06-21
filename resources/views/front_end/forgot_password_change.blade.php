@extends('front_end.layout')
@section('container')
   
<section id="aa-myaccount">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
         <div class="aa-myaccount-area">         
             <div class="row">
                <div class="col-md-2"> </div>
               <div class="col-md-8">
                
                 <div class="aa-myaccount-register">                 
                  <h4>Change Password</h4>
                  <form action="" id="update_password" class="aa-login-form">
                     @csrf
                    
                     <label for=""> New Password <span>*</span></label>
                     <input type="password" placeholder="enter new Password" name="customer_password_change" id="password" required>
                     <div id="customer_password_error" class="faild_error"></div>
                     <button type="submit" id="btn_update_password" class="aa-browse-btn">Change</button> 
                   
                   </form>
                   
                 </div>
                 <div class="success_msg"></div><br>
                 <div>LOGIN: <a href="" data-toggle="modal" data-target="#login-modal"> Click her </a></div>
               </div>
             </div>          
          </div>
        </div>
      </div>
    </div>
   
  </section>
@endsection
