<!doctype html>
<html class="no-js" lang="zxx">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Real state</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- <link rel="manifest" href="site.webmanifest"> -->
        <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/realstate') }}/img/favicon.png">
        <!-- Place favicon.ico in the root directory -->

        <!-- CSS here -->
        <link rel="stylesheet" href="{{ asset('assets/realstate') }}/css/bootstrap.min.css">
        <link rel="stylesheet" href="{{ asset('assets/realstate') }}/css/owl.carousel.min.css">
        <link rel="stylesheet" href="{{ asset('assets/realstate') }}/css/magnific-popup.css">
        <link rel="stylesheet" href="{{ asset('assets/realstate') }}/css/font-awesome.min.css">
        <link rel="stylesheet" href="{{ asset('assets/realstate') }}/css/themify-icons.css">
        <link rel="stylesheet" href="{{ asset('assets/realstate') }}/css/nice-select.css">
        <link rel="stylesheet" href="{{ asset('assets/realstate') }}/css/flaticon.css">
        <link rel="stylesheet" href="{{ asset('assets/realstate') }}/css/gijgo.css">
        <link rel="stylesheet" href="{{ asset('assets/realstate') }}/css/animate.css">
        <link rel="stylesheet" href="{{ asset('assets/realstate') }}/css/slick.css">
        <link rel="stylesheet" href="{{ asset('assets/realstate') }}/css/slicknav.css">
        <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/themes/smoothness/jquery-ui.css">

        <link rel="stylesheet" href="{{ asset('assets/realstate') }}/css/style.css">
        <!-- <link rel="stylesheet" href="{{ asset('assets/realstate') }}/css/responsive.css"> -->
    </head>

<body>
    <!-- header-start -->
    @if (Request::path() != url('agreement'))
    <header>
        <div class="header-area ">
            <div id="sticky-header" class="main-header-area">
                <div class="container">
                    <div class="header_bottom_border">
                        <div class="row align-items-center">
                            <div class="col-xl-3 col-lg-2">
                                <div class="logo">
                                    <a href="index.html">
                                        <img class="img-fluid" style="height:50px;" src="{{asset('assets/frent.png')}}" alt="">
                                    </a>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-7">
                                <div class="main-menu  d-none d-lg-block">
                                    <nav>
                                        <ul id="navigation">
                                            <li><a class="@yield('home-status')" href="{{ route('home') }}">Home</a></li>
                                            @if(!Auth::check())
                                            <li><a class="@yield('registration-status')" href="{{ route('registration') }}">Registration</a></li>
                                            <li><a class="@yield('login-status')" href="{{ route('login') }}">Login</a></li>
                                            @endif
                                            @if (Auth::check())
                                            <li><a href="{{route(auth()->user()->user_role.'-dashboard')}}">Dashboard</a></li>
                                            <li><a href="{{route('logout')}}">Logout</a></li>
                                            @endif
                                            <li><a href="contact.html">Contact</a></li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mobile_menu d-block d-lg-none"></div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </header>
    @endif
    <!-- header-end -->
    @yield('body')

    <!-- link that opens popup -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://static.codepen.io/assets/common/stopExecutionOnTimeout-de7e2ef6bfefd24b79a3f68b414b87b8db5b08439cac3f1012092b2290c719cd.js"></script>

    <script src=" https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"> </script>
    <!-- JS here -->
    <script src="{{ asset('assets/realstate') }}/js/vendor/modernizr-3.5.0.min.js"></script>
    <!-- <script src="{{ asset('assets/realstate') }}/js/vendor/jquery-1.12.4.min.js"></script> -->
    <script src="{{ asset('assets/realstate') }}/js/popper.min.js"></script>
    <script src="{{ asset('assets/realstate') }}/js/bootstrap.min.js"></script>
    <script src="{{ asset('assets/realstate') }}/js/owl.carousel.min.js"></script>
    <script src="{{ asset('assets/realstate') }}/js/isotope.pkgd.min.js"></script>
    <script src="{{ asset('assets/realstate') }}/js/ajax-form.js"></script>
    <script src="{{ asset('assets/realstate') }}/js/waypoints.min.js"></script>
    <script src="{{ asset('assets/realstate') }}/js/jquery.counterup.min.js"></script>
    <script src="{{ asset('assets/realstate') }}/js/imagesloaded.pkgd.min.js"></script>
    <script src="{{ asset('assets/realstate') }}/js/scrollIt.js"></script>
    <script src="{{ asset('assets/realstate') }}/js/jquery.scrollUp.min.js"></script>
    <script src="{{ asset('assets/realstate') }}/js/wow.min.js"></script>
    <script src="{{ asset('assets/realstate') }}/js/nice-select.min.js"></script>
    <script src="{{ asset('assets/realstate') }}/js/jquery.slicknav.min.js"></script>
    <script src="{{ asset('assets/realstate') }}/js/jquery.magnific-popup.min.js"></script>
    <script src="{{ asset('assets/realstate') }}/js/plugins.js"></script>
    <!-- <script src="{{ asset('assets/realstate') }}/js/gijgo.min.js"></script> -->
    <script src="{{ asset('assets/realstate') }}/js/slick.min.js"></script>



    <!--contact js-->
    <script src="{{ asset('assets/realstate') }}/js/contact.js"></script>
    <script src="{{ asset('assets/realstate') }}/js/jquery.ajaxchimp.min.js"></script>
    <script src="{{ asset('assets/realstate') }}/js/jquery.form.js"></script>
    <script src="{{ asset('assets/realstate') }}/js/jquery.validate.min.js"></script>
    <script src="{{ asset('assets/realstate') }}/js/mail-script.js"></script>


    <script src="{{ asset('assets/realstate') }}/js/main.js"></script>

    @yield('page-js')
</body>

</html>
