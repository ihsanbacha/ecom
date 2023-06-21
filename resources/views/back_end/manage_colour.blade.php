@extends('back_end.layout');
@section('page_title','Colour form')
@section('colour_select','active')
@section('container')
        <!-- END MENU SIDEBAR-->
         <div class="page-container">

            <div class="main-content">
                <div class="section__content section__content--p30">
                    
                    <div class="container-fluid ">
                       <h1>MANAGE colour</h1>
                       <div class="row m-t-30">
                        <div class="col-md-2"></div>
                        <div class="col-md-8 col-lg-8">
                            <div class="card">
                                <div class="card-header text-center"> colour</div>
                                <div class="card-body">
                                    <form action="{{Route('save.colour')}}" method="post" >
                                        @csrf
                                        <div class="form-group">
                                            <label for="">colour</label>
                                            <input type="text" class="form-control" name="colour" value="{{$colour}}" id="">
                                            @error('colour')
                                              <div class="alert alert-danger"> {{$message}}</div>
                                            @enderror
                                            <input type="hidden" class="form-control" name="colour_id" value="{{$colour_id}}" id="">
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
