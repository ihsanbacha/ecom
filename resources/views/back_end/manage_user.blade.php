@extends('back_end.layout');
@section('page_title','User Form')
@section('user_select','active')

@section('container')
        <!-- END MENU SIDEBAR-->
         <div class="page-container">

            <div class="main-content">
                <div class="section__content section__content--p30">
                    
                    <div class="container-fluid ">
                       <h1> MANAGE USER </h1>
                       <div class="row m-t-30">
                        <div class="col-md-2"></div>
                        <div class="col-md-8 col-lg-8">
                            <div class="card">
                                <div class="card-header text-center"> Resgisteration Form </div>
                                <div class="card-body">
                                    <form action="{{Route('save.user')}}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <label for="">first name</label>
                                            <input type="hidden" class="form-control" name="user_id" value="{{$user_id}}" id="">
                                            <input type="text" class="form-control" name="f_name" value="{{$f_name}}" id="">
                                        </div>
                                        <div class="form-group">
                                            <label for="">last name</label>
                                            <input type="text" class="form-control" name="l_name" value="{{$l_name}}" id="">
                                        </div>
                                      
                                        <div class="form-group">
                                            <label for="">email</label>
                                            <input type="text" class="form-control" name="email" value="{{$email}}" id="">
                                        </div>
                                      
                                        <div class="form-group">
                                            <label for="">password</label>
                                            <input type="text" class="form-control" name="password" value="" id="">
                                            <input type="hidden" class="form-control" name="old_password" value="{{$password}}" id="">
                                        </div>
                                      
                                        <div class="form-group">
                                            <label for=""> Upload image </label>
                                            <input type="file" name="user_image" class="form-control" id="">
                                            @if($user_id)
                                            <img src=" {{url('back_end/user/'.$user_image)}} " width="40px" height="40px" alt="">
                                            @endif
                                        </div>
                                        <div class="form-group">
                                           
                                            <input type="submit" name="submit" class="form-control btm btn-primary" id="">
                                        </div>
                                    </form>
                                </div>
                            </div>
                            
                        </div>
                       </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="copyright">
                                    <p>Copyright © 2018 Colorlib. All rights reserved. Template by <a href="https://colorlib.com">Colorlib</a>.</p>
                                </div>
                            </div>
                        </div>
                       
                    </div>
                </div>
            </div>
                
         </div>

         @endsection  
