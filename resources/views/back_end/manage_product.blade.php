@extends('back_end.layout');
@section('page_title', 'product form')
@section('product_select', 'active')
@section('container')
<!-- END MENU SIDEBAR-->
<script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
<div class="page-container">
    <div class="main-content">
        <div class="section__content section__content--p30">

            <div class="container-fluid ">
                <form action="{{ Route('save.product') }}" method="post" enctype="multipart/form-data">
                    <h1>MANAGE PRODUCT</h1>
                    <div class="row m-t-30">
                        <div class="col-md-2"></div>
                        <div class="col-md-8 col-lg-8">
                            <div class="card">
                                <div class="card-header text-center"> product</div>
                                <div class="card-body">

                                    @csrf
                                    <div class="row">
                                        <div class="col col-md-4">
                                            <div class="form-group">
                                                <label for="">product name</label>
                                                <input type="text" class="form-control" name="product_name"
                                                    value="{{ $product_name }}" id="">
                                                @error('product_name')
                                                <div class="alert alert-danger"> {{ $message }}</div>
                                                @enderror
                                                <input type="hidden" class="form-control" name="product_id"
                                                    value="{{ $product_id }}" id="">
                                            </div>
                                        </div>
                                        <div class="col col-md-4">
                                            <div class="form-group">
                                                <label for="">model</label>
                                                <input type="text" class="form-control" name="model"
                                                    value="{{ $model }}" id="">
                                                @error('model')
                                                <div class="alert alert-danger"> {{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col col-md-4">
                                            <div class="form-group">
                                                <label for="">brand</label>
                                                {{-- <input type="text" class="form-control" name="brand"
                                                    value="{{ $brand }}" id=""> --}}
                                                <select class="form-control" name="brand" id="">
                                                    <option value="">select brands</option>
                                                    @foreach ($brands as $data)
                                                    @if ($brand == $data->brand_id)
                                                    <option value="{{ $data->brand_id }}" selected>
                                                        {{ $data->brand_name }}</option>
                                                    @else
                                                    <option value="{{ $data->brand_id }}">
                                                        {{ $data->brand_name }}</option>
                                                    @endif
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col col-md-12">
                                            <div class="form-group">
                                                <label for=""> Upload image </label>

                                                <input type="file" name="product_image" value="" class="form-control"
                                                    id="">
                                                @error('product_image')
                                                <div class="alert alert-danger"> {{ $message }}</div>
                                                @enderror
                                                @if ($product_id)
                                                <img src="{{ url('back_end/product/' . $product_image) }}" width="40px"
                                                    height="40px" alt="">
                                                @endif

                                            </div>
                                        </div>
                                        <div class="col col-md-12 form-group">
                                            <select class="form-control" name="category_id" id="">
                                                <option value="">SELECT CATEGORY</option>
                                                @foreach ($cat as $data)
                                                @if ($category_id == $data->cat_id)
                                                <option selected value="{{ $data->cat_id }} ">
                                                    {{ $data->cat_name }}</option>
                                                @else
                                                <option value="{{ $data->cat_id }}">{{ $data->cat_name }}
                                                </option>
                                                @endif
                                                @endforeach

                                            </select>
                                        </div>

                                        <div class="col col-md-12">
                                            <div class="form-group">
                                                <label for="">short_desc</label>
                                                <textarea class="form-control" name="short_desc" id="short_desc"
                                                    cols="30" rows="2">{{ $short_desc }}</textarea>
                                                @error('short_desc')
                                                <div class="alert alert-danger"> {{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col col-md-12">
                                            <div class="form-group">
                                                <label for="">desc</label>
                                                <textarea class="form-control" name="desc" id="" desc cols="30"
                                                    rows="2">{{ $desc }}</textarea>
                                                @error('desc')
                                                <div class="alert alert-danger"> {{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col col-md-6">
                                            <div class="form-group">
                                                <label for="">keywords</label>
                                                <textarea class="form-control" name="keywords" id="keywords" cols="30"
                                                    rows="2">{{ $desc }}</textarea>
                                                @error('keywords')
                                                <div class="alert alert-danger"> {{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col col-md-6">
                                            <div class="form-group">
                                                <label for="">technical specification</label>
                                                <textarea class="form-control" name="technical_specification"
                                                    id="technical_specification" cols="30"
                                                    rows="2">{{ $technical_specification }}</textarea>
                                                @error('technical_specification')
                                                <div class="alert alert-danger"> {{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col col-md-6">
                                            <div class="form-group">
                                                <label for="">uses</label>
                                                <textarea class="form-control" name="uses" id="uses" cols="30"
                                                    rows="2">{{ $uses }}</textarea>
                                                @error('uses')
                                                <div class="alert alert-danger"> {{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col col-md-6">
                                            <div class="form-group">
                                                <label for="">warranty</label>
                                                <textarea class="form-control" name="warranty" id="warranty" cols="30"
                                                    rows="2">{{ $warranty }}</textarea>
                                                @error('warranty')
                                                <div class="alert alert-danger"> {{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>


                                        <div class="form-group col col-md-4">
                                            <label for="">Lead Time</label>
                                            <input type="text" name="lead_time" value="{{ $lead_time }}"
                                                class="form-control">
                                        </div>
                                        <div class="form-group col col-md-4">
                                            <label for="">tax</label>
                                            <input type="text" name="tax" value="{{ $tax }}" class="form-control">
                                        </div>
                                        <div class="form-group col col-md-4">
                                            <label for="">tax type</label>
                                            <input type="text" name="tax_type" value="{{ $tax_type }}"
                                                class="form-control">
                                        </div>
                                        <div class="form-group col col-md-3">
                                            <label for=""> is promo</label>
                                            <select name="is_promo" class="form-control" id="">
                                                @if ($is_promo == 1)
                                                <option value="1" selected>YES</option>
                                                <option value="0">NO</option>
                                                @else
                                                <option value="1">YES</option>
                                                <option value="0" selected>NO</option>
                                                @endif
                                            </select>
                                        </div>
                                        <div class="form-group col col-md-3">
                                            <label for="">is featured</label>
                                            <select name="is_featured" class="form-control" id="">
                                                @if ($is_promo == 1)
                                                <option value="1" selected>YES</option>
                                                <option value="0">NO</option>
                                                @else
                                                <option value="1">YES</option>
                                                <option value="0" selected>NO</option>
                                                @endif
                                            </select>
                                        </div>
                                        <div class="form-group col col-md-3">
                                            <label for="">is discounted</label>
                                            <select name="is_discounted" class="form-control" id="">
                                                @if ($is_promo == 1)
                                                <option value="1" selected>YES</option>
                                                <option value="0">NO</option>
                                                @else
                                                <option value="1">YES</option>
                                                <option value="0" selected>NO</option>
                                                @endif
                                            </select>
                                        </div>
                                        <div class="form-group col col-md-3">
                                            <label for="">is tranding</label>
                                            <select name="is_tranding" class="form-control" id="">
                                                @if ($is_promo == 1)
                                                <option value="1" selected>YES</option>
                                                <option value="0">NO</option>
                                                @else
                                                <option value="1">YES</option>
                                                <option value="0" selected>NO</option>
                                                @endif
                                            </select>
                                        </div>
                                        {{-- product images --}}
                                        <div class="col-md-4"></div>
                                        <h4 class="mb10 ">Add Product Images</h4>
                                        <div class="col-lg-2"></div>
                                        <div class="col-lg-8">
                                            <div class="">
                                                <div class="">
                                                    <div class="form-group">
                                                        <div class="row" id="product_images_box">
                                                            @php
                                                            $loop_count_num = 1;
                                                            @endphp
                                                            @foreach ($productImagesArr as $key => $val)
                                                            @php
                                                            $loop_count_prev = $loop_count_num;
                                                            $pIArr = (array) $val;
                                                            @endphp
                                                            <input id="piid" type="hidden" name="piid[]"
                                                                value="{{ $pIArr['id'] }}">
                                                            <div
                                                                class="col-md-8 product_images_{{ $loop_count_num++ }}">
                                                                <label for="images" class="control-label mb-1">
                                                                    Image</label>
                                                                <input id="images" name="images[]" type="file"
                                                                    class="form-control" aria-required="true"
                                                                    aria-invalid="false">

                                                                @if ($pIArr['product_images'] != '')
                                                                <img src="{{ url('back_end/product_images/' . $pIArr['product_images']) }}"
                                                                    width="40px" height="40px" alt="">
                                                                @endif
                                                                @error('images')
                                                                <div class="alert alert-danger">
                                                                    {{ $message }}</div>
                                                                @enderror
                                                            </div>
                                                            <div class="col-md-2"></div>
                                                            <div class="col-md-2">
                                                                <label for="images" class="control-label mb-1">
                                                                    &nbsp;&nbsp;&nbsp;</label>

                                                                @if ($loop_count_num == 2)
                                                                <button type="button" class="btn btn-success btn-lg"
                                                                    onclick="add_image_more()">
                                                                    <i class="fa fa-plus"></i>&nbsp;
                                                                    Add</button>
                                                                @else
                                                                <a href="delete_product_images/{{ $pIArr['id'] }}"><button
                                                                        type="button" class="btn btn-danger btn-lg">
                                                                        <i class="fa fa-minus"></i>&nbsp;
                                                                        Remove</button></a>
                                                                @endif

                                                            </div>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        {{-- end product images --}}
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>




                    {{-- product attributes --}}
                    @php
                    // this count use for box remove
                    $p_attr_count = 1;
                    @endphp
                    @foreach ($product_attr as $key => $value)
                    {{-- use typecasting method convert obj to array --}}
                    @php
                    $remove_box = $p_attr_count;
                    $p_attrr = (array) $value;
                    @endphp
                    <div id="product_attr_box">
                        <input type="hidden" id="attr_id" name="attr_id[]" value="{{ $p_attrr['id'] }}">
                        <div class="row m-t-20" id="product_attrbutes_{{ $p_attr_count++ }}">
                            <div class="col-md-2"></div>
                            <div class="col-md-8 col-lg-8">
                                <div class="card">
                                    <div class="card-header text-center"> Product Attributes</div>
                                    <div class="card-body">

                                        <div class="row" id="row">

                                            <div class="col col-md-3">
                                                <div class="form-group">
                                                    <label for="">sku</label>
                                                    <input type="text" class="form-control" name="sku[]"
                                                        value="{{ $p_attrr['sku'] }}" id="">
                                                    @error('sku')
                                                    <div class="alert alert-danger"> {{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col col-md-3">
                                                <div class="form-group">
                                                    <label for="">mrp</label>
                                                    <input type="text" class="form-control" name="mrp[]"
                                                        value="{{ $p_attrr['mrp'] }}" id="">
                                                    @error('mrp')
                                                    <div class="alert alert-danger"> {{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col col-md-3">
                                                <div class="form-group">
                                                    <label for="">price</label>
                                                    <input type="text" class="form-control" name="price[]"
                                                        value="{{ $p_attrr['price'] }}" id="">
                                                    @error('price')
                                                    <div class="alert alert-danger"> {{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col col-md-3">
                                                <div class="form-group">
                                                    <label for="">qty</label>
                                                    <input type="text" class="form-control" name="qty[]"
                                                        value="{{ $p_attrr['quantity'] }}" id="">
                                                    @error('qty')
                                                    <div class="alert alert-danger"> {{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col col-md-3">
                                                <div class="form-group">
                                                    <label for="">size</label>
                                                    <select class="form-control" name="size_id[]" id="">
                                                        <option value="">SELECT SIZE</option>
                                                        @foreach ($size as $data)
                                                        @if ($p_attrr['size_id'] == $data->size_id)
                                                        <option selected value="{{ $data->size_id }} ">
                                                            {{ $data->size }}</option>
                                                        @else
                                                        <option value="{{ $data->size_id }}">
                                                            {{ $data->size }}
                                                        </option>
                                                        @endif
                                                        @endforeach

                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col col-md-3">
                                                <div class="form-group">
                                                    <label for="">colour</label>
                                                    <select class="form-control" name="colour_id[]" id="">
                                                        <option value="">SELECT COLOURS</option>
                                                        @foreach ($colour as $data)
                                                        @if ($p_attrr['colour_id'] == $data->colour_id)
                                                        <option selected value="{{ $data->colour_id }} ">
                                                            {{ $data->colour }}</option>
                                                        @else
                                                        <option value="{{ $data->colour_id }}">
                                                            {{ $data->colour }}
                                                        </option>
                                                        @endif
                                                        @endforeach

                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col col-md-6">
                                                <div class="form-group">
                                                    <label for=""> Upload image </label>

                                                    <input type="file" name="attr_image[]" value="" class="form-control"
                                                        id="">
                                                    @error('attr_image')
                                                    <div class="alert alert-danger"> {{ $message }}
                                                    </div>
                                                    @enderror
                                                    @if ($p_attrr['product_id'])
                                                    <img src="{{ url('back_end/product_attribute/' . $p_attrr['attr_image']) }}"
                                                        width="40px" height="40px" alt="">
                                                    @endif

                                                </div>
                                            </div>

                                        </div>

                                        <div class="row">
                                            {{-- add more or removemore button --}}
                                            @if ($p_attr_count == 2)
                                            <div class="col col-md-4"></div>
                                            <div class="col col-md-4">
                                                <label for="">&nbsp;&nbsp;&nbsp;&nbsp;</label>
                                                <div class="form-group">
                                                    <div class="btn btn-success btn-lg" onclick="add_more()">
                                                        <i class="fa fa-plus"></i>&nbsp; ADD MORE
                                                    </div>
                                                </div>
                                            </div>
                                            @else
                                            <div class="col col-md-4"></div>
                                            <a href="delete_product_attr/{{ $p_attrr['id'] }}">
                                                <div class="col col-md-4">
                                                    <label for="">&nbsp;&nbsp;&nbsp;&nbsp;</label>
                                                    <div class="form-group">
                                                        <div class="btn btn-danger btn-lg">
                                                            <i class="fa fa-minus"></i>&nbsp; REMOVE
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                            @endif



                                            <script>
                                                var loop_count = 1;

                                                        function add_more() {
                                                            loop_count++;
                                                            html = '<input type="hidden" id="attr_id" name="attr_id[]"><div class="row m-t-20" id="product_attrbutes_' +
                                                                loop_count +
                                                                '" ><div class="col-md-2"></div> <div class="col-md-8 col-lg-8"> <div class="card"><div class="card-header text-center"> Product Attributes</div>  <div class="card-body"><div class="row">';
                                                            var row_html = jQuery('#row').html();
                                                            html += row_html;
                                                            html +=
                                                                ' <div class="col col-md-4"></div><div class="col col-md-4"><label for="">&nbsp;&nbsp;&nbsp;&nbsp;</label><div class="form-group"><div class="btn btn-danger btn-lg" onclick=remove_more("' +
                                                                loop_count + '")><i class="fa fa-minus"></i>&nbsp; REMOVE</div> </div></div>';
                                                            html += '</div></div></div></div></div></div></div>';
                                                            jQuery('#product_attr_box').append(html)
                                                        }

                                                        // fuction for remove box
                                                        function remove_more(loop_count) {

                                                            jQuery('#product_attrbutes_' + loop_count).remove();
                                                        }
                                            </script>
                                        </div>

                                    </div>

                                </div>

                            </div>
                        </div>

                    </div>
                    @endforeach
                    <div class="row">
                        <div class="col col-md-2"></div>
                        <div class="col col-md-8">
                            <div class="form-group">

                                <input type="submit" name="submit" class="form-control btn btn-primary" id="">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        CKEDITOR.replace('technical_specification');
            CKEDITOR.replace('uses');
            CKEDITOR.replace('warranty');
            CKEDITOR.replace('desc');
            CKEDITOR.replace('short_desc');
            CKEDITOR.replace('keywords');

            var loop_image_count = 1;

            function add_image_more() {
                loop_image_count++;
                var html = '<input id="piid" type="hidden" name="piid[]" value=""><div class="col-md-8 product_images_' +
                    loop_image_count +
                    '"><label for="images" class="control-label mb-1"> Image</label><input id="images" name="images[]" type="file" class="form-control" aria-required="true" aria-invalid="false" required></div>';
                //product_images_box
                html += ' <div class="col-md-2"></div> <div class="col-md-2 product_images_' + loop_image_count +
                    '""><label for="attr_image" class="control-label mb-1"> &nbsp;&nbsp;&nbsp;</label><button type="button" class="btn btn-danger btn-lg" onclick=remove_image_more("' +
                    loop_image_count + '")><i class="fa fa-minus"></i>&nbsp; Remove</button></div>';
                jQuery('#product_images_box').append(html)
            }

            function remove_image_more(loop_image_count) {
                jQuery('.product_images_' + loop_image_count).remove();
            }
    </script>
</div>
@endsection