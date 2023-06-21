@extends('back_end.layout');

@section('page_title','show customer orders')
@section('show_customer_orders_select','active')
@section('container')
    <div class="page-container">

        <div class="main-content">
            <div class="section__content section__content--p30">

            
                <div class="container-fluid">
                    <h1> ORDERS </h1>

                    <div class="row m-t-30">
                        <div class="col-md-12">
                            <!-- DATA TABLE-->
                            <div class="table-responsive m-b-40">
                                @if(session('msg'))      
                               <div class="alert alert-success">{{session('msg')}}</div>  
                                @endif
                                <form action="">
                                    <div class="table-responsive">
                                        @if (isset($orders[0]))
                                            <table class="table table-responsive"  style="background-color: white">
                                                <thead>
                                                    <tr>
                                                        <th>detail</th>
                                                        <th>Order id</th>
                                                        <th>Payment Type</th>
                                                        <th>Payment Status</th>
                                                        <th>Payment id</th>
                                                        <th>Order Status</th>
                                                        <th>Total Amount</th>
                                                        <th>Placed at</th>
                                                        <th>update</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($orders as $order_list)
                                                 <tr>
                                                    <td class="btn btn-success"><a class="btn btn-success" href="{{url('/show_customer_order_detail/'.$order_list->order_id)}}"> check detail</a></td>
                                                  
                                                    <td>{{ $order_list->order_id }}</td>
                                                    <td>{{ $order_list->payment_type }}</td>
                                                    <td>{{ $order_list->payment_status }}</td>
                                                   @if( $order_list->payment_type=='gateway')
                                                    <td>{{ $order_list->payment_id }}</td>
                                                    @else
                                                        <td>not paid</td>
                                                    
                                                    @endif
                                                    <td>{{ $order_list->orders_status }}</td>
                                                    <td>{{ $order_list->total_amt }}</td>
                                                    <td>{{ $order_list->created_at }}</td>
                                                    <td class="btn btn-success"><a class="btn btn-success" href="{{url('/update_order_status/'.$order_list->order_id)}}">update status</a></td>
                                                 </tr>
                                                 @endforeach
                                                </tbody>
                                            </table>
                                    </div>
                                @else
                                    <h2>NO DATA FOUND</h2>
                                    @endif
                                </form>
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
