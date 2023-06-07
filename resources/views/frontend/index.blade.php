@extends('layouts.frontend')

@section('title')
    Home
@endsection

@section('content')
    <div class="image-cover hero-banner" style="background:url(https://via.placeholder.com/1920x900) no-repeat;"
        data-overlay="6">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">

                    <h1 class="big-header-capt capti">Discover Your City</h1>
                    <div class="full-search-2 Reveal-search Reveal-search-radius box-style">
                        <div class="Reveal-search-content">

                            <div class="row">

                                <div class="col-lg-4 col-md-4 col-sm-12 br-left-p">
                                    <div class="form-group">
                                        <div class="input-with-icon">
                                            <input type="text" class="form-control" placeholder="Keywords...">
                                            <i class="theme-cl ti-search"></i>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-3 col-md-3 col-sm-12 br-left-p">
                                    <div class="form-group">
                                        <div class="input-with-icon">
                                            <input type="text" class="form-control" placeholder="Location...">
                                            <i class="theme-cl ti-target"></i>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-3 col-md-3 col-sm-6">
                                    <div class="form-group">
                                        <div class="input-with-icon">
                                            <select id="list-category" class="form-control">
                                                <option value="">&nbsp;</option>
                                                <option value="1">Spa & Bars</option>
                                                <option value="2">Restaurants</option>
                                                <option value="3">Hotels</option>
                                                <option value="4">Educations</option>
                                                <option value="5">Business</option>
                                                <option value="6">Retail & Shops</option>
                                                <option value="7">Garage & Services</option>
                                            </select>
                                            <i class="theme-cl ti-briefcase"></i>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-2 col-md-2 col-sm-12">
                                    <div class="form-group">
                                        <a href="#" class="btn search-btn">Search</a>
                                    </div>
                                </div>

                            </div>

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

    <!-- ================= Explore Places ================= -->
    <section>
        <div class="container">

            <!-- Row -->
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="sec-heading center">
                        <h2>Recent</h2>
                        <h3>Recent Add <span class="theme-cl">Business</span></h3>
                    </div>
                </div>
            </div>
            <!-- Row -->
            <livewire:latest-places />

        </div>
    </section>
    <!-- ================================= Explore Property =============================== -->

    <!-- ============================ Calegory Start ================================== -->
    <section class="half light gray">
        <div class="container">
            <!-- Row -->
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="sec-heading center">
                        <h2>Category</h2>
                        <h3>All Business <span class="theme-cl">Category</span></h3>
                    </div>
                </div>
            </div>
            <!-- Row -->
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
                        <h3>Top Rated <span class="theme-cl">Business</span></h3>
                    </div>
                </div>
            </div>
            <!-- Row -->

            <livewire:top-rated-places />

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

                        @foreach ($testimonials as $testimonial)
                            <!-- Single Review -->
                            <div class="item testimonial-center">
                                <div class="Reveal-smart-tes-author">
                                    <div class="Reveal-st-author-box">
                                        <div class="Reveal-st-author-thumb">
                                            <img src="{{ asset('images/' . $testimonial->business->image) }}"
                                                class="img-fluid" alt="" />
                                        </div>
                                        <div class="Reveal-st-author-info">
                                            <h4 class="Reveal-st-author-title">{{ $testimonial->name }}</h4>
                                            <span
                                                class="Reveal-st-author-subtitle theme-cl">{{ $testimonial->post }}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="Reveal-smart-tes-content">
                                    <p>{{ $testimonial->description }}</p>
                                </div>
                            </div>
                        @endforeach


                    </div>
                </div>
            </div>

        </div>
    </section>
    <!-- ============================ Reviews End ================================== -->

    <!-- ============================ Achievement Start ================================== -->
    <section>
        <div class="container">

            <div class="row justify-content-center">
                <div class="col-lg-7 col-md-10 text-center">
                    <div class="sec-heading center mb-4">
                        <h2>Achievement</h2>
                        <h3>Some true <span class="theme-cl">Facts</span></h3>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-6">
                    <div class="achievement-wrap">
                        <div class="achievement-content">
                            <div class="ache-icon purple"><i class="ti-agenda"></i></div>
                            <h4><span class="cto">9.8</span>M</h4>
                            <p>Listing Posted</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-3 col-sm-6">
                    <div class="achievement-wrap">
                        <div class="achievement-content">
                            <div class="ache-icon green"><i class="ti-user"></i></div>
                            <h4><span class="cto">200</span>K</h4>
                            <p>Total Authors</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-3 col-sm-6">
                    <div class="achievement-wrap">
                        <div class="achievement-content">
                            <div class="ache-icon yellow"><i class="ti-medall-alt"></i></div>
                            <h4><span class="cto">99</span>K</h4>
                            <p>Win Awards</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-3 col-sm-6">
                    <div class="achievement-wrap">
                        <div class="achievement-content">
                            <div class="ache-icon red"><i class="ti-face-smile"></i></div>
                            <h4><span class="cto">7.2</span>M</h4>
                            <p>Happy Clients</p>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </section>
    <!-- ============================ Achievement End ================================== -->

    <!-- ================================= Blog Grid ================================== -->
    <section>
        <div class="container">

            <div class="row">
                <div class="col text-center">
                    <div class="sec-heading center">
                        <h2>News & Blog</h2>
                        <h3>Updates From <span class="theme-cl">BMApp</span></h3>
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
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                                ut labore et dolore. </p>
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
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                                ut labore et dolore. </p>
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
                            <h4 class="bl-title"><a href="blog-detail.html">What people says about listio properties</a>
                            </h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                                ut labore et dolore. </p>
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
@endsection
