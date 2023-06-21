@extends('back_end.layout');
@section('page_title', 'coupon Form')
@section('coupon_select','active')

@section('container')
<!-- END MENU SIDEBAR-->
<div class="page-container">

    <div class="main-content">
        <div class="section__content section__content--p30">

            <div class="container-fluid ">
                <h1> MANAGE COUPON </h1>
                <div class="row m-t-30">
                    <div class="col-md-2"></div>
                    <div class="col-md-8 col-lg-8">
                        <div class="card">
                            <div class="card-header text-center"> Coupon Resgisteration Form </div>
                            <div class="card-body">
                                <form action="{{ Route('save.coupon') }}" method="post">
                                    @csrf
                                    <div class="row"><div class="form-group form-group col col-md-6 ">
                                        <label for="">title</label>
                                        <input type="hidden" class="form-control" name="coupon_id" value="{{ $coupon_id }}" id="">
                                        <input type="text" class="form-control" name="title" value="{{ $title }}" id="">
                                        @error('title')
                                        <div class="alert alert-danger"> {{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group form-group col col-md-6">
                                        <label for="">code</label>
                                        <input type="text" class="form-control" name="code" value="{{ $code }}" id="">
                                        @error('code')
                                        <div class="alert alert-danger"> {{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group form-group col col-md-6">
                                        <label for="">value</label>
                                        <input type="text" class="form-control" name="value" value="{{ $value }}" id="">
                                        @error('value')
                                        <div class="alert alert-danger"> {{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group form-group col col-md-6">
                                        <label for="">min order amount</label>
                                        <input type="text" class="form-control" name="min_order_amount" value="{{ $min_order_amount }}" id="">
                                        @error('value')
                                        <div class="alert alert-danger"> {{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group col col-md-6">
                                        <label for="">	is one time</label>
                                        <select name="is_one_time" class="form-control" id="">
                                            @if ($is_one_time == 1)
                                                <option value="1" selected>YES</option>
                                                <option value="0" >NO</option>
                                            @else
                                                <option value="1">YES</option>
                                                <option value="0" selected>NO</option>
                                            @endif
                                        </select>
                                    </div>

                                        <div class="form-group col col-md-6">
                                            <label for="">type</label>
                                            <select name="type" class="form-control" id="">
                                                @if($type == 'value')
                                                    <option value="value" selected>value</option>
                                                    <option value="per" >per</option>
                                                @elseif($type == 'per')
                                                <option value="per" selected>per</option>
                                                <option value="value" >value</option>
                                                @else
                                                <option value="per" selected>per</option>
                                                <option value="value" >value</option>
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">

                                        <input type="submit" name="submit" class="form-control btm btn-primary" id="">
                                    </div>
                                </form>
                            </div>
                        </div>

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
