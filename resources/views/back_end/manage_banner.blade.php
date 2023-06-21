@extends('back_end.layout');
@section('page_title','banner form')
@section('banner_select','active')
@section('container')
        <!-- END MENU SIDEBAR-->
         <div class="page-container">
 
            <div class="main-content">
                <div class="section__content section__content--p30">
                    
                    <div class="container-fluid ">
                       <h1>MANAGE BANNER</h1>
                       <div class="row m-t-30">
                        <div class="col-md-2"></div>
                        <div class="col-md-8 col-lg-8">
                            <div class="card">
                                <div class="card-header text-center"> banner </div>
                                <div class="card-body">
                                    <form action="{{Route('save.banner')}}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <label for="">banner text</label>
                                            <input type="text" class="form-control" name="banner_text" value="{{$banner_text}}" id="">
                                            @error('banner_text')
                                              <div class="alert alert-danger"> {{$message}}</div>
                                            @enderror
                                            <input type="hidden" class="form-control" name="banner_id" value="{{$banner_id}}" id="">
                                        </div>
                                        <div class="form-group">
                                            <label for="">banner link</label>
                                            <input type="text" class="form-control" name="banner_link" value="{{$banner_link}}" id="">
                                            @error('banner_link')
                                              <div class="alert alert-danger"> {{$message}}</div>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for=""> Upload image </label>
                                            <input type="file" name="banner_image" value="" class="form-control" id="">
                                            @error('banner_image')
                                            <div class="alert alert-danger"> {{$message}}</div>
                                            @enderror
                                            @if($banner_id)
                                            <img src="{{url('back_end/banner/'.$banner_image)}}" width="40px" height="40px" alt="">
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
