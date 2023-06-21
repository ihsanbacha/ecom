@extends('back_end.layout');
@section('page_title','Category form')
@section('category_select','active')
@section('container')
        <!-- END MENU SIDEBAR-->
         <div class="page-container">
 
            <div class="main-content">
                <div class="section__content section__content--p30">
                    
                    <div class="container-fluid ">
                       <h1>MANAGE CATEGORY</h1>
                       <div class="row m-t-30">
                        <div class="col-md-2"></div>
                        <div class="col-md-8 col-lg-8">
                            <div class="card">
                                <div class="card-header text-center"> CATEGORY</div>
                                <div class="card-body">
                                    <form action="{{Route('cat.save')}}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <label for="">title</label>
                                            <input type="text" class="form-control" name="cat_name" value="{{$cat_name}}" id="">
                                            @error('cat_name')
                                              <div class="alert alert-danger"> {{$message}}</div>
                                            @enderror
                                            <input type="hidden" class="form-control" name="cat_id" value="{{$cat_id}}" id="">
                                            <input type="hidden" class="form-control" name="parent_cat_id_0" value="0" id="">
                                        </div>


                                        <div class=" form-group">
                                            <label for="">select parent category</label>
                                            <select class="form-control" name="parent_cat_id" id="">
                                                <option value="">SELECT CATEGORY</option>
                                                @foreach ($cat as $data)
                                                    @if ($cat_id == $data->cat_id)
                                                        <option selected value="{{ $data->cat_id }} ">
                                                            {{ $data->cat_name }}</option>
                                                    @else
                                                        <option value="{{ $data->cat_id }}">{{ $data->cat_name }}
                                                        </option>
                                                    @endif
                                                @endforeach

                                            </select>
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
                                       
                                        <div class="form-group">
                                            <label for=""> Upload image </label>
                                           
                                            <input type="file" name="cat_image" value="" class="form-control" id="">
                                            @error('cat_image')
                                            <div class="alert alert-danger"> {{$message}}</div>
                                            @enderror
                                            @if($cat_id)
                                            <img src="{{url('back_end/category/'.$cat_image)}}" width="40px" height="40px" alt="">
                                            @endif
  
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
