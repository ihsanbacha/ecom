@extends('back_end.layout');

@section('page_title','Category')
@section('category_select','active')
@section('container')
    <div class="page-container">

        <div class="main-content">
            <div class="section__content section__content--p30">

                <button class="btn btn-primary float-right mr-4 "><a href="{{ url('manage_category') }}">
                        <h3>Add New Category</h3>
                    </a></button>
                <div class="container-fluid">
                    <h1> CATEGORY </h1>

                    <div class="row m-t-30">
                        <div class="col-md-12">
                            <!-- DATA TABLE-->
                            <div class="table-responsive m-b-40">
                                @if(session('msg'))      
                               <div class="alert alert-success">{{session('msg')}}</div>  
                                @endif
                                <table class="content-table table table-borderless table-data3 table-hover">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>cat_name</th>
                                            <th>cat_image</th>
                                            <th>status</th>
                                            <th>delete</th>
                                            <th>update</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $row)
                                            <tr>
                                                <td>{{ $row->cat_id }}</td>
                                                <td>{{ $row->cat_name }}</td>
                                                <td><img src="{{ url('back_end/category/' . $row->cat_image) }}"
                                                        width="40px" height="40px" alt=""></td>
                                                @if ($row->status == 1)
                                                    <td><a href="cat_status/0/{{ $row->cat_id }}"
                                                            class="btn btn-success">active</a></td>
                                                @elseif($row->status == 0)
                                                    <td><a href="cat_status/1/{{ $row->cat_id }}"
                                                            class="btn btn-warning">Deactive</a></td>
                                                @endif

                                                <td><a href="delete_category/{{ $row->cat_id }}"
                                                        class="btn btn-danger">delete</a></td>
                                                <td><a href="manage_category/{{ $row->cat_id }}"
                                                        class="btn btn-primary">update</a></td>
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
