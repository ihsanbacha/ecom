<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>@yield('page_title')</title>

    <!-- Fontfaces CSS-->
    <link href="{{url('back_end/css/font-face.css')}}" rel="stylesheet" media="all">
    <link href="{{url('back_end/vendor/font-awesome-4.7/css/font-awesome.min.css')}}" rel="stylesheet" media="all">
    <link href="{{url('back_end/vendor/font-awesome-5/css/fontawesome-all.min.css')}}" rel="stylesheet" media="all">
    <link href="{{url('back_end/vendor/mdi-font/css/material-design-iconic-font.min.css')}}" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="{{url('back_end/vendor/bootstrap-4.1/bootstrap.min.css')}}" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="{{url('back_end/vendor/animsition/animsition.min.css')}}" rel="stylesheet" media="all">
    <link href="{{url('back_end/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css')}}" rel="stylesheet" media="all">
    <link href="{{url('back_end/vendor/wow/animate.css')}}" rel="stylesheet" media="all">
    <link href="{{url('back_end/vendor/css-hamburgers/hamburgers.min.css')}}" rel="stylesheet" media="all">
    <link href="{{url('back_end/vendor/slick/slick.css')}}" rel="stylesheet" media="all">
    <link href="{{url('back_end/vendor/select2/select2.min.css')}}" rel="stylesheet" media="all">
    <link href="{{url('back_end/vendor/perfect-scrollbar/perfect-scrollbar.css')}}" rel="stylesheet" media="all">
    <link href="{{url('back_end/vendor/vector-map/jqvmap.min.css')}}" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="{{url('back_end/css/theme.css')}}" rel="stylesheet" media="all">

</head>

