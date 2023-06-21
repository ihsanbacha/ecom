@extends('back_end.layout');

@section('page_title','banner')
@section('banner_select','active')
@section('container')
    <div class="page-container"> 

        <div class="main-content">
            <div class="section__content section__content--p30">

                <button class="btn btn-primary float-right mr-4 "><a href="{{ url('manage_banner') }}">
                        <h3>Add New Banner</h3>
                    </a></button>
                <div class="container-fluid">
                    <h1> Banner </h1>

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
                                            <th>banner</th>
                                            <th>brand image</th>
                                            <th>status</th>
                                            <th>delete</th>
                                            <th>update</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $row)
                                            <tr>
                                                <td>{{ $row->banner_id }}</td>
                                                <td>{{ $row->banner_text }}</td>
                                                <td><img src="{{ url('back_end/banner/' . $row->banner_image) }}"
                                                        width="40px" height="40px" alt=""></td>

                                                @if ($row->banner_status == 1)
                                                    <td><a href="banner_status/0/{{ $row->banner_id }}"
                                                            class="btn btn-success">active</a></td>
                                                @elseif($row->banner_status == 0)
                                                    <td><a href="banner_status/1/{{ $row->banner_id }}"
                                                            class="btn btn-warning">Deactive</a></td>
                                                @endif

                                                <td><a href="delete_banner/{{ $row->banner_id }}"
                                                        class="btn btn-danger">delete</a></td>
                                                <td><a href="manage_banner/{{ $row->banner_id }}"
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
