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