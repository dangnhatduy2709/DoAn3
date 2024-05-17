    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Header Section Begin -->
    <header class="header">
        <div class="header__top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-7">
                        <div class="header__top__left">
                            <p>Free shipping, 30-day return or refund guarantee.</p>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-5">
                        <div class="header__top__right">
                            <div class="header__top__links">
                            @if(Auth::check())
                                <a href="{{route('Logout')}}">
                                    {{Auth::user()->name}} - Logout
                                </a>
                            @else
                                <a href="{{route('Login')}}">Sign in</a>
                            @endif
                                <a href="#">FAQs</a>
                            </div>
                            <div class="header__top__hover">
                                <span>Usd <i class="arrow_carrot-down"></i></span>
                                <ul>
                                    <li>USD</li>
                                    <li>EUR</li>
                                    <li>USD</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-3">
                    <div class="header__logo">
                        <a href=""><img class="cong" src="/WebsiteDottiesShoes/img/logogo.jpg" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <nav class="header__menu mobile-menu">
                        <ul>
                            <li><a href="{{route('TrangChu')}}">Home</a></li>
                            <li><a href="{{route('Shop')}}">Shop</a></li>
                            <li><a href="#">Pages</a>
                                <ul class="dropdown">
                                    <li><a href="">About Us</a></li>
                                   
                                    <li><a href="{{route('ShopCart')}}">Shopping Cart</a></li>
                                    <li><a href="{{route('CheckOut')}}">Check Out</a></li>
                                    <li><a href="{{route('BlogDetail')}}">Blog Details</a></li>
                                </ul>
                            </li>
                            <li><a href="{{route('Blog')}}">Blog</a></li>
                            <li><a href="{{route('Contact')}}">Contacts</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-3 col-md-3">
                    <div class="header__nav__option">
                        <a href="#" class="search-switch"><img src="/WebsiteDottiesShoes/img/icon/search.png" alt=""></a>
                        <a href="#"><img src="/WebsiteDottiesShoes/img/icon/heart.png" alt=""></a>
                        <a href="{{route('ShopCart')}}"><img src="/WebsiteDottiesShoes/img/icon/cart.png" alt=""></a>
                        <div class="price">$0.00</div>
                    </div>
                </div>
            </div>
            <div class="canvas__open"><i class="fa fa-bars"></i></div>
        </div>
    </header>
    <!-- Header Section End -->