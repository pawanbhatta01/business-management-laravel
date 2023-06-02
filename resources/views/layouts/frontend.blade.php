<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <title>@yield('title') | Mero Business</title>

    <!-- All Plugins Css -->
    <link rel="stylesheet" href="{{ asset('assets/css/plugins.css') }}">



    <!-- Custom CSS -->
    <link href="{{ asset('assets/css/styles.css') }}" rel="stylesheet">

    <!-- Custom Color Option -->
    <link href="{{ asset('assets/css/colors.css') }}" rel="stylesheet">
    @livewireStyles

</head>

<body class="red-skin">
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div id="preloader">
        <div class="preloader"><span></span><span></span></div>
    </div>

    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">

        <!-- ============================================================== -->
        <!-- Top header  -->
        <!-- ============================================================== -->
        <!-- Start Navigation -->
        <div class="header header-dark">
            <div class="container">
                <nav id="navigation" class="navigation navigation-landscape">
                    <div class="nav-header">
                        <a class="nav-brand" href="#">
                            {{-- <img src="assets/img/logo-light.png" class="logo hd-992" alt="" />
                            <img src="assets/img/logo.png" class="logo sw-m" alt="" /> --}}
                            <span style="color: red; font-weight:bold;">Mero</span><span
                                style="color: blue; ">Business</span>
                        </a>
                        <div class="nav-toggle"></div>
                    </div>
                    <div class="nav-menus-wrapper" style="transition-property: none;">
                        <ul class="nav-menu">

                            <li class="{{ request()->routeIs('frontend.home') ? 'active' : '' }}"><a
                                    href="{{ route('frontend.home') }}">Home</a>
                            </li>

                            <li><a href="javascript:void(0);">Listings</a>
                            </li>

                            <li><a href="contact.html">Contacts</a></li>

                        </ul>

                        <ul class="nav-menu nav-menu-social align-to-right">

                            @if (!Auth::user())
                                <li>
                                    <a href="{{ route('login') }}">
                                        <i class="fa fa-sign-in-alt mr-1"></i>
                                        <span>Sign In</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('register') }}">
                                        <span>Sign Up</span>
                                    </a>
                                </li>
                            @else
                                <li>
                                    <a href="{{ route('dashboard') }}">
                                        <span>Dashboard</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('logout') }}"
                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        <span class="align-middle">Log Out</span>
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </li>
                                @if (Auth::user()->role == 1)
                                    <li class="add-listing bg-whit">
                                        <a href="{{ Auth::user() ? route('manageBusinesses') : route('login') }}">
                                            <i class="fas fa-plus-circle"></i> Add Listings
                                        </a>
                                    </li>
                                @endif
                            @endif

                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <!-- End Navigation -->
        <div class="clearfix"></div>
        <!-- ============================================================== -->
        <!-- Top header  -->
        <!-- ============================================================== -->

        <a id="back2Top" class="top-scroll" title="Back to top" href="#"><i class="ti-arrow-up"></i></a>

        @yield('content')

    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->

    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/rangeslider.js') }}"></script>
    <script src="{{ asset('assets/js/select2.min.js') }}"></script>
    <script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('assets/js/slick.js') }}"></script>
    <script src="{{ asset('assets/js/slider-bg.js') }}"></script>
    <script src="{{ asset('assets/js/lightbox.js') }}"></script>
    <script src="{{ asset('assets/js/imagesloaded.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('assets/js/counterup.min.js') }}"></script>

    <script src="{{ asset('assets/js/custom.js') }}"></script>
    <!-- ============================================================== -->
    <!-- This page plugins -->
    <!-- ============================================================== -->
    @livewireScripts

</body>

</html>
