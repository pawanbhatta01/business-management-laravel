@extends('layouts.frontend')

@section('title')
    Home
@endsection

@section('content')
    <!-- ============================ Hero Banner  Start================================== -->
    <div class="image-cover hero-banner" style="background:url(https://via.placeholder.com/1920x900) no-repeat;"
        data-overlay="6">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">

                    <h1 class="big-header-capt capti">Discover Business</h1>
                    <div class="full-search-2 Reveal-search Reveal-search-radius box-style">
                        <div class="Reveal-search-content">

                            <form action="{{ route('frontend.business.search') }}" method="get">
                                <div class="row">

                                    <div class="col-lg-10 col-md-10 col-sm-12 br-left-p">
                                        <div class="form-group">
                                            <div class="input-with-icon">
                                                <input type="text" class="form-control" name="q"
                                                    placeholder="Keywords...">
                                                <i class="theme-cl ti-search"></i>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-2 col-md-2 col-sm-12">
                                        <div class="form-group">
                                            <button type="submit" class="btn search-btn">Search</button>
                                        </div>
                                    </div>

                                </div>
                            </form>

                        </div>

                    </div>
                    <div class="popular-cat-list">
                        <ul>
                            <li><a href="grid-with-sidebar.html">Hotel & Spa</a></li>
                            <li><a href="grid-with-sidebar.html">Education</a></li>
                            <li><a href="grid-with-sidebar.html">Shopping</a></li>
                            <li><a href="grid-with-sidebar.html">Restaurants</a></li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- ============================ Hero Banner End ================================== -->

    <!-- ============================ Calegory Start ================================== -->
    <section class="half light gray">
        <div class="container">

            <div class="row">
                <div class="owl-carousel owl-theme" id="categorie-slide">

                    <!-- Single Category -->
                    <div class="Reveal-cats-box">
                        <a href="grid-with-sidebar.html" class="Reveal-category-box">
                            <div class="category-desc">
                                <div class="category-icon">
                                    <i class="lni-revenue theme-cl"></i>
                                    <i class="lni-revenue abs-icon"></i>
                                </div>

                                <div class="Reveal-category-detail category-desc-text">
                                    <h4>Accounting</h4>
                                    <p>122 Listings</p>
                                </div>
                            </div>
                        </a>
                    </div>

                    <!-- Single Category -->
                    <div class="Reveal-cats-box">
                        <a href="grid-with-sidebar.html" class="Reveal-category-box">
                            <div class="category-desc">
                                <div class="category-icon">
                                    <i class="lni-construction-hammer"></i>
                                </div>

                                <div class="Reveal-category-detail category-desc-text">
                                    <h4>Automotives</h4>
                                    <p>155 Listings</p>
                                </div>
                            </div>
                        </a>
                    </div>

                    <!-- Single Category -->
                    <div class="Reveal-cats-box">
                        <a href="grid-with-sidebar.html" class="Reveal-category-box">
                            <div class="category-desc">
                                <div class="category-icon">
                                    <i class="ti-briefcase"></i>
                                </div>

                                <div class="Reveal-category-detail category-desc-text">
                                    <h4>Business</h4>
                                    <p>300 Listings</p>
                                </div>
                            </div>
                        </a>
                    </div>

                    <!-- Single Category -->
                    <div class="Reveal-cats-box">
                        <a href="grid-with-sidebar.html" class="Reveal-category-box">
                            <div class="category-desc">
                                <div class="category-icon">
                                    <i class="ti-ruler-pencil"></i>
                                </div>

                                <div class="Reveal-category-detail category-desc-text">
                                    <h4>Education</h4>
                                    <p>80 Listings</p>
                                </div>
                            </div>
                        </a>
                    </div>

                    <!-- Single Category -->
                    <div class="Reveal-cats-box">
                        <a href="grid-with-sidebar.html" class="Reveal-category-box">
                            <div class="category-desc">
                                <div class="category-icon">
                                    <i class="ti-heart-broken"></i>
                                </div>

                                <div class="Reveal-category-detail category-desc-text">
                                    <h4>Healthcare</h4>
                                    <p>120 Listings</p>
                                </div>
                            </div>
                        </a>
                    </div>

                    <!-- Single Category -->
                    <div class="Reveal-cats-box">
                        <a href="grid-with-sidebar.html" class="Reveal-category-box">
                            <div class="category-desc">
                                <div class="category-icon">
                                    <i class="lni-burger"></i>
                                </div>

                                <div class="Reveal-category-detail category-desc-text">
                                    <h4>Eat & Foods</h4>
                                    <p>78 Listings</p>
                                </div>
                            </div>
                        </a>
                    </div>

                    <!-- Single Category -->
                    <div class="Reveal-cats-box">
                        <a href="grid-with-sidebar.html" class="Reveal-category-box">
                            <div class="category-desc">
                                <div class="category-icon">
                                    <i class="ti-world"></i>
                                </div>

                                <div class="Reveal-category-detail category-desc-text">
                                    <h4>Transportation</h4>
                                    <p>90 Listings</p>
                                </div>
                            </div>
                        </a>
                    </div>

                    <!-- Single Category -->
                    <div class="Reveal-cats-box">
                        <a href="grid-with-sidebar.html" class="Reveal-category-box">
                            <div class="category-desc">
                                <div class="category-icon">
                                    <i class="ti-desktop"></i>
                                </div>

                                <div class="Reveal-category-detail category-desc-text">
                                    <h4> IT & Software</h4>
                                    <p>210 Listings</p>
                                </div>
                            </div>
                        </a>
                    </div>

                </div>
            </div>

        </div>
    </section>
    <!-- ============================ Calegory End ================================== -->

    <!-- ============================ Listings Start ================================== -->
    <section>
        <div class="container">

            <!-- Row -->
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="sec-heading center">
                        <h2>Featured</h2>
                        <h3>Top Rated <span class="theme-cl">Places</span></h3>
                    </div>
                </div>
            </div>
            <!-- Row -->

            <livewire:top-rated-places />

            <!-- Row -->
            <div class="row">
                <div class="col-lg-12 col-md-12 text-center">
                    <a href="half-map-with-grid2-layout" class="btn btn-light btn-md rounded">Explore More
                        Listings</a>
                </div>
            </div>
            <!-- Row -->

        </div>
    </section>
    <!-- ============================ Listings End ================================== -->

    <!-- ============================ Reviews Start ================================== -->
    <section class="gray">
        <div class="container">

            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="sec-heading center">
                        <h2>Reviews</h2>
                        <h3>What People <span class="theme-cl">Saying</span></h3>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="owl-carousel owl-theme" id="lists-slide">

                        <!-- Single Review -->
                        <div class="item testimonial-center">
                            <div class="Reveal-smart-tes-author">
                                <div class="Reveal-st-author-box">
                                    <div class="Reveal-st-author-thumb">
                                        <img src="https://via.placeholder.com/400x400" class="img-fluid"
                                            alt="" />
                                    </div>
                                    <div class="Reveal-st-author-info">
                                        <h4 class="Reveal-st-author-title">Adam Williams</h4>
                                        <span class="Reveal-st-author-subtitle theme-cl">CEO Of Microwoft</span>
                                    </div>
                                </div>
                            </div>
                            <div class="Reveal-smart-tes-content">
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                    incididunt ut labore et.</p>
                            </div>
                        </div>

                        <!-- Single Review -->
                        <div class="item testimonial-center">
                            <div class="Reveal-smart-tes-author">
                                <div class="Reveal-st-author-box">
                                    <div class="Reveal-st-author-thumb">
                                        <img src="https://via.placeholder.com/400x400" class="img-fluid"
                                            alt="" />
                                    </div>
                                    <div class="Reveal-st-author-info">
                                        <h4 class="Reveal-st-author-title">Lilly Wikdoner</h4>
                                        <span class="Reveal-st-author-subtitle theme-cl">Content Writer</span>
                                    </div>
                                </div>
                            </div>
                            <div class="Reveal-smart-tes-content">
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                    incididunt ut labore et.</p>
                            </div>
                        </div>

                        <!-- Single Review -->
                        <div class="item testimonial-center">
                            <div class="Reveal-smart-tes-author">
                                <div class="Reveal-st-author-box">
                                    <div class="Reveal-st-author-thumb">
                                        <img src="https://via.placeholder.com/400x400" class="img-fluid"
                                            alt="" />
                                    </div>
                                    <div class="Reveal-st-author-info">
                                        <h4 class="Reveal-st-author-title">Shaurya Williams</h4>
                                        <span class="Reveal-st-author-subtitle theme-cl">Manager Of Doodle</span>
                                    </div>
                                </div>
                            </div>
                            <div class="Reveal-smart-tes-content">
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                    incididunt ut labore et.</p>
                            </div>
                        </div>

                        <!-- Single Review -->
                        <div class="item testimonial-center">
                            <div class="Reveal-smart-tes-author">
                                <div class="Reveal-st-author-box">
                                    <div class="Reveal-st-author-thumb">
                                        <img src="https://via.placeholder.com/400x400" class="img-fluid"
                                            alt="" />
                                    </div>
                                    <div class="Reveal-st-author-info">
                                        <h4 class="Reveal-st-author-title">Shrithi Setthi</h4>
                                        <span class="Reveal-st-author-subtitle theme-cl">CEO Of Applio</span>
                                    </div>
                                </div>
                            </div>
                            <div class="Reveal-smart-tes-content">
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                    incididunt ut labore et.</p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </section>
    <!-- ============================ Reviews End ================================== -->

    <!-- ================================= Blog Grid ================================== -->
    <section>
        <div class="container">

            <div class="row">
                <div class="col text-center">
                    <div class="sec-heading center">
                        <h2>News & Blog</h2>
                        <h3>Updates From <span class="theme-cl">Reveal</span></h3>
                    </div>
                </div>
            </div>

            <div class="row">

                <!-- Single blog Grid -->
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="Reveal-blog-wrap-grid">

                        <div class="Reveal-blog-thumb">
                            <a href="blog-detail.html"><img src="https://via.placeholder.com/1200x800" class="img-fluid"
                                    alt="" /></a>
                        </div>

                        <div class="Reveal-blog-info">
                            <span class="post-date">By Shilpa Sheri</span>
                        </div>

                        <div class="Reveal-blog-body">
                            <h4 class="bl-title"><a href="blog-detail.html">Why people choose listio for own
                                    properties</a></h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                incididunt ut labore et dolore. </p>
                        </div>

                        <div class="blog-cates">
                            <ul>
                                <li><a href="#" class="blog-cates-list style-4">Health</a></li>
                                <li><a href="#" class="blog-cates-list style-3">Business</a></li>
                            </ul>
                        </div>

                    </div>
                </div>

                <!-- Single blog Grid -->
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="Reveal-blog-wrap-grid">

                        <div class="Reveal-blog-thumb">
                            <a href="blog-detail.html"><img src="https://via.placeholder.com/1200x800" class="img-fluid"
                                    alt="" /></a>
                        </div>

                        <div class="Reveal-blog-info">
                            <span class="post-date">By Shaurya</span>
                        </div>

                        <div class="Reveal-blog-body">
                            <h4 class="bl-title"><a href="blog-detail.html">List of benifits and impressive listeo
                                    services</a></h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                incididunt ut labore et dolore. </p>
                        </div>

                        <div class="blog-cates">
                            <ul>
                                <li><a href="#" class="blog-cates-list style-1">Banking</a></li>
                                <li><a href="#" class="blog-cates-list style-5">Stylish</a></li>
                            </ul>
                        </div>

                    </div>
                </div>

                <!-- Single blog Grid -->
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="Reveal-blog-wrap-grid">

                        <div class="Reveal-blog-thumb">
                            <a href="blog-detail.html"><img src="https://via.placeholder.com/1200x800" class="img-fluid"
                                    alt="" /></a>
                        </div>

                        <div class="Reveal-blog-info">
                            <span class="post-date">By Admin K.</span>
                        </div>

                        <div class="Reveal-blog-body">
                            <h4 class="bl-title"><a href="blog-detail.html">What people says about listio
                                    properties</a></h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                incididunt ut labore et dolore. </p>
                        </div>

                        <div class="blog-cates">
                            <ul>
                                <li><a href="#" class="blog-cates-list style-1">Fashion</a></li>
                                <li><a href="#" class="blog-cates-list style-2">Wedding</a></li>
                            </ul>
                        </div>

                    </div>
                </div>

            </div>

        </div>
    </section>
    <!-- ============================= Blog Grid End ================================ -->

    <!-- ============================ Call To Action Start ================================== -->
    <section class="p-0">
        <div class="container">
            <div class="row call-wrapios theme-bg">

                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="call-wrapios-box">
                        <div class="call-wrapios-box-icon">
                            <img src="assets/img/big-24-hours.svg" class="img-fluid" alt="" />
                        </div>
                        <div class="call-wrapios-box-caption">
                            <h5>Make A Call</h5>
                            <h3>+91 532 548 7596</h3>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="call-wrapios-box">
                        <div class="call-wrapios-box-icon">
                            <img src="assets/img/big-newsletter.svg" class="img-fluid" alt="" />
                        </div>
                        <div class="call-wrapios-box-caption">
                            <h5>Subscribe Now!</h5>
                            <div class="inner-flexible-box subscribe-box">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Enter your mail here">
                                    <button class="btn btn-subscribe" type="button"><i
                                            class="fa fa-arrow-right"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- ============================ Call To Action End ================================== -->

    <!-- ============================ Footer Start ================================== -->
    <footer class="dark-footer skin-dark-footer">
        <div class="ht-80"></div>
        <div>
            <div class="container">
                <div class="row">

                    <div class="col-lg-4 col-md-6">
                        <div class="footer-widget">
                            <img src="assets/img/logo-light.png" class="img-fluid f-logo" alt="" />
                            <p>407-472 Rue Saint-Sulpice, Montreal<br>Quebec, H2Y 2V8</p>
                            <ul class="footer-bottom-social">
                                <li><a href="#"><i class="ti-facebook"></i></a></li>
                                <li><a href="#"><i class="ti-twitter"></i></a></li>
                                <li><a href="#"><i class="ti-instagram"></i></a></li>
                                <li><a href="#"><i class="ti-linkedin"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-4">
                        <div class="footer-widget">
                            <h4 class="widget-title">Useful links</h4>
                            <ul class="footer-menu">
                                <li><a href="about-us.html">About Us</a></li>
                                <li><a href="faq.html">FAQs Page</a></li>
                                <li><a href="checkout.html">Checkout</a></li>
                                <li><a href="login.html">Login</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-2 col-md-4">
                        <div class="footer-widget">
                            <h4 class="widget-title">Developers</h4>
                            <ul class="footer-menu">
                                <li><a href="booking.html">Booking</a></li>
                                <li><a href="stays.html">Stays</a></li>
                                <li><a href="adventures.html">Adventures</a></li>
                                <li><a href="author-detail.html">Author Detail</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-2 col-md-4">
                        <div class="footer-widget">
                            <h4 class="widget-title">Useful links</h4>
                            <ul class="footer-menu">
                                <li><a href="about-us.html">About Us</a></li>
                                <li><a href="faq.html">Jobs</a></li>
                                <li><a href="checkout.html">Events</a></li>
                                <li><a href="about-us.html">Press</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-2 col-md-4">
                        <div class="footer-widget">
                            <h4 class="widget-title">Useful links</h4>
                            <ul class="footer-menu">
                                <li><a href="about-us.html">Support</a></li>
                                <li><a href="about-us.html">About Us</a></li>
                                <li><a href="checkout.html">Privacy & Terms</a></li>
                            </ul>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="footer-bottom">
            <div class="container">
                <div class="row align-items-center">

                    <div class="col-lg-12 col-md-12 text-center">
                        <p class="mb-0">© 2021 Reveal. Designd By <a href="https://themezhub.net">Themezhub</a>
                            All Rights Reserved</p>
                    </div>

                </div>
            </div>
        </div>
    </footer>
    <!-- ============================ Footer End ================================== -->
@endsection
