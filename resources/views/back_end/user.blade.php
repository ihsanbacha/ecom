@extends('back_end.layout');

@section('page_title','USERS')
@section('user_select','active')

@section('container')
        <!-- END MENU SIDEBAR-->
        <div class="page-container">

            <div class="main-content">
                <div class="section__content section__content--p30">
                    
                    <button class="btn btn-primary float-right mr-4 "><a href="{{url('manage_user')}}"><h3>Add New User</h3></a></button>
                    <div class="container-fluid">
                       <h1>USERS </h1>
                       
                        <div class="row m-t-30">
                            <div class="col-md-12">
                                <!-- DATA TABLE-->
                                <div class="table-responsive m-b-40">
                                    <table class="content-table table table-borderless table-data3 table-hover">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>f_name</th>
                                                <th>l_name</th>
                                                <th>email</th>
                                                <th>image</th>

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
                                              @php
                                                  $count = 0;
                                              @endphp
                                            @foreach($data as $row)
                                            <tr>
                                              
                                                <td>{{$count++}}</td>
                                                <td>{{$row->f_name}}</td>
                                                <td>{{$row->l_name}}</td>
                                                <td>{{$row->email}}</td>
                                                <td><img src="{{url('back_end/user/'.$row->user_image)}}" height="40px" width="40px" alt=""></td>
                                              

                                                {{-- USER STATUS --}}
                                              <td>
                                               @if ($row->status == 1)
                                               <a href="status/0/{{$row->user_id}}" class="btn btn-success">Active</a>
                                               @elseif ($row->status == 0) 
                                               <a href="status/1/{{$row->user_id}}" class="btn btn-warning">DeActive</a>   
                                               @endif
                                            </td> 
                                            {{-- DELETE OR UPDATE --}}
                                                <td><a href="manage_user/{{$row->user_id}}" class="btn btn-primary">update</a></td>
                                                <td><a href="delete/{{$row->user_id}}" class="btn btn-danger" onclick="return chick_delete()" >delete</a></td>
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

        
 @endsection        

       
