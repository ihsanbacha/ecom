@extends('back_end.layout');

@section('page_title', 'customer')
@section('customer_select', 'active')
@section('container')
    <div class="page-container">

        <div class="main-content">
            <div class="section__content section__content--p30">

                <button class="btn btn-primary float-right mr-4 "><a href="{{ url('manage_customer') }}">
                        <h3>Add New Customer</h3>
                    </a></button>
                <div class="container-fluid">
                    <h1> customer </h1>

                    <div class="row m-t-30">
                        <div class="col-md-12">
                            <!-- DATA TABLE-->
                            <div class="table-responsive m-b-40">
                                @if (session('msg'))
                                    <div class="alert alert-success">{{ session('msg') }}</div>
                                @endif
                                <table class="content-table table table-borderless table-data3 table-hover">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>customer name</th>
                                            <th>customer image</th>
                                            <th>customer view</th>
                                            <th>status</th>
                                            <th>delete</th>
                                            <th>update</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $row)
                                            <tr>
                                                <td>{{ $row->customer_id }}</td>
                                                <td>{{ $row->customer_name }}</td>
                                                <td><img src="{{ url('back_end/customer/' . $row->customer_image) }}"
                                                        width="40px" height="40px" alt=""></td>
                                                <td><a href="manage_customer_view/{{ $row->customer_id }}"
                                                        class="btn btn-primary">view</a></td>
                                                @if ($row->customer_status == 1)
                                                    <td><a href="customer_status/0/{{ $row->customer_id }}"
                                                            class="btn btn-success">active</a></td>
                                                @elseif($row->customer_status == 0)
                                                    <td><a href="customer_status/1/{{ $row->customer_id }}"
                                                            class="btn btn-warning">Deactive</a></td>
                                                @endif

                                                <td><a href="delete_customer/{{ $row->customer_id }}"
                                                        class="btn btn-danger">delete</a></td>
                                                <td><a href="manage_customer/{{ $row->customer_id }}"
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
