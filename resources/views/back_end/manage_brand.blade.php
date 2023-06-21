@extends('back_end.layout');
@section('page_title','brand form')
@section('brand_select','active')
@section('container')
        <!-- END MENU SIDEBAR-->
         <div class="page-container">
 
            <div class="main-content">
                <div class="section__content section__content--p30">
                    
                    <div class="container-fluid ">
                       <h1>MANAGE BRAND</h1>
                       <div class="row m-t-30">
                        <div class="col-md-2"></div>
                        <div class="col-md-8 col-lg-8">
                            <div class="card">
                                <div class="card-header text-center"> brand </div>
                                <div class="card-body">
                                    <form action="{{Route('save.brand')}}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <label for="">brand name</label>
                                            <input type="text" class="form-control" name="brand_name" value="{{$brand_name}}" id="">
                                            @error('brand_name')
                                              <div class="alert alert-danger"> {{$message}}</div>
                                            @enderror
                                            <input type="hidden" class="form-control" name="brand_id" value="{{$brand_id}}" id="">
                                        </div>

                                        <div class="form-group">
                                            <label for=""> brand image </label>
                                           
                                            <input type="file" name="brand_image" value="" class="form-control" id="">
                                            @error('brand_image')
                                            <div class="alert alert-danger"> {{$message}}</div>
                                            @enderror
                                            @if($brand_id)
                                            <img src="{{url('back_end/brand/'.$brand_image)}}" width="40px" height="40px" alt="">
                                            @endif
  
                                        </div>

                                        <div class="form-group">
                                            <label for=""> is_home </label>
                                            <select name="is_home" class="form-control" id="">
                                                @if ($is_home == 1)
                                                    <option value="1" selected>YES</option>
                                                    <option value="0" >NO</option>
                                                @else
                                                    <option value="1">YES</option>
                                                    <option value="0" selected>NO</option>
                                                @endif
                                            </select>
                                        </div>
                                        <br>
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
