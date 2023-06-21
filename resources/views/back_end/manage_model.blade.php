@extends('back_end.layout');
@section('page_title','Category form')
@section('category_select','active')
@section('container')
        <!-- END MENU SIDEBAR-->
         <div class="page-container">

            <div class="main-content">
                <div class="section__content section__content--p30">
                    
                    <div class="container-fluid ">
                       <h1>MANAGE model</h1>
                       <div class="row m-t-30">
                        <div class="col-md-2"></div>
                        <div class="col-md-8 col-lg-8">
                            <div class="card">
                                <div class="card-header text-center"> model</div>
                                <div class="card-body">
                                    <form action="{{Route('save.model')}}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        
                                       
                                        <div class="form-group">
                                            <label for=""> Upload image </label>
                                           
                                            <input type="file" name="image[]" value="" class="form-control" id="" multiple>
                                            {{-- @error('image')
                                            <div class="alert alert-danger"> {{$message}}</div>
                                            @enderror --}}
                                            {{-- @if($cat_id)
                                            <img src="{{url('back_end/category/'.$cat_image)}}" width="40px" height="40px" alt="">
                                            @endif --}}
  
                                        </div>
                                        <div class="form-group">
                                            
                                            <input type="submit" name="submit" class="form-control btn btn-primary" id="">
                                        </div>
                                    </form>
                                </div>
                            </div>
                            
                        </div>
                       </div>
                        <div class="row">
                            <div class="col-md-12">
                               
                            </div>
                        </div>
                       
                    </div>
                </div>
            </div>
                
         </div>

         @endsection  
