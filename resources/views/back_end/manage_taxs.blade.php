@extends('back_end.layout');
@section('page_title','taxs form')
@section('taxs_select','active')
@section('container')
        <!-- END MENU SIDEBAR-->
         <div class="page-container">
 
            <div class="main-content">
                <div class="section__content section__content--p30">
                    
                    <div class="container-fluid ">
                       <h1>MANAGE TAXS </h1>
                       <div class="row m-t-30">
                        <div class="col-md-2"></div>
                        <div class="col-md-8 col-lg-8">
                            <div class="card">
                                <div class="card-header text-center"> taxs </div>
                                <div class="card-body">
                                    <form action="{{Route('taxs.save')}}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <label for="">title</label>
                                            <input type="text" class="form-control" name="taxs_desc" value="{{$taxs_desc}}" id="">
                                            @error('taxs_desc')
                                              <div class="alert alert-danger"> {{$message}}</div>
                                            @enderror
                                            <input type="hidden" class="form-control" name="taxs_id" value="{{$taxs_id}}" id="">
                                        </div>
                                        <div class="form-group">
                                            <label for="">value</label>
                                            <input type="text" class="form-control" name="taxs_value" value="{{$taxs_value}}" id="">
                                            @error('taxs_value')
                                              <div class="alert alert-danger"> {{$message}}</div>
                                            @enderror
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
