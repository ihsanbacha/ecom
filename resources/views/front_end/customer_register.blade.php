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
                  <h4>Register</h4>
                  <form action="" id="form_rigister" class="aa-login-form">
                     @csrf
                     <label for="">name<span>*</span></label>
                     <input type="text" placeholder="name" name="customer_name" id="name">
                     <div id="customer_name_error" class="faild_error"></div>

                     <label for="">Email address<span>*</span></label>
                     <input type="email" placeholder=" email" name="customer_email" id="email">
                     <div id="customer_email_error" class="faild_error"></div>

                     <label for="">Mobile<span>*</span></label>
                     <input type="text" placeholder="Mobile number" name="customer_mobile" id="mobile">
                     <div id="customer_mobile_error" class="faild_error"></div>

                     <label for="">Password<span>*</span></label>
                     <input type="password" placeholder="Password" name="customer_password" id="password">
                     <div id="customer_password_error" class="faild_error"></div>
                     <button type="submit" id="btn_register" class="aa-browse-btn">Register</button> 
                   
                   </form>
                   
                 </div>
                 <div class="success_msg"></div>
               </div>
             </div>          
          </div>
        </div>
      </div>
    </div>
   
  </section>
@endsection
