@extends('front_end.layout')
@section('container')

 {{-- checkout --}}
 <section id="checkout">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
         <div class="checkout-area">
           <form action="" id="form_place_order">
            @csrf
             <div class="row">
               <div class="col-md-8">
                 <div class="checkout-left">
                   <div class="panel-group" id="accordion">
                   <div class="cart-view-total">
                    <a href="" data-toggle="modal" data-target="#login-modal">Login</a>
                   </div>
                   <br>
                   OR
                     <!-- Billing Details -->
                     <div class="panel panel-default aa-checkout-billaddress">
                       <div class="panel-heading">
                         <h4 class="panel-title">
                           <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
                             User Details 
                           </a>
                         </h4>
                       </div>
                       <div id="collapseThree" class="panel-collapse collapse">
                         <div class="panel-body">
                           <div class="row">
                             <div class="col-md-12">
                               <div class="aa-checkout-single-bill">
                                 <input type="text" name="customer_name" value="{{$customers['customer_name']}}" placeholder="Name*" required>
                               </div>                             
                             </div>
                           </div>  
                           <div class="row">
                             <div class="col-md-6">
                               <div class="aa-checkout-single-bill">
                                 <input type="email" name="customer_email" value="{{$customers['customer_email']}}" placeholder="Email Address*"  required>
                               </div>                             
                             </div>
                             <div class="col-md-6">
                               <div class="aa-checkout-single-bill">
                                 <input type="tel" name="customer_mobile" value="{{$customers['customer_mobile']}}"  placeholder="Phone*"  required>
                               </div>
                             </div>
                           </div> 
                           <div class="row">
                             <div class="col-md-12">
                                <h4>Address:</h4>
                               <div class="aa-checkout-single-bill">
                                 <textarea cols="8" name="customer_address" rows="3"  required>{{$customers['customer_address']}}</textarea>
                               </div>                             
                             </div>                            
                           </div>   
                           <div class="row">
                            <div class="col-md-4">
                                <div class="aa-checkout-single-bill">
                                  <input type="text" name="customer_city"  value="{{$customers['customer_city']}}" placeholder="City / Town*"  required>
                                </div>
                              </div>
                             <div class="col-md-4">
                               <div class="aa-checkout-single-bill">
                                 <input type="text" value="{{$customers['customer_state']}}" name="customer_state" placeholder="State*"  required>
                               </div>                             
                             </div>
                             <div class="col-md-4">
                               <div class="aa-checkout-single-bill">
                                 <input type="text" name="customer_zip" value="{{$customers['customer_zip']}}"  placeholder="Postcode / ZIP*"  required>
                               </div>
                             </div>
                           </div>                                    
                         </div>
                       </div>
                     </div>
                   
                   </div>
                 </div>
               </div>
               <div class="col-md-4">
                 <div class="checkout-right">
                   <h4>Order Summary</h4>
                   <div class="aa-order-summary-area">
                     <table class="table table-responsive">
                       <thead>
                         <tr>
                           <th>Product</th>
                           <th>Total</th>
                         </tr>
                       </thead>
                       <tbody>
                        @php
                            $total_price=0;
                        @endphp
                        @foreach ($cart_data as $row )
                        <input type="hidden" name="product_id[]" value="{{$row->product_id}}">
                        <input type="hidden" name="cart_qty[]" value="{{$row->qty}}">
                        <input type="hidden" name="product_qty[]" value="{{$row->quantity}}">
 
                        @php
                        $total_price=$total_price+($row->price * $row->qty);
                       @endphp
                         <tr>
                           <td>{{$row->product_name}} <strong> x  {{$row->qty}}</strong>
                            <br>{{$row->colour}}
                            <br>{{$row->size}}
                          </td>
                           <td>Rs {{$row->price * $row->qty}}</td>
                         </tr>
                         @endforeach
                       </tbody>
                       <tfoot>
                          <tr class="hide show_coupon_box">
                           <th>coupon code    <a href="javascript:void(0)" onclick="remove_coupon_code()" class="remove_coupon_code">    Remove</a></th>
                           <td id="coupon_code_str">{{ $total_price }}</td>
                         </tr>
                          <tr class="">
                           <th>Total</th>
                           <td id="total_price">{{ $total_price }}</td>
                         </tr>
                       </tfoot>
                     </table>
                   </div>
                    <!-- Coupon section -->
                    <div class="panel panel-default aa-checkout-coupon">
                        <div class="panel-heading">
                          <h4 class="panel-title">
                            <a data-toggle="collapse" class="apply_cououn_code_box" data-parent="#accordion" href="#collapseOne">
                              Have a Coupon?
                            </a>
                          </h4>
                        </div>
                        <div id="collapseOne" class="panel-collapse collapse in">
                          <div class="panel-body">
                            <input type="text" name="coupon_code" id="coupon_code" placeholder="Coupon Code" class="aa-coupon-code apply_cououn_code_box">
                    
                            <input type="button" value="Apply Coupon" onclick="apply_coupon_code()" class="aa-browse-btn apply_cououn_code_box">
                            <div class="success_msg"></div>
                            <div class="error_msg"></div>
                          </div>
                          
                        </div>
                      </div>
                    
                   <h4>Payment Method</h4>
                   <div class="aa-payment-method">                    
                     <label for="cashdelivery"><input type="radio" name="payment_type" id="cod" value="cod" name="optionsRadios" checked=""> Cash on Delivery </label>
                     <label for="instamojo"><input type="radio" name="payment_type" id="instamojo" value="gateway" name="optionsRadios" > Via Instamojo </label>
                     
                     <input type="submit" value="Place Order"  id="place_order_btn" class="aa-browse-btn">                
                   </div>
                   <div class="order_msg"></div>
                   <div class="order_error_msg"></div>
                 </div> 
               </div>
             </div>
           
           </form>
          </div>
        </div>
      </div>
    </div>
  </section>
 {{-- end checkout --}}
@endsection
