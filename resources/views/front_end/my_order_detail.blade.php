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

                                                

                                            </tbody>

                                        </table>
                                        <div class="col-md-9"></div>
                                        <div class="col-md-3">
                                            @if ($total_price > $order_list->total_amt)
                                                &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;
                                                &nbsp;&nbsp; &nbsp;<strong> Orignal Price :&nbsp;
                                                    {{ $total_price }}</strong> <br>
                                                &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;
                                                &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;
                                                <strong> you save &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;: &nbsp;
                                                    {{ $total_price - $order_list->total_amt }} </strong><br>
                                            @endif
                                            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp;
                                            &nbsp;&nbsp;&nbsp;&nbsp;
                                            @php
                                                $save_amt = $total_price - $order_list->total_amt;
                                            @endphp
                                            <strong> Total &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; =
                                                &nbsp; {{ $total_price - $save_amt }}</strong>
                                        </div>
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
