@extends('back_end.layout');
@section('page_title', 'size Form')
@section('size_select','active')

@section('container')
<!-- END MENU SIDEBAR-->
<div class="page-container">

    <div class="main-content">
        <div class="section__content section__content--p30">

            <div class="container-fluid ">
                <h1> MANAGE SIZE </h1>
                <div class="row m-t-30">
                    <div class="col-md-2"></div>
                    <div class="col-md-8 col-lg-8">
                        <div class="card">
                            <div class="card-header text-center"> Coupon Resgisteration Form </div>
                            <div class="card-body">
                                <form action="{{ Route('save.size') }}" method="post">
                                    @csrf
                                    <div class="form-group">
                                        <label for="">title</label>
                                        <input type="hidden" class="form-control" name="size_id" value="{{ $size_id }}" id="">
                                        <input type="text" class="form-control" name="size" value="{{ $size }}" id="">
                                        @error('size')
                                        <div class="alert alert-danger"> {{ $message }}</div>
                                        @enderror
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
