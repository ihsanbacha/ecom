@extends('back_end.layout');

@section('page_title','size')
@section('size_select','active')
@section('container')
        <!-- END MENU SIDEBAR-->
        <div class="page-container">

            <div class="main-content">
                <div class="section__content section__content--p30">
                    
                    <button class="btn btn-primary float-right mr-4 "><a href="{{url('manage_size')}}"><h3>Add New size</h3></a></button>
                    <div class="container-fluid">
                       <h1>size</h1>
                       
                        <div class="row m-t-30">
                            <div class="col-md-12">
                                <!-- DATA TABLE-->
                                <div class="table-responsive m-b-40">
                                    <table class="content-table table table-borderless table-data3 table-hover">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>size</th>
                                               
                                                <th>status</th>
                                                <th>update</th>
                                                <th>delete</th>
                                                >
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

                                                <td>{{$row->size_id}}</td>
                                                <td>{{$row->size}}</td>
                                              

                                                {{-- USER STATUS --}}
                                              <td>
                                               @if ($row->size_status == 1)
                                               <a href="size_status/0/{{$row->size_id}}" class="btn btn-success">Active</a>
                                               @elseif ($row->size_status == 0) 
                                               <a href="size_status/1/{{$row->size_id}}" class="btn btn-warning">DeActive</a>   
                                               @endif
                                            </td> 
                                            {{-- DELETE OR UPDATE --}}
                                                <td><a href="manage_size/{{$row->size_id}}" class="btn btn-primary">update</a></td>
                                                <td><a href="delete_size/{{$row->size_id}}" class="btn btn-danger" >delete</a></td>
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

       
