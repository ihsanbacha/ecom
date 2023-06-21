@extends('front_end.layout')
@section('container')

    <section id="cart-view">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="cart-view-area">
                        <div class="cart-view-table">
                            <form action="">
                                <div class="table-responsive">
                                    @if (isset($orders[0]))
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>check order detail</th>
                                                    <th>Order id</th>
                                                    <th>Payment Type</th>
                                                    <th>Payment Status</th>
                                                    <th>Payment id</th>
                                                    <th>Order Status</th>
                                                    <th>Total Amount</th>
                                                    <th>Placed at</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($orders as $order_list)
                                             <tr>
                                                <td class="btn btn-success"><a class="btn btn-success" href="{{url('/my_order_detail/'.$order_list->order_id)}}">check order detail</a></td>
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
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
