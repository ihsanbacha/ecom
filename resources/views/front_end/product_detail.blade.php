@extends('front_end.layout')
@section('container')
<script>
    var PRODUCT_IMAGE="{{asset('storage/media/')}}";
    </script>
    <section id="aa-product-details">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="aa-product-details-area">
                        <div class="aa-product-details-content">
                            <div class="row">
                                <!-- Modal view slider -->
                                <div class="col-md-5 col-sm-5 col-xs-12">
                                    <div class="aa-product-view-slider">
                                        <div id="demo-1" class="simpleLens-gallery-container">
                                            <div class="simpleLens-container">
                                                <div class="simpleLens-big-image-container"><a
                                                        data-lens-image="{{ url('back_end/product/' . $product_data[0]->product_image) }}"
                                                        class="simpleLens-lens-image"><img
                                                            src="{{ url('back_end/product/' . $product_data[0]->product_image) }}"
                                                            class="simpleLens-big-image"></a></div>
                                            </div>
                                            <div class="simpleLens-thumbnails-container">

                                                @foreach ($product_images[$product_data[0]->product_id] as $row2)
                                                    <a data-big-image="{{ url('back_end/product_images/' . $row2->product_images) }}"
                                                        data-lens-image="{{ url('back_end/product_images/' . $row2->product_images) }}"
                                                        class="simpleLens-thumbnail-wrapper" href="#">
                                                        <img src="{{ url('back_end/product_images/' . $row2->product_images) }}"
                                                            height="50px" width="50px">
                                                    </a>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Modal view content -->
                                <div class="col-md-7 col-sm-7 col-xs-12">
                                    <div class="aa-product-view-content">
                                        <h3>{{ $product_data[0]->product_name }}</h3>
                                      
                                        <div class="aa-price-block">
                                            <span class="aa-product-view-price"><del> RS
                                                    {{ $product_attr[$product_data[0]->product_id][0]->price }}</span>
                                            <span class="aa-product-view-price">RS
                                                {{ $product_attr[$product_data[0]->product_id][0]->mrp }}</span>
                                            <p class="aa-product-avilability">Avilability: <span>In stock</span></p>
                                            @if ($product_data[0]->lead_time != '')
                                                <div class="btn btn-danger">
                                                  Lead_time: &nbsp;&nbsp;  {{ $product_data[0]->lead_time }}
                                                </div>
                                            @endif
                                        </div>
                                        <p>{!! $product_data[0]->short_desc !!}</p>
                                        <h4>Size</h4>
                                        <div class="aa-prod-view-size">
                                            @php
                                                // for unique size record
                                                $arr_size = [];
                                                foreach ($product_attr[$product_data[0]->product_id] as $row3) {
                                                    $arr_size[] = $row3->size;
                                                }
                                                $arr_size = array_unique($arr_size);
                                                
                                            @endphp
                                            @foreach ($arr_size as $size)
                                                @if ($size != '')
                                                    <a href="javascript:void(0)" id="size_{{ $size }}"
                                                        class="size"
                                                        onclick="show_colour('{{ $size }}')">{{ $size }}</a>
                                                @endif
                                            @endforeach
                                        </div>
                                        <h4>Color</h4>
                                        <div class="aa-color-tag">
                                            @foreach ($product_attr[$product_data[0]->product_id] as $row3)
                                                @if ($row3->colour != '')
                                                    <a href="javascript:void(0)"
                                                        class="aa-color-{{ strtolower($row3->colour) }} size_{{ $row3->size }} product_clour"
                                                        onclick="change_product_image_colour('{{ url('back_end/product_attribute/' . $row3->attr_image) }}','{{ strtolower($row3->colour) }}')"></a>
                                                @endif
                                            @endforeach
                                        </div>
                                        <div class="aa-prod-quantity">
                                            <form action="">
                                                @php
                                                $qty="";

                                                  $avialible_qty = $product_attr[$product_data[0]->product_id][0]->quantity
                                                  
                                                @endphp
                                                Quantity &nbsp;
                                               <input type="hidden" id="qty2" value="{{$avialible_qty}}">

                                                <select id="qty" name="qty">
                                                    @for ($i = 1; $i < 8; $i++)
                                                        <option value="{{ $i }}">{{ $i }}</option>
                                                    @endfor
                                                </select>
                                            </form>
                                            <p class="aa-prod-category">
                                                model: <a href="#">{{ $product_data[0]->model }}</a>
                                            </p>
                                            <p class="aa-prod-category">
                                                brand: <a href="#">{{ $product_data[0]->brand_name }}
                                               
                                                    </a>
                                            </p>
                                        </div>
                                        {{-- <div class="aa-prod-view-bottom">
                                            <a class="aa-add-to-cart-btn" href="javascript:void(0)"  onclick = "add_to_cart({{ $product_data[0]->product_id }})">Add To Cart</a>
                                           
                                        </div>
                                        <div id="add_to_cart_msg"></div> --}}
                                      
                                        <div class="aa-prod-view-bottom">
                                            <a class="aa-add-to-cart-btn" href="javascript:void(0)"
                                                onclick="add_to_cart('{{$product_data[0]->product_id}}',{{$avialible_qty}})">Add
                                                To Cart</a>
                                        </div>
                                     
                                        <div id="add_to_cart_msg"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="aa-product-details-bottom">
                        <ul class="nav nav-tabs" id="myTab2">
                            <li><a href="#description" data-toggle="tab">Description</a></li>
                            <li><a href="#technical_specification" data-toggle="tab">Technical Specification</a></li>
                            <li><a href="#uses" data-toggle="tab">Uses</a></li>
                            <li><a href="#warranty" data-toggle="tab">warranty</a></li>
                            <li><a href="#review" data-toggle="tab">Reviews</a></li>
                        </ul>

                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div class="tab-pane fade in active" id="description">
                                {!! $product_data[0]->desc !!}
                            </div>
                            <div class="tab-pane fade in active" id="technical_specification">
                                {!! $product_data[0]->technical_specification !!}
                            </div>
                            <div class="tab-pane fade in active" id="uses">
                                {!! $product_data[0]->uses !!}
                            </div>
                            <div class="tab-pane fade in active" id="warranty">
                                {!! $product_data[0]->warranty !!}
                            </div>
                            <div class="tab-pane fade " id="review">
                                <div class="aa-product-review-area">
                                    @php
                                    
                                        $count_review= count( $product_review);
                                    @endphp
                                    <h4>Review({{$count_review}}) &nbsp;{{ $product_data[0]->product_name }} </h4>
                                    <ul  class="aa-review-nav">
                                        @foreach($product_review as $review)
                                        <li>
                                            <div class="media">
                                                <div class="media-left">
                                                    <a href="#">
                                                        @if($review->customer_image)
                                                        <img height="50px" width="50px" class="media-object" src=  "{{ $review->customer_image }}"
                                                        alt="{{ url('back_end/images/icon/1.jpg')}}">
                                                        @else
                                                        <img height="50px" width="50px" class="media-object" src=  "{{ url('back_end/images/icon/1.jpg')}}"
                                                        alt="{{ url('back_end/images/icon/1.jpg')}}">
                                                        @endif 
                                                    </a>
                                                </div>
                                                <div  class="media-body">
                                                    <h4 class="media-heading"><strong>{{$review->customer_name}}</strong> - <span>{{$review->created_at}}</span></h4>
                                                    <div class="aa-product-rating">
                                                       
                                                        <span>Rating :  {{$review->rating}} </span>
                                                    </div>
                                                    <p>Comment : {{$review->review}}</p>
                                                </div>
                                               
                                            </div>
                                        </li>
                                        <li>
                                            <div  class="media">
                                               
                                               <div id="media_left" class="media-left">
                                                   <a href="#">
                                                      
                                                       <img height="50px" width="50px" class="media-object" src=  "{{ url('back_end/images/icon/1.jpg')}}"
                                                       alt="{{ url('back_end/images/icon/1.jpg')}}">
                                                      
                                                   </a>

                                                   <div id="pro_review"  class="media-body">
                                                      
                                                   </div>

                                               </div>

                                           </div>
                                      </li>
                                        @endforeach
                                     
                                       
                                    </ul>
                                    <form id="product_review" class="aa-review-form">
                                        @csrf
                                    <h4>Add a review</h4>
                                    <div class="aa-your-rating">
                                        <p>Your Rating</p>
                                      <select class="form-control" name="rating" id="" required>
                                         <option value="good">good</option>
                                         <option value="very good">very good</option>
                                         <option value="nice">nice</option>
                                         <option value="fantastic">fantastic</option>
                                         <option value="bad">bad</option>
                                         <option value="very bad">very bad</option>
                                      </select>
                                    </div>
                                    <!-- review form -->
                                   
                                        <div class="form-group">
                                            <label for="message">Your Review</label>
                                            <textarea class="form-control"  rows="3" id="message" name="product_review" required></textarea>
                                            <input type="hidden" class="form-control" name="product_id" value="{{$product_data[0]->product_id}}" >
                                        </div>
                                        <button type="submit" class="btn btn-default aa-review-submit">Submit</button>

                                        {{-- message --}}
                                      <div id="p_review"></div>
                                      <div id="p_review_error">
                                       
                                      </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Related product -->
                    <div class="aa-product-related-item" role="toolbar">
                        <h3>Related Products</h3>
                        <ul class="aa-product-catg aa-related-item-slider slick-initialized slick-slider"><button
                                type="button" data-role="none" class="slick-prev slick-arrow slick-disabled"
                                aria-label="Previous" role="button" aria-disabled="true"
                                style="display: block;">Previous</button>
                            <!-- start single product item -->

                            <!-- start single product item -->

                            <!-- start single product item -->

                            <!-- start single product item -->

                            <!-- start single product item -->

                            <!-- start single product item -->

                            <!-- start single product item -->

                            <!-- start single product item -->

                            <div aria-live="polite" class="slick-list draggable">
                                <div class="slick-track" role="listbox" style="opacity: 1; width: 1976px; left: 0px;">
                                    @foreach ($related_product_data as $row)
                                        <li class="slick-slide slick-current slick-active" tabindex="-1" role="option"
                                            aria-describedby="slick-slide00" style="width: 202px;" data-slick-index="0"
                                            aria-hidden="false">
                                            <figure>
                                                <a class="aa-product-img"
                                                    href="{{ url('product_detail/' . $row->product_id) }}"
                                                    tabindex="0"><img
                                                        src="{{ url('back_end/product/' . $row->product_image) }}"
                                                        alt="polo shirt img"></a>
                                                <a class="aa-add-card-btn"
                                                    href="{{ url('product_detail/' . $row->product_id) }}"
                                                    tabindex="0"><span class="fa fa-shopping-cart"></span>Add To
                                                    Cart</a>
                                                <figcaption>
                                                    <h4 class="aa-product-title"><a
                                                            href="{{ url('product_detail/' . $row->product_id) }}"
                                                            tabindex="0">{{ $row->product_name }}</a></h4>
                                                    <span
                                                        class="aa-product-price">RS{{ $related_product_attr[$row->product_id][0]->price }}</span><span
                                                        class="aa-product-price"><del>RS{{ $related_product_attr[$row->product_id][0]->mrp }}</del></span>
                                                </figcaption>
                                            </figure>
                                            <div class="aa-product-hvr-content">
                                                <a href="#" data-toggle="tooltip" data-placement="top"
                                                    title="" data-original-title="Add to Wishlist"
                                                    tabindex="0"><span class="fa fa-heart-o"></span></a>
                                                <a href="#" data-toggle="tooltip" data-placement="top"
                                                    title="" data-original-title="Compare" tabindex="0"><span
                                                        class="fa fa-exchange"></span></a>
                                                <a href="#" data-toggle2="tooltip" data-placement="top"
                                                    title="" data-toggle="modal" data-target="#quick-view-modal"
                                                    data-original-title="Quick View" tabindex="0"><span
                                                        class="fa fa-search"></span></a>
                                            </div>
                                            <!-- product badge -->
                                            <span class="aa-badge aa-sale" href="#">SALE!</span>
                                        </li>
                                    @endforeach
                                </div>
                            </div><button type="button" data-role="none" class="slick-next slick-arrow"
                                aria-label="Next" role="button" style="display: block;"
                                aria-disabled="false">Next</button>
                        </ul>

                        <!-- / quick view modal -->
                    </div>
                    <form id="form_add_to_cart">
                        @csrf
                        @method('post');
                        <input type="hidden" id="colour_id" name="colour_id">
                        <input type="hidden" id="size_id" name="size_id">
                        <input type="hidden" id="product_id" name="product_id">
                        <input type="hidden" id="pqty" name="pqty">
                    </form>
                </div>
            </div>
        </div>
        </div>
    </section>
    
@endsection
