@extends('back_end.layout');

@section('page_title', 'customer')
@section('customer_select', 'active')
@section('container')
    <div class="page-container">

        <div class="main-content">
            <div class="section__content section__content--p30">


                <div class="container-fluid">
                    <h1> customer Detail </h1>

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


                                        </tr>
                                    </thead>
                                    <tbody>

                                        <div class="row" style="background-color: rgb(155, 189, 220)">
                                            <div class="col col-md-4  mt-10"></div>
                                            <div class="col col-md-4  mt-10"><strong>  ORDER INFORMATION </strong></div>
                                            <div class="col col-md-4  mt-10"></div>
                                        </div>
                                        <div class="row" style="background-color:white">
                                            <div class="col col-md-12"></div>
                                        </div>
                                        <div class="row ">

                                            <div class="col-md-1" style="background-color:white">
                                            </div>
                                        </div>
                                        <br>
                                        <div class="row  mt-10" style="background-color: rgb(155, 189, 220)">
                                            <div class="col col-md-4  mt-10"></div>
                                            <div class="col col-md-4  mt-10"><strong>CUSTOMER INFORMATION</strong></div>
                                            <div class="col col-md-4  mt-10"></div>
                                        </div>

                                        <tr>
                                            <td><strong>Name</strong></td>
                                            <td>{{ $orders[0]->customer_name }}</td>
                                        </tr>

                                        <tr>
                                            <td><strong>EMAIL</strong></td>
                                            <td>{{ $orders[0]->customer_email }}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>MOBILE</strong></td>
                                            <td>{{ $orders[0]->customer_mobil }}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>ADDRESS</strong></td>
                                            <td>{{ $orders[0]->customer_address }}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>CITY</strong></td>
                                            <td>{{ $orders[0]->customer_city }}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>ZIP</strong></td>
                                            <td>{{ $orders[0]->customer_zip_code }}</td>
                                        </tr>

                                    </tbody>
                                </table><br>
                                <div class="row" style="background-color: rgb(155, 189, 220)">
                                    <div class="col col-md-4  mt-10"></div>
                                    <div class="col col-md-4  mt-10"><strong> CUSTOMER ORDERS</strong><br><strong>ORDER NO:
                                            {{ $orders[0]->order_id }}</strong></div>
                                    <div class="col col-md-4  mt-10"></div>
                                </div>
                                @if (isset($orders[0]))
                                    <table class="content-table table " style="background-color:white">
                                        <thead>

                                            <tr>

                                                <th>product</th>
                                                <th>product image</th>
                                                <th>size</th>
                                                <th>colour</th>
                                                <th>price</th>
                                                <th>quantity</th>
                                                <th>sub total</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $total_price = 0;
                                            @endphp
                                            @foreach ($orders as $order_list)
                                                @php
                                                    $total_price = $total_price + $order_list->price * $order_list->qty;
                                                @endphp

                                                <tr>
                                                    <td>{{ $order_list->product_name }}</td>
                                                    <td><img src="{{ url('back_end/product/' . $order_list->product_image) }}"
                                                            height="50px" width="100px" alt=""></td>
                                                    <td>{{ $order_list->size }}</td>
                                                    <td>{{ $order_list->colour }}</td>
                                                    <td>{{ $order_list->price }}</td>
                                                    <td>{{ $order_list->qty }}</td>
                                                    <td>{{ $order_list->qty * $order_list->price }}</td>

                                                </tr>
                                            @endforeach
                                            @php
                                                $save_amt = $total_price - $order_list->total_amt;
                                            @endphp
                                            @if ($total_price > $order_list->total_amt)
                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td><strong>Orignal Price</strong></td>
                                                    <td><strong>{{ $total_price }}</strong></td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td><strong>Discount</strong></td>
                                                    <td><strong> {{ $total_price - $order_list->total_amt }}</strong></td>
                                                </tr>
                                            @endif
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td><strong>Total</strong></td>
                                                <td><strong> {{ $total_price - $save_amt }}</strong></td>
                                            </tr>

                                        </tbody>

                                    </table>
                                @else
                                    <h2>NO DATA FOUND</h2>
                                @endif
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
