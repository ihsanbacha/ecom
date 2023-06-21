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
                                  
                                    <tbody>

                                        <div class="row"  style="background-color: rgb(155, 189, 220)">
                                            <div class="col col-md-4  mt-10"></div>
                                            <div class="col col-md-4  mt-10"><strong> UPDATE ORDER</strong></div>
                                            <div class="col col-md-4  mt-10"></div>
                                        </div>
                                        <div class="row"  style="background-color:white">
                                            <div class="col col-md-12"></div>
                                        </div>
                                        <div class="row " >
                                            @if(session('msg'))      
                                            <div class="alert alert-success">{{session('msg')}}</div>  
                                             @endif
                                               <form action="submit" method="POST" style="padding-top: 14px">
                                                <input type="hidden" name="order_id" value="{{$orders[0]->order_id}}">
                                                @csrf
                                                <div class="col-md-1" style="background-color:white" ></div>
                                                <br>
                                                <div class="col-md-10"  style="background-color:white"  ><br> PAYMENT STATUS:
                                                <select name="payment_status" class="form-control" >
                                                   <option value="">SELECT PAYMENT</option>
                                                   <option value="success">Success</option>
                                                   <option value="pending">Pending</option>
                                                </select>
                                                ORDER STATUS:
                                                <select name="order_status" class="form-control" >
                                                   <option value="">SELECT ORDER STATUS</option>
                                                   <option value="item has been dispatched">item has been dispatched</option>
                                                   <option value="on the way">on the way</option>
                                                   <option value="delivered">Delivered</option>
                                                </select>
                                                <br>
                                                <input class="form-control btn btn-primary" type="submit" name="submit" value="UPDATE">
                                                <br><br>
                                               </form>
                                            </div>
                                           
                                            <div class="col-md-1" style="background-color:white" >
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
