@extends('back_end.layout');

@section('page_title','coupon')
@section('coupon_select','active')
@section('container')
        <!-- END MENU SIDEBAR-->
        <div class="page-container">

            <div class="main-content">
                <div class="section__content section__content--p30">
                    
                    <button class="btn btn-primary float-right mr-4 "><a href="{{url('manage_coupon')}}"><h3>Add New coupon</h3></a></button>
                    <div class="container-fluid">
                       <h1>coupon</h1>
                       
                        <div class="row m-t-30">
                            <div class="col-md-12">
                                <!-- DATA TABLE-->
                                <div class="table-responsive m-b-40">
                                    <table class="content-table table table-borderless table-data3 table-hover">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>coupon_name</th>
                                                <th>coupon code</th>
                                                <th>value</th>
                                               
                                              
                                                <th>status</th>
                                                <th>update</th>
                                                <th>delete</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                              @if(session('msg'))
                                              <div class="alert alert-success">
                                                {{session('msg')}}
                                              </div>
                                              @endif
                                            @foreach($data as $row)
                                            <tr>

                                                <td>{{$row->coupon_id}}</td>
                                                <td>{{$row->title}}</td>
                                                <td>{{$row->code}}</td>
                                                <td>{{$row->value}}</td>

                                                {{-- USER STATUS --}}
                                              <td>
                                               @if ($row->coupon_status == 1)
                                               <a href="coupon_status/0/{{$row->coupon_id}}" class="btn btn-success">Active</a>
                                               @elseif ($row->coupon_status == 0) 
                                               <a href="coupon_status/1/{{$row->coupon_id}}" class="btn btn-warning">DeActive</a>   
                                               @endif
                                            </td> 
                                            {{-- DELETE OR UPDATE --}}
                                                <td><a href="manage_coupon/{{$row->coupon_id}}" class="btn btn-primary">update</a></td>
                                                <td><a href="delete_coupon/{{$row->coupon_id}}" class="btn btn-danger" onclick="return chick_delete()" >delete</a></td>
                                            </tr>
                                            @endforeach
                                           
                                        </tbody>
                                    </table>
                                </div>
                                <!-- END DATA TABLE-->
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="copyright">
                                  
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                
         </div>

        
 @endsection        

       
