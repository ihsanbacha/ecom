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
                                    @if (isset($data[0]))
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>delete</th>
                                                    <th>image</th>
                                                    <th>Product</th>
                                                    <th>Price</th>
                                                    <th>Quantity</th>
                                                    <th>Total</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                               <div id="update_qty_msg"></div>
                                                @foreach ($data as $row)
                                                    <tr class="delete_attr_product{{ $row->cart_id }}">
                                                        <td><a class="remove" href="javascript:void(0)"
                                                                onclick="delete_attr_product('{{ $row->product_id }}','{{ $row->size }}','{{ $row->colour }}','{{ $row->id }}','{{ $row->price }}','{{ $row->cart_id }}')">
                                                                <fa class="fa fa-close"></fa>
                                                            </a></td>
                                                        <td><a href="product_detail/{{ $row->product_id }}"><img
                                                                    src="{{ url('back_end/product/' . $row->product_image) }}"
                                                                    alt="img"></a></td>

                                                        <td><a class="aa-cart-title"
                                                                href="product_detail/{{ $row->product_id }}">{{ $row->product_name }}</a>
                                                            @if ($row->size != '')
                                                                <br />SIZE: {{ $row->size }}
                                                            @endif
                                                            @if ($row->colour != '')
                                                                <br />COLOR: {{ $row->colour }}
                                                            @endif
                                                        </td>
                                                        <td>{{ $row->price }}</td>
                                                          
                                                        <td ><input class="aa-cart-quantity" id="qty{{ $row->id }}"
                                                                type="number" value="{{ $row->qty }}"

                                                                onchange="updateqty(
                                                                '{{ $row->product_id }}',
                                                                '{{ $row->size }}',
                                                                '{{ $row->colour }}',
                                                                '{{ $row->id }}',
                                                                {{ $row->price }},
                                                                {{ $row->quantity }}
                                                                )">
                                                                
                                                        </td>
                                                        <input type="hidden" id="qty{{ $row->id }}"  value="{{ $row->qty }}">
                                                      

                                                        <td id="total_price_{{ $row->id }}">
                                                            {{ $row->price * $row->qty }}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                </div>
                            @else
                                <h2>NO DATA FOUND</h2>
                                @endif
                            </form>
                            <!-- Cart Total view -->
                            <div class="cart-view-total">
                                <a href="{{ url('/checkout') }}" class="aa-cart-view-btn">Proced to Checkout</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <input type="hidden" id="qty" name="qty" value="1">
    <form id="form_add_to_cart">
        @csrf
        <input type="hidden" id="colour_id" name="colour_id">
        <input type="hidden" id="size_id" name="size_id">
        <input type="hidden" id="product_id" name="product_id">
        <input type="hidden" id="pqty" name="pqty">
    </form>
@endsection
