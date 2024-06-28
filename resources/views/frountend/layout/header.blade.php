<?php
    use App\Models\Section;
    $sections = Section::sections();
    //echo "<pre>"; print_r($sections); die;
?>

<header>
    <div id="vfx_loader_block">
        <div class="vfx-loader-item"> <img src="{{  url('frontend/images/images/main/loading.gif') }}"
                alt="" /> </div>
    </div>
    <div class="top-header-area">
        <div class="topbar-menu-area">
            <div class="container">
                <div class="topbar-menu left-menu">
                    <ul>
                        <li class="menu-itemss">
                            <a title="Hotline: (+123) 456 789" href="#"><span
                                    class="icon label-before fa fa-mobile"></span>Hotline:
                                (+123) 456 789</a>
                        </li>
                    </ul>
                </div>
                <div class="topbar-menu right-menu">
                    <ul>
                        <li class="menu-itemss menu-itemss-has-children parent">
                            <a title="Dollar (USD)" href="#">My Account<i class="fa fa-angle-down"
                                    aria-hidden="true"></i></a>
                            <ul class="submenu curency">
                                <li class="menu-itemss">
                                    <a href="#">Login</a>
                                </li>
                                <li class="menu-itemss">

                                    <a href="#">Register</a>
                                </li>
                            </ul>
                        </li>
                        <!-- <li class="menu-itemss"><a title="Register or Login" href="login.html">Login</a></li>
        <li class="menu-itemss"><a title="Register or Login" href="register.html">Register</a></li> -->
                        <li class="menu-itemss lang-menu menu-itemss-has-children parent">
                            <a title="English" href="#"><span class="img label-before"><img
                                        src="{{  url('frontend/images/images/main/lang-en.png') }}"
                                        alt="lang-en"></span>English<i class="fa fa-angle-down"
                                    aria-hidden="true"></i></a>
                            <ul class="submenu lang">
                                <li class="menu-itemss"><a title="hungary" href="#"><span class="img label-before"><img
                                                src="{{  url('frontend/images/images/main/lang-hun.png') }}"
                                                alt="lang-hun"></span>Hungary</a></li>
                                <li class="menu-itemss"><a title="german" href="#"><span class="img label-before"><img
                                                src="{{  url('frontend/images/images/main/lang-ger.png') }}"
                                                alt="lang-ger"></span>German</a></li>
                                <li class="menu-itemss"><a title="french" href="#"><span class="img label-before"><img
                                                src="{{  url('frontend/images/images/main/lang-fra.png') }}"
                                                alt="lang-fre"></span>French</a></li>
                                <li class="menu-itemss"><a title="canada" href="#"><span class="img label-before"><img
                                                src="{{  url('frontend/images/images/main/lang-can.png') }}"
                                                alt="lang-can"></span>Canada</a></li>
                            </ul>
                        </li>
                        <li class="menu-itemss menu-itemss-has-children parent">
                            <a title="Dollar (USD)" href="#">Dollar (USD)<i class="fa fa-angle-down"
                                    aria-hidden="true"></i></a>
                            <ul class="submenu curency">
                                <li class="menu-itemss">
                                    <a title="Pound (GBP)" href="#">Pound (GBP)</a>
                                </li>
                                <li class="menu-itemss">
                                    <a title="Euro (EUR)" href="#">Euro (EUR)</a>
                                </li>
                                <li class="menu-itemss">
                                    <a title="Dollar (USD)" href="#">Dollar (USD)</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div id="logo-header" data-spy="affix" data-offset-top="500" style="background-color: #eee;">

        <div class="container-fluid p-0">
            <nav class="navbar navbar-expand-lg navbar-light p-0" style="margin:0 30px">
                <!-- Brand -->
                <a class="navbar-brand ml-4" href="#"><img
                        src="{{  url('frontend/images/images/main/logo.png') }}" width="160px" alt="logo"></a>

                <form class="input-group w-auto my-auto d-none d-sm-flex">
                    <input type="search" class="form-control" placeholder="Search" />
                    <button id="btn-search" type="submit" class="button button-primary fas fa-search"></button>
                </form>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <!-- middle bar -->
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mx-auto">
                        <div class="mr-5">
                            <li class="nav-item me-3 me-lg-1 activeNav">
                                <a class="nav-link" href="./HomePage.html" title="Home Page">
                                    <span><i class="icofont-home m-3" style="font-size:25px ;"></i></span>
                                </a>
                            </li>
                            <li class="nav-item me-3 me-lg-1">
                                <a class="nav-link" href="#">
                                    <span><i class="icofont-briefcase m-2"
                                            style="font-size:25px; color: rgb(98, 113, 184);"></i></span>
                                </a>
                            </li>
                            <li class="nav-item me-3 me-lg-1">
                                <a class="nav-link" href="location.html" title="Search Product by Location">
                                    <span><i class="icofont-location-pin m-2"
                                            style="font-size:25px;  color: rgb(123, 124, 114);"></i></span>

                                </a>
                            </li>

                            <li class="nav-item me-3 me-lg-1">
                                <a class="nav-link" href="#" title="Category Listing">
                                    <img src="{{ asset('frontend/images/images/Product_listing.png ')}}" alt="" width="30px">

                                </a>
                            </li>
                        </div>

                    </ul>
                    <!-- middle bar -->

                    <!-- right bar -->
                    <div class="form-inline my-2 my-lg-0 mr-4">
                        <ul class="navbar-nav">
                            <div class="hero_meta_area ml-auto d-flex align-items-center justify-content-end">

                                <div class="cart-area">
                                    <div class="cart--btn" style="background-color: #f0eeeb;"><i
                                            class="icofont-chat"></i><span class="cart_quantity">4</span></div>

                                    <!-- Cart Dropdown Content -->
                                    <div class="cart-dropdown-content">
                                        <ul class="cart-list">
                                            <li>
                                                <div class="cart-item-desc">

                                                    <div>
                                                        <a href="#">Kid's Fashion</a>
                                                        <p>1 x - <span class="price">$32.99</span></p>
                                                    </div>
                                                </div>
                                                <span class="dropdown-product-remove"><i class="icofont-bin"></i></span>
                                            </li>
                                            <li>
                                                <div class="cart-item-desc">

                                                    <div>
                                                        <a href="#">Headphone</a>
                                                        <p>2x - <span class="price">$49.99</span></p>
                                                    </div>
                                                </div>
                                                <span class="dropdown-product-remove"><i class="icofont-bin"></i></span>
                                            </li>
                                        </ul>

                                    </div>
                                </div>
                                <div class="cart-area">
                                    <div class="cart--btn" style="background-color: #f0eeeb;"><i
                                            class="icofont-alarm"></i><span class="cart_quantity">2</span></div>

                                    <!-- Cart Dropdown Content -->
                                    <div class="cart-dropdown-content">
                                        <ul class="cart-list">
                                            <li>
                                                <div class="cart-item-desc">

                                                    <div>
                                                        <a href="#">Kid's Fashion</a>
                                                        <p>1 x - <span class="price">$32.99</span></p>
                                                    </div>
                                                </div>
                                                <span class="dropdown-product-remove"><i class="icofont-bin"></i></span>
                                            </li>
                                            <li>
                                                <div class="cart-item-desc">

                                                    <div>
                                                        <a href="#">Headphone</a>
                                                        <p>2x - <span class="price">$49.99</span></p>
                                                    </div>
                                                </div>
                                                <span class="dropdown-product-remove"><i class="icofont-bin"></i></span>
                                            </li>
                                        </ul>

                                    </div>
                                </div>

                                <!-- Wishlist -->
                                <div class="wishlist-area">
                                    <a href="wishlist.html" class="wishlist-btn" style="background-color: #f0eeeb;"><i
                                            class="icofont-heart"></i></a>
                                </div>

                                <!-- Cart -->
                                <div class="cart-area">
                                    <div class="cart--btn" style="background-color: #f0eeeb;"><i
                                            class="icofont-cart"></i> <span class="cart_quantity">2</span></div>

                                    <!-- Cart Dropdown Content -->
                                    <div class="cart-dropdown-content">
                                        <ul class="cart-list">
                                            <li>
                                                <div class="cart-item-desc">

                                                    <div>
                                                        <a href="#">Kid's Fashion</a>
                                                        <p>1 x - <span class="price">$32.99</span></p>
                                                    </div>
                                                </div>
                                                <span class="dropdown-product-remove"><i class="icofont-bin"></i></span>
                                            </li>
                                            <li>
                                                <div class="cart-item-desc">

                                                    <div>
                                                        <a href="#">Headphone</a>
                                                        <p>2x - <span class="price">$49.99</span></p>
                                                    </div>
                                                </div>
                                                <span class="dropdown-product-remove"><i class="icofont-bin"></i></span>
                                            </li>
                                        </ul>

                                    </div>
                                </div>

                                <!-- Account -->
                                <div class="account-area">
                                    <div class="user-thumbnail">
                                        <img src="{{  url('frontend/images/images/main/product/tes-2.png') }}"
                                            alt="">
                                    </div>
                                    <ul class="user-meta-dropdown">
                                        <li class="user-title"><span>Hello,</span> Lim Sarah</li>
                                        <li><a href="my-account.html">My Account</a></li>
                                        <li><a href="order-list.html">Orders List</a></li>
                                        <li><a href="wishlist.html">Wishlist</a></li>
                                        <li><a href="login.html"><i class="icofont-logout"></i> Logout</a></li>
                                    </ul>
                                </div>
                            </div>
                        </ul>
                    </div>

                </div>
            </nav>
        </div>




    </div>
</header>
