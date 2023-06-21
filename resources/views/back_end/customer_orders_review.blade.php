@extends('back_end.layout');

@section('page_title','Review')
@section('customer_orders_review_select','active')
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
                                            <th>review_id</th>
                                            <th>customer name</th>
                                            <th>product name</th>
                                            <th>rating</th>
                                            <th>review</th>
                                            <th>created_at</th>
                                            <th>permision</th>
                                           
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $row)
                                            <tr>
                                                <td>{{ $row->review_id }}</td>
                                                <td>{{ $row->customer_name }}</td>
                                                <td>{{ $row->product_name }}</td>
                                                <td>{{ $row->rating }}</td>
                                                <td>{{ $row->review }}</td>
                                                <td>{{ $row->created_at}}</td>
                                                @if ($row->status == 1)
                                                    <td><a href="review_status/0/{{ $row->review_id }}"
                                                            class="btn btn-success">active</a></td>
                                                @elseif($row->status == 0)
                                                    <td><a href="review_status/1/{{ $row->review_id }}"
                                                            class="btn btn-warning">Deactive</a></td>
                                                @endif
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