<body class="animsition">

    <div class="page-wrapper">
        <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar2">
            <div class="logo">
                <a href="#">
                    <img src="{{url('back_end/images/icon/logo-white.png')}}" alt="Cool Admin" />
                </a>
            </div>
            <div class="menu-sidebar2__content js-scrollbar1">
                <div class="account2">
                    <div class="image img-cir img-120">
                        <img src="{{url('back_end/images/icon/avatar-big-01.jpg')}}" alt="John Doe" />
                    </div>
                    <h4 class="name">john doe</h4>
                    <a href="{{url('logout')}}">Sign out</a>
                </div>
                <!-- nave bar -->
                <nav class="navbar-sidebar2">
                    <ul class="list-unstyled navbar__list">
                        <li class="@yield('user_select')">
                            <a class="js-arrow" href="{{url('user')}}">
                            <i class="fas fa-user"></i>Admin
                            </a>
                        </li>
                        <li class="@yield('category_select')">
                            <a class="js-arrow" href="{{url('category')}}">
                            <i class="fas fa-list"></i>Category
                            </a>
                        </li>

                        <li class="@yield('coupon_select')">
                            <a class="js-arrow" href="{{url('coupon')}}">
                            <i class="fas fa-tag"></i>Coupon
                            </a>
                        </li>
                        <li class="@yield('size_select')">
                            <a class="js-arrow" href="{{url('size')}}">
                            <i class="fas fa-window-maximize"></i>size
                            </a>
                        </li>
                        <li class="@yield('colour_select')">
                            <a class="js-arrow" href="{{url('colour')}}">
                            <i class="fas fa-paint-brush"></i>colour
                            </a>
                        </li>
                        <li class="@yield('brand_select')">
                            <a class="js-arrow" href="{{url('brand')}}">
                            <i class="fas fa-bold"></i>brand
                            </a>
                        </li>
                        <li class="@yield('taxs_select')">
                            <a class="js-arrow" href="{{url('taxs')}}">
                            <i class="fas fa-percent"></i>taxs
                            </a>
                        </li>
                        <li class="@yield('banner_select')">
                            <a class="js-arrow" href="{{url('banner')}}">
                            <i class="fas fa-images"></i>banner
                            </a>
                        </li>
                        <li class="@yield('product_select')">
                            <a class="js-arrow" href="{{url('product')}}">
                            <i class="fas fa-tachometer-alt"></i>product
                            </a>
                        </li>
                        <li class="@yield('customer_select')">
                            <a class="js-arrow" href="{{url('customer')}}">
                            <i class="fas fa-users"></i>customer
                            </a>
                        </li>
                        <li class="@yield('show_customer_orders_select')">
                            <a class="js-arrow" href="{{url('show_customer_orders')}}">
                                <i class="fas fa-shopping-basket"></i>customer orders
                            </a>
                        </li>
                        <li class="@yield('customer_orders_review_select')">
                            <a class="js-arrow" href="{{url('customer_orders_review')}}">
                                <i class="fas fa-comment"></i>customer review
                            </a>
                        </li>
                       
                    </ul>
                </nav>
                <!-- nave bar end  -->
               
            </div>
        </aside>
        <!-- END MENU SIDEBAR-->
        @section('container')
        @show

        <!-- PAGE CONTAINER-->
        <div class="page-container2">
            <!-- HEADER DESKTOP-->
            <header class="header-desktop2">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="header-wrap2">
                            <div class="logo d-block d-lg-none">
                                <a href="#">
                                    <img src="images/icon/logo-white.png" alt="CoolAdmin" />
                                </a>
                            </div>
                            <div class="header-button2">
                                <div class="header-button-item js-item-menu">
                                    <i class="zmdi zmdi-search"></i>
                                    <div class="search-dropdown js-dropdown">
                                        <form action="">
                                            <input class="au-input au-input--full au-input--h65" type="text" placeholder="Search for datas &amp; reports..." />
                                            <span class="search-dropdown__icon">
                                                <i class="zmdi zmdi-search"></i>
                                            </span>
                                        </form>
                                    </div>
                                </div>
                                <div class="header-button-item has-noti js-item-menu">
                                    <i class="zmdi zmdi-notifications"></i>
                                    <div class="notifi-dropdown js-dropdown">
                                        <div class="notifi__title">
                                            <p>You have 3 Notifications</p>
                                        </div>
                                        <div class="notifi__item">
                                            <div class="bg-c1 img-cir img-40">
                                                <i class="zmdi zmdi-email-open"></i>
                                            </div>
                                            <div class="content">
                                                <p>You got a email notification</p>
                                                <span class="date">April 12, 2018 06:50</span>
                                            </div>
                                        </div>
                                        <div class="notifi__item">
                                            <div class="bg-c2 img-cir img-40">
                                                <i class="zmdi zmdi-account-box"></i>
                                            </div>
                                            <div class="content">
                                                <p>Your account has been blocked</p>
                                                <span class="date">April 12, 2018 06:50</span>
                                            </div>
                                        </div>
                                        <div class="notifi__item">
                                            <div class="bg-c3 img-cir img-40">
                                                <i class="zmdi zmdi-file-text"></i>
                                            </div>
                                            <div class="content">
                                                <p>You got a new file</p>
                                                <span class="date">April 12, 2018 06:50</span>
                                            </div>
                                        </div>
                                        <div class="notifi__footer">
                                            <a href="#">All notifications</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="header-button-item mr-0 js-sidebar-btn">
                                    <i class="zmdi zmdi-menu"></i>
                                </div>
                                <div class="setting-menu js-right-sidebar d-none d-lg-block">
                                    <div class="account-dropdown__body">
                                        <div class="account-dropdown__item">
                                            <a href="#">
                                                <i class="zmdi zmdi-account"></i>Account</a>
                                        </div>
                                        <div class="account-dropdown__item">
                                            <a href="#">
                                                <i class="zmdi zmdi-settings"></i>Setting</a>
                                        </div>
                                        <div class="account-dropdown__item">
                                            <a href="#">
                                                <i class="zmdi zmdi-money-box"></i>Billing</a>
                                        </div>
                                    </div>
                                    <div class="account-dropdown__body">
                                        <div class="account-dropdown__item">
                                            <a href="#">
                                                <i class="zmdi zmdi-globe"></i>Language</a>
                                        </div>
                                        <div class="account-dropdown__item">
                                            <a href="#">
                                                <i class="zmdi zmdi-pin"></i>Location</a>
                                        </div>
                                        <div class="account-dropdown__item">
                                            <a href="#">
                                                <i class="zmdi zmdi-email"></i>Email</a>
                                        </div>
                                        <div class="account-dropdown__item">
                                            <a href="#">
                                                <i class="zmdi zmdi-notifications"></i>Notifications</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
          
        </div>
    </div>

    

       <!-- Jquery JS-->
       <script src="{{url('back_end/vendor/jquery-3.2.1.min.js')}}"></script>
       <!-- Bootstrap JS-->
       <script src="{{url('back_end/vendor/bootstrap-4.1/popper.min.js')}}"></script>
       <script src="{{url('back_end/vendor/bootstrap-4.1/bootstrap.min.js')}}"></script>
       <!-- Vendor JS       -->
       <script src="{{url('back_end/vendor/slick/slick.min.js')}}">
       </script>
       <script src="{{url('back_end/vendor/wow/wow.min.js')}}"></script>
       <script src="{{url('back_end/vendor/animsition/animsition.min.js')}}"></script>
       <script src="{{url('back_end/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js')}}">
       </script>
       <script src="{{url('back_end/vendor/counter-up/jquery.waypoints.min.js')}}"></script>
       <script src="{{url('back_end/vendor/counter-up/jquery.counterup.min.js')}}">
       </script>
       <script src="{{url('back_end/vendor/circle-progress/circle-progress.min.js')}}"></script>
       <script src="{{url('back_end/vendor/perfect-scrollbar/perfect-scrollbar.js')}}"></script>
       <script src="{{url('back_end/vendor/chartjs/Chart.bundle.min.js')}}"></script>
       <script src="{{url('back_end/vendor/select2/select2.min.js')}}">
       </script>
       <script src="{{url('back_end/vendor/vector-map/jquery.vmap.js')}}"></script>
       <script src="{{url('back_end/vendor/vector-map/jquery.vmap.min.js')}}"></script>
       <script src="{{url('back_end/vendor/vector-map/jquery.vmap.sampledata.js')}}"></script>
       <script src="{{url('back_end/vendor/vector-map/jquery.vmap.world.js')}}"></script>
   
       <!-- Main JS-->
       <script src="{{url('back_end/js/main.js')}}"></script>

</body>

</html>
<!-- end document-->