@extends('back_end.layout');

@section('page_title', 'customer')
@section('customer_select', 'active')
@section('container')
    <div class="page-container">

        <div class="main-content">
            <div class="section__content section__content--p30">

             
                <div class="container-fluid">
                    <h1> customer </h1>

                    <div class="row m-t-30">
                        <div class="col-md-12">
                            <!-- DATA TABLE-->
                            <div class="table-responsive m-b-40">
                                @if (session('msg'))
                                    <div class="alert alert-success">{{ session('msg') }}</div>
                                @endif
                                <table class="content-table table table-borderless table-data3 table-hover">
                                    <thead>
                                        <tr>
                                         
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                       
                                        <tr>
                                            <td><strong>Name</strong></td>
                                            <td>{{ $row->customer_name }}</td>
                                        </tr> 
                                        <tr>
                                            <td><strong>IMAGE</strong></td>
                                            <td>{{ $row->customer_image }}</td>
                                        </tr> 
                                        <tr>
                                            <td><strong>EMAIL</strong></td>
                                            <td>{{ $row->customer_email }}</td>
                                        </tr> 
                                        <tr>
                                            <td><strong>MOBILE</strong></td>
                                            <td>{{ $row->customer_mobile }}</td>
                                        </tr> 
                                        <tr>
                                            <td><strong>ADDRESS</strong></td>
                                            <td>{{ $row->customer_address }}</td>
                                        </tr> 
                                        <tr>
                                            <td><strong>CITY</strong></td>
                                            <td>{{ $row->customer_city }}</td>
                                        </tr> 
                                        <tr>
                                            <td><strong>ZIP</strong></td>
                                            <td>{{ $row->customer_zip }}</td>
                                        </tr> 
                                       
                                        <tr>
                                            <td><strong>COMPANY</strong></td>
                                            <td>{{ $row->customer_company }}</td>
                                        </tr> 
                                        
                                       
                                      
                                    </tbody>
                                </table>
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
