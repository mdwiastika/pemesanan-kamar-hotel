<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from wpocean.com/html/tf/parador/index-3.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 27 Dec 2022 16:00:19 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="wpOceans">
    <link rel="shortcut icon" type="image/png" href="{{ asset('/parador/assets/images/favicon.png') }}">
    <title>Parador - Hotel Booking</title>
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
            <div class="wpo-site-header">
                <nav class="navigation navbar navbar-expand-lg navbar-light">
                    <div class="container-fluid">
                        <div class="row align-items-center">
                            <div class="col-lg-3 col-md-3 col-3 d-lg-none dl-block">
                                <div class="mobail-menu">
                                    <button type="button" class="navbar-toggler open-btn">
                                        <span class="sr-only">Toggle navigation</span>
                                        <span class="icon-bar first-angle"></span>
                                        <span class="icon-bar middle-angle"></span>
                                        <span class="icon-bar last-angle"></span>
                                    </button>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-6 col-6">
                                <div class="navbar-header">
                                    <a class="navbar-brand" href="index.html">
                                        <img src="{{ asset('/parador/assets/images/logo2.png') }}"
                                                alt="">
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-9 col-md-1 col-1">
                                <div id="navbar" class="collapse navbar-collapse navigation-holder">
                                    <button class="menu-close"><i class="ti-close"></i></button>
                                    <ul class="nav navbar-nav mb-2 mb-lg-0">
                                        <li class="menu-item-has-children">
                                            <a class="active" href="/homepage">Home</a>
                                        </li>
                                        <li class="menu-item-has-children">
                                            <a href="/room">Room</a>
                                        </li>
                                        <li><a href="/contact">Contact</a></li>
                                        <li><a href="/history">History</a></li>
                                        <li style="display: flex; justify-content: center; align-items: center;">
                                        <form action="/logout" method="POST" style="margin-top: 10px">
                                            @csrf
                                            <button type="submit" style="background-color: transparent; border: none;"><h3><i class="fa fa-sign-out" aria-hidden="true"></i></h3></button>
                                        </form>
                                        </li>
                                    </ul>

                                </div><!-- end of nav-collapse -->
                            </div>
                            <div class="col-lg-1 col-md-2 col-2">
                                <div class="header-right">
                                    <div class="header-search-form-wrapper">
                                        <div class="cart-search-contact">
                                            <button class="search-toggle-btn"><i
                                                    class="fi flaticon-search"></i></button>
                                            <div class="header-search-form">
                                                <form>
                                                    <div>
                                                        <input type="text" class="form-control"
                                                            placeholder="Search here...">
                                                        <button type="submit"><i
                                                                class="fi flaticon-search"></i></button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mini-cart">
                                        <button class="cart-toggle-btn"><a href="/cart"> <i class="fi flaticon-shopping-cart"></i> </a><span
                                                class="cart-count">2</span></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- end of container -->
                </nav>
            </div>
        </header>
        <!-- end of header -->
        <!-- start of hero -->
        <section class="hero-style-3">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="wpo-slide-content">
                            <div class="slide-title">
                                <h2>Stay Once Carry Memories Forever</h2>
                            </div>
                            <div class="wpo-hero-subtitle">
                                <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form.</p>
                            </div>
                            <div class="clearfix"></div>
                            <div class="slide-btns">
                                <a href="/room" class="theme-btn">Check Now!</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="right-vec">
                            <div class="right-items-wrap">
                                <div class="right-item">
                                    <div class="r-img">
                                        <img src="{{ asset('/parador/assets/images/slider/slide-4.jpg') }}" alt="">
                                    </div>
                                    <div class="sp-1"><img src="{{ asset('/parador/assets/images/slider/sp2.png') }}" alt=""></div>
                                    <div class="sp-2"><img src="{{ asset('/parador/assets/images/slider/sp1.png') }}" alt=""></div>
                                    <div class="sp-3"><img src="{{ asset('/parador/assets/images/slider/sp3.png') }}" alt=""></div>
                                    <div class="sp-4"><img src="{{ asset('/parador/assets/images/slider/sp4.png') }}" alt=""></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="visible-text">
                <h2>Parador</h2>
            </div>
        </section>
        <!-- end of wpo-hero-slide-section-->
       @include('user.layout.footer')

    </div>
    <!-- end of page-wrapper -->

    <!-- All JavaScript files
    ================================================== -->
    <script src="{{ asset('/parador/assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('/parador/assets/js/bootstrap.bundle.min.js') }}"></script>
    <!-- Plugins for this template -->
    <script src="{{ asset('/parador/assets/js/modernizr.custom.js') }}"></script>
    <script src="{{ asset('/parador/assets/js/jquery-plugin-collection.js') }}"></script>
    <!-- Custom script for this template -->
    <script src="{{ asset('/parador/assets/js/script.js') }}"></script>
</body>


<!-- Mirrored from wpocean.com/html/tf/parador/index-3.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 27 Dec 2022 16:00:23 GMT -->
</html>