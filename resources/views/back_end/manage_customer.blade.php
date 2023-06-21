@extends('back_end.layout');
@section('page_title', 'customer form')
@section('customer_select', 'active')
@section('container')
    <!-- END MENU SIDEBAR-->
    <div class="page-container">

        <div class="main-content">
            <div class="section__content section__content--p30">

                <div class="container-fluid ">
                    <h1>MANAGE CUSTOMER</h1>
                    <div class="row m-t-30">
                        <div class="col-md-2"></div>
                        <div class="col-md-8 col-lg-8">
                            <div class="card">
                                <div class="card-header text-center"> customer</div>
                                <div class="card-body">
                                    <form action="{{ Route('customer.save') }}" method="post"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                <label for="">name</label>
                                                <input type="text" class="form-control" name="customer_name"
                                                    value="{{ $customer_name }}" id="">
                                                @error('customer_name')
                                                    <div class="alert alert-danger"> {{ $message }}</div>
                                                @enderror
                                                <input type="hidden" class="form-control" name="customer_id"
                                                    value="{{ $customer_id }}" id="">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="">email</label>
                                                <input type="text" class="form-control" name="customer_email"
                                                    value="{{ $customer_email }}" id="">
                                                @error('customer_email')
                                                    <div class="alert alert-danger"> {{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="">mobile</label>
                                                <input type="text" class="form-control" name="customer_mobile"
                                                    value="{{ $customer_mobile }}" id="">
                                                @error('customer_email')
                                                    <div class="alert alert-danger"> {{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="">password</label>
                                                <input type="text" class="form-control" name="customer_password"
                                                    value="{{ $customer_password }}" id="">
                                                @error('customer_password')
                                                    <div class="alert alert-danger"> {{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="">address</label>
                                                <input type="text" class="form-control" name="customer_address"
                                                    value="{{ $customer_address }}" id="">
                                                @error('customer_address')
                                                    <div class="alert alert-danger"> {{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="">city</label>
                                                <input type="text" class="form-control" name="customer_city"
                                                    value="{{ $customer_city }}" id="">
                                                @error('customer_city')
                                                    <div class="alert alert-danger"> {{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="">state</label>
                                                <input type="text" class="form-control" name="customer_state"
                                                    value="{{ $customer_state }}" id="">
                                                @error('customer_state')
                                                    <div class="alert alert-danger"> {{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="">zip</label>
                                                <input type="text" class="form-control" name="customer_zip"
                                                    value="{{ $customer_zip }}" id="">
                                                @error('customer_zip')
                                                    <div class="alert alert-danger"> {{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="">company</label>
                                                <input type="text" class="form-control" name="customer_company"
                                                    value="{{ $customer_company }}" id="">
                                                @error('customer_company')
                                                    <div class="alert alert-danger"> {{ $message }}</div>
                                                @enderror
                                            </div>
                                           
                                            <div class="form-group col-md-6">
                                                <label for=""> Upload image </label>
    
                                                <input type="file" name="customer_image" value="" class="form-control"
                                                    id="">
                                                @error('customer_image')
                                                    <div class="alert alert-danger"> {{ $message }}</div>
                                                @enderror
                                                @if ($customer_id)
                                                    <img src="{{ url('back_end/customer/' . $customer_image) }}" width="40px"
                                                        height="40px" alt="">
                                                @endif
    
                                            </div>

                                        </div>



                             
                                        <div class="form-group">

                                            <input type="submit" name="submit" class="form-control btn btn-primary"
                                                id="">
                                        </div>
                                    </form>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">

                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>

@endsection
