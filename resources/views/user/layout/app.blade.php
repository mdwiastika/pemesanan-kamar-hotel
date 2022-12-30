<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="wpOceans">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" type="image/png" href="assets/images/favicon.png">
    <title> Parador - {{ $title }}</title>
    <link href="{{ asset('/parador/assets/css/themify-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('/parador/assets/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/parador/assets/css/flaticon.css') }}" rel="stylesheet">
    <link href="{{ asset('/parador/assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/parador/assets/css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('/parador/assets/css/owl.carousel.css') }}" rel="stylesheet">
    <link href="{{ asset('/parador/assets/css/owl.theme.css') }}" rel="stylesheet">
    <link href="{{ asset('/parador/assets/css/slick.css') }}" rel="stylesheet">
    <link href="{{ asset('/parador/assets/css/slick-theme.css') }}" rel="stylesheet">
    <link href="{{ asset('/parador/assets/css/swiper.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/parador/assets/css/owl.transitions.css') }}" rel="stylesheet">
    <link href="{{ asset('/parador/assets/css/jquery.fancybox.css') }}" rel="stylesheet">
    <link href="{{ asset('/parador/assets/css/odometer-theme-default.css') }}" rel="stylesheet">
    <link href="{{ asset('/parador/assets/css/jquery-ui.css') }}" rel="stylesheet">
    <link href="{{ asset('/parador/assets/css/style.css') }}" rel="stylesheet">
    <script src="{{ asset('/parador/assets/js/jquery.min.js') }}"></script>

</head>

<body>

    <!-- start page-wrapper -->
    <div class="page-wrapper">
       <!-- start preloader -->
       <div class="preloader">
        <div class="vertical-centered-box">
            <div class="content">
                <div class="loader-circle"></div>
                <div class="loader-line-mask">
                    <div class="loader-line"></div>
                </div>
                <img src="{{ asset('/parador/assets/images/preloader.png') }}" alt="">
            </div>
        </div>
    </div>
    <!-- end preloader -->
        <!-- Start header -->
        <header id="header">
            <div class="wpo-site-header wpo-header-style-3">
                @include('user.layout.header')
            </div>
        </header>
        <!-- end of header -->
        @yield('content')
        
        @include('user.layout.footer')

        
    </div>
    <!-- end of page-wrapper -->

    <!-- All JavaScript files
    ================================================== -->
    <script src="{{ asset('/parador/assets/js/bootstrap.bundle.min.js') }}"></script>
    <!-- Plugins for this template -->
    <script src="{{ asset('/parador/assets/js/modernizr.custom.js') }}"></script>
    <script src="{{ asset('/parador/assets/js/jquery-plugin-collection.js') }}"></script>
    <!-- Custom script for this template -->
    <script src="{{ asset('/parador/assets/js/script.js') }}"></script>
    <script src="{{ asset('/parador/assets/js/jquery.dlmenu.js') }}"></script>
</body>


</html>