<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Daily Shop | Home</title>
    <link href="{{ asset('front_assets/css/font-awesome.css') }}" rel="stylesheet">
    <link href="{{ asset('front_assets/css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('front_assets/css/jquery.smartmenus.bootstrap.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('front_assets/css/jquery.simpleLens.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('front_assets/css/slick.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('front_assets/css/nouislider.css') }}">
    <link id="switcher" href="{{ asset('front_assets/css/theme-color/default-theme.css') }}" rel="stylesheet">
    <link href="{{ asset('front_assets/css/sequence-theme.modern-slide-in.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('front_assets/css/style.css') }}" rel="stylesheet">

    <!-- Google Font -->
    <link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->


</head>

<body class="productPage">
    <script>
        var PRODUCT_IMAGE = "{{ asset('back_end/product/') }}";
    </script>
    <!-- wpf loader Two -->
    <div id="wpf-loader-two">
        <div class="wpf-loader-two-inner">
            <span>Loading</span>
        </div>
    </div>
    <!-- / wpf loader Two -->
    <!-- SCROLL TOP BUTTON -->
    <a class="scrollToTop" href="#"><i class="fa fa-chevron-up"></i></a>
    <!-- END SCROLL TOP BUTTON -->


    <!-- Start header section -->
    <header id="aa-header">
        <!-- start header top  -->
        <div class="aa-header-top">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="aa-header-top-area">
                            <!-- start header top left -->
                            <div class="aa-header-top-left">

                                <!-- start cellphone -->
                                <div class="cellphone hidden-xs">
                                    <p><span class="fa fa-phone"></span>00-62-658-658</p>
                                </div>
                                <!-- / cellphone -->
                            </div>
                            <!-- / header top left -->
                            <div class="aa-header-top-right">
                                <ul class="aa-head-top-nav-right">
                                    <li><a href="javascript:void(0)">My Account</a></li>
                                    <li class="hidden-xs"><a href="{{ '/cart' }}">My Cart</a></li>
                                    <li class="hidden-xs"><a href="{{ url('/my_order') }}">My Order</a></li>
                                    @if (session()->has('customer_login'))
                                        <li><a href="{{ url('/customer_logout') }}">Logout</a></li>
                                    @else
                                        <li><a href="" data-toggle="modal" data-target="#login-modal">Login</a>
                                        </li>
                                    @endif

                                </ul>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- / header top  -->

        <!-- start header bottom  -->
        <div class="aa-header-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="aa-header-bottom-area">
                            <!-- logo  -->
                            <div class="aa-logo">
                                <!-- Text based logo -->
                                <a href="{{ url('/') }}">
                                    <span class="fa fa-shopping-cart"></span>
                                    <p>daily<strong>Shop</strong> <span>Your Shopping Partner</span></p>
                                </a>
                                <!-- img based logo -->
                                <!-- <a href="javascript:void(0)"><img src="img/logo.jpg" alt="logo img"></a> -->
                            </div>
                            <!-- / logo  -->
                            <!-- cart box -->
                            <div class="aa-cartbox">
                                @php
                                    $cart_record = cart_record_count();
                                    $count = count($cart_record);
                                    $totalPrice = 0;
                                @endphp
                                <a class="aa-cart-link" href="">
                                    <span class="fa fa-shopping-basket"></span>
                                    <span class="aa-cart-title">SHOPPING CART</span>
                                    <span class="aa-cart-notify">{{ $count }}</span>
                                </a>

                                @if ($count != 0)
                                    <div class="aa-cartbox-summary">
                                        <ul>
                                            @foreach ($cart_record as $row)
                                                {{-- for total price --}}
                                                @php
                                                    $totalPrice = $totalPrice + $row->qty * $row->price;
                                                @endphp


                                                <li class="delete_attr_product{{ $row->id }}">
                                                    <a class="aa-cartbox-img" href="#"><img
                                                            src="{{ asset('back_end/product/' . $row->product_image) }}"
                                                            height="60px" width="60px" alt="img"></a>
                                                    <div class="aa-cartbox-info">
                                                        <h4><a href="#">{{ $row->product_name }}</a></h4>
                                                        <p> Qty:({{ $row->qty }}) = RS
                                                            {{ $row->price * $row->qty }}</p>

                                                    </div>

                                                    <a class="aa-remove-product" href="javascript:void(0)"
                                                        onclick="delete_attr_product('{{ $row->product_id }}','{{ $row->size }}','{{ $row->colour }}','{{ $row->id }}','{{ $row->price }}',' {{ $totalPrice }}')"><span
                                                            class="fa fa-times"></span></a>
                                                </li>
                                            @endforeach
                                            <li>
                                                <span class="aa-cartbox-total-title">
                                                    Total
                                                </span>
                                                <span class="aa-cartbox-total-price total_price">
                                                    Rs {{ $totalPrice }}
                                                </span>
                                            </li>

                                        </ul>
                                        <a class="aa-cartbox-checkout aa-primary-btn"
                                            href="{{ url('/cart') }}">Cart</a>
                                    </div>
                                @endif
                            </div>
                            <!-- / cart box -->
                            <!-- search box -->
                            <div class="aa-search-box">
                                <form action="">
                                    <input type="text" id="search" placeholder="Search here ex. 'man' ">
                                    <button type="button" onclick="search_fun()"><span
                                            class="fa fa-search"></span></button>
                                </form>
                            </div>
                            <!-- / search box -->
                        </div>
                    </div>
                </div>
            </div>

            {{-- modal --}}
            <!-- Button trigger modal -->
            {{-- <button type="button" class="show_modal" data-toggle="modal" data-target="#show_modal">
                Launch demo modal
            </button> --}}


        </div>
        <!-- / header bottom  -->
    </header>
    <!-- / header section -->
    <!-- menu -->
    <section id="menu">
        <div class="container">
            <div class="menu-area">
                <!-- Navbar -->
                <div class="navbar navbar-default" role="navigation">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse"
                            data-target=".navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <div class="navbar-collapse collapse">
                        <!-- Left nav -->
                        <ul class="nav navbar-nav">
                            <li><a href="{{ url('/') }}">Home</a></li>
                            {{-- @foreach ($home_cat as $row)
          
             @endforeach --}}

                            <?php
                            $home_cat2 = get_cat_data();
                            ?>

                            @foreach ($home_cat2['home_cat2'] as $row)
                                <li class=""><a href="#" class="has-submenu" id="sm-1677231373165081-1"
                                        aria-haspopup="true" aria-controls="sm-1677231373165081-2"
                                        aria-expanded="false">{{ $row->cat_name }} <span
                                            class="caret navbar-toggle sub-arrow"></span></a>
                                    <ul class="dropdown-menu sm-nowrap" id="sm-1677231373165081-2" role="group"
                                        aria-hidden="true" aria-labelledby="sm-1677231373165081-1"
                                        aria-expanded="false"
                                        style="width: auto; display: none; top: auto; left: 0px; margin-left: 0px; margin-top: 0px; min-width: 10em; max-width: 20em;">
                                        @foreach ($home_cat2['home_cat_parent'][$row->cat_id] as $row2)
                                            <li><a
                                                    href="{{ url('product_category/' . $row2->cat_id) }}">{{ $row2->cat_name }}</a>
                                            </li>
                                        @endforeach
                                        {{-- <li><a href="#" class="has-submenu" id="sm-1677231373165081-3"
                                                aria-haspopup="true" aria-controls="sm-1677231373165081-4"
                                                aria-expanded="false">And more.. <span
                                                    class="caret navbar-toggle sub-arrow"></span></a>
                                            <ul class="dropdown-menu" id="sm-1677231373165081-4" role="group"
                                                aria-hidden="true" aria-labelledby="sm-1677231373165081-3"
                                                aria-expanded="false">
                                                <li><a href="#">Sleep Wear</a></li>
                                                <li><a href="#">Sandals</a></li>
                                                <li><a href="#">Loafers</a></li>
                                            </ul>
                                        </li> --}}
                                    </ul><span class="scroll-up"
                                        style="top: auto; left: 0px; margin-left: 0px; width: 140px; z-index: 1001; background-color: rgb(255, 255, 255); display: none;"><span
                                            class="scroll-up-arrow"></span></span><span class="scroll-down"
                                        style="display: none; top: auto; left: 0px; margin-left: 0px; width: 140px; z-index: 1001; background-color: rgb(255, 255, 255);"><span
                                            class="scroll-down-arrow"></span></span>
                                </li>
                            @endforeach
                        </ul>

                    </div>
                    <!--/.nav-collapse -->
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div  class="modal fade" id="show_modal"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content" >

                    <div class="modal-body" id="modal_msg">
                       
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!-- / menu -->
    <!-- Start slider -->
    @section('container')
    @show


    <!-- footer -->
    <footer id="aa-footer">
        <!-- footer bottom -->
        <div class="aa-footer-top">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="aa-footer-top-area">
                            <div class="row">
                                <div class="col-md-3 col-sm-6">
                                    <div class="aa-footer-widget">
                                        <h3>Main Menu</h3>
                                        <ul class="aa-footer-nav">
                                            <li><a href="#">Home</a></li>
                                            <li><a href="#">Our Services</a></li>
                                            <li><a href="#">Our Products</a></li>
                                            <li><a href="#">About Us</a></li>
                                            <li><a href="#">Contact Us</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-6">
                                    <div class="aa-footer-widget">
                                        <div class="aa-footer-widget">
                                            <h3>Knowledge Base</h3>
                                            <ul class="aa-footer-nav">
                                                <li><a href="#">Delivery</a></li>
                                                <li><a href="#">Returns</a></li>
                                                <li><a href="#">Services</a></li>
                                                <li><a href="#">Discount</a></li>
                                                <li><a href="#">Special Offer</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-6">
                                    <div class="aa-footer-widget">
                                        <div class="aa-footer-widget">
                                            <h3>Useful Links</h3>
                                            <ul class="aa-footer-nav">
                                                <li><a href="#">Site Map</a></li>
                                                <li><a href="#">Search</a></li>
                                                <li><a href="#">Advanced Search</a></li>
                                                <li><a href="#">Suppliers</a></li>
                                                <li><a href="#">FAQ</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-6">
                                    <div class="aa-footer-widget">
                                        <div class="aa-footer-widget">
                                            <h3>Contact Us</h3>
                                            <address>
                                                <p> 25 Astor Pl, NY 10003, USA</p>
                                                <p><span class="fa fa-phone"></span>+1 212-982-4589</p>
                                                <p><span class="fa fa-envelope"></span>dailyshop@gmail.com</p>
                                            </address>
                                            <div class="aa-footer-social">
                                                <a href="#"><span class="fa fa-facebook"></span></a>
                                                <a href="#"><span class="fa fa-twitter"></span></a>
                                                <a href="#"><span class="fa fa-google-plus"></span></a>
                                                <a href="#"><span class="fa fa-youtube"></span></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- footer-bottom -->
        <div class="aa-footer-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="aa-footer-bottom-area">
                            <p>Designed by <a href="http://www.markups.io/">MarkUps.io</a></p>
                            <div class="aa-footer-payment">
                                <span class="fa fa-cc-mastercard"></span>
                                <span class="fa fa-cc-visa"></span>
                                <span class="fa fa-paypal"></span>
                                <span class="fa fa-cc-discover"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- / footer -->
    @php
        if (isset($_COOKIE['login_email']) && isset($_COOKIE['login_password'])) {
            $email = $_COOKIE['login_email'];
            $pass = $_COOKIE['login_password'];
            $checked = "checked='checked'";
        } else {
            $email = '';
            $pass = '';
            $checked = '';
        }
    @endphp
    <!-- Login Modal -->
    <div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

                    {{-- popup login --}}
                    <div id="popup_login">
                        <h4>Login</h4>
                        <form action="" class="aa-login-form" id="login_form">
                            @csrf
                            <label for="">Email address<span>*</span></label>
                            <input type="text" placeholder="email" name="login_email" id="login_email"
                                value="{{ $email }}">

                            <label for="">Password<span>*</span></label>
                            <input type="password" placeholder="Password" id="login_password" name="login_password"
                                value="{{ $pass }}">

                            <button type="submit" id="login_btn" class="aa-browse-btn">Login</button>
                            <div id="login_msg"></div>
                            <label class="rememberme" for="rememberme"><input type="checkbox" id="rememberme"
                                    name="rememberme" {{ $checked }}> Remember me </label>
                            <p class="aa-lost-password"><a href="javascript:void(0)" onclick="forgot_password()">Lost
                                    your password?</a></p>
                            <div class="aa-register-now">
                                Don't have an account?<a href="{{ url('/customer_register') }}">Register now!</a>
                            </div>
                        </form>
                    </div>
                    {{-- popup forget --}}
                    <div id="popup_forget" style="display: none;">
                        <h4>forgot password</h4>
                        <form action="" class="aa-login-form" id="forgot_form">
                            @csrf
                            <label for="">Email address<span>*</span></label>
                            <input type="text" placeholder="email" name="forgot_email" id="forgot_email"
                                required>

                            <button type="submit" id="forgot_btn" class="aa-browse-btn">submit</button>
                            <div id="forgot_msg"></div><br>

                            <div class="aa-register-now">
                                <a href="javascript:void(0)" onclick="show_login()">login now here</a>
                            </div>
                        </form>
                    </div>

                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="{{ asset('front_assets/js/bootstrap.js') }}"></script>
    <script type="text/javascript" src="{{ asset('front_assets/js/jquery.smartmenus.js') }}"></script>
    <script type="text/javascript" src="{{ asset('front_assets/js/jquery.smartmenus.bootstrap.js') }}"></script>
    <script src="{{ asset('front_assets/js/sequence.js') }}"></script>
    <script src="{{ asset('front_assets/js/sequence-theme.modern-slide-in.js') }}"></script>
    <script type="text/javascript" src="{{ asset('front_assets/js/jquery.simpleGallery.js') }}"></script>
    <script type="text/javascript" src="{{ asset('front_assets/js/jquery.simpleLens.js') }}"></script>
    <script type="text/javascript" src="{{ asset('front_assets/js/slick.js') }}"></script>
    <script type="text/javascript" src="{{ asset('front_assets/js/nouislider.js') }}"></script>
    <script src="{{ asset('front_assets/js/custom.js') }}"></script>
</body>

</html>
