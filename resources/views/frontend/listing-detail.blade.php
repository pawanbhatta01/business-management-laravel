@extends('layouts.frontend')

@section('title')
    Listing Detail
@endsection

@section('content')
    <!-- ============================================================== -->
    <!-- Top header  -->
    <!-- ============================================================== -->


    <!-- ================================ Start Banner =================================== -->
    <section class="page-title-banner" style="background-image:url({{ asset('images/' . $business->image) }});">
        <div class="container">
            <div class="row m-0 align-items-end detail-swap">
                <div class="tr-list-wrap">
                    <div class="tr-list-detail">
                        <div class="tr-list-thumb">
                            <img src="{{ asset('images/' . $business->image) }}" class="img-responsive" alt="" />
                        </div>
                        <div class="tr-list-info">
                            {{-- <div class="cate-gorio"><a href="#">Restaurant</a></div> --}}
                            <h4 class="veryfied-list">{{ $business->name }}</h4>
                            <p><i class="ti-location-pin"></i>#{{ $business->address->zip }}
                                {{ $business->address->street }}</p>
                            <div class="tr-list-ratting">
                                @php
                                    $i = 0;
                                    $sum = 0;
                                    $avg = 0;
                                    foreach ($business->ratings as $rating) {
                                        $sum += $rating->rate;
                                        $i++;
                                    }
                                    
                                    if ($i != 0) {
                                        $avg = $sum / $i;
                                    }
                                @endphp
                                <div class="ratting-group">
                                    @for ($j = 0; $j < $avg; $j++)
                                        <i class="fas fa-star filled"></i>
                                    @endfor
                                    @for ($j = 0; $j < 5 - $avg; $j++)
                                        <i class="fas fa-star"></i>
                                    @endfor
                                    <span class="overall-reviews">({{ $i }} Reviews)</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ================================ End Banner ========================================= -->

    <!-- ============================ Property Detail Start ================================== -->
    <section class="gray">
        <div class="container">
            <div class="row">

                <!-- property main detail -->
                <div class="col-lg-8 col-md-12 col-sm-12">

                    <!-- Single Block Wrap -->
                    <div class="Reveal-block-wrap">

                        <div class="Reveal-block-header">
                            <h4 class="block-title">Description</h4>
                        </div>

                        <div class="Reveal-block-body">
                            {{ $business->description }}
                        </div>

                    </div>

                    <!-- Single Block Wrap -->
                    <div class="Reveal-block-wrap">

                        <div class="Reveal-block-header">
                            <h4 class="block-title">Ameneties</h4>
                        </div>

                        <div class="Reveal-block-body">
                            <ul class="avl-features third">
                                <li>Air Conditioning</li>
                                <li>Swimming Pool</li>
                                <li>Central Heating</li>
                                <li>Laundry Room</li>
                                <li>Gym</li>
                                <li>Alarm</li>
                                <li>Window Covering</li>
                                <li>Internet</li>
                                <li>Pets Allow</li>
                                <li>Free WiFi</li>
                                <li>Car Parking</li>
                                <li>Spa & Massage</li>
                            </ul>
                        </div>

                    </div>

                    <!-- Single Block Wrap -->
                    <div class="Reveal-block-wrap">

                        <div class="Reveal-block-header">
                            <h4 class="block-title">Location</h4>
                        </div>

                        <div class="Reveal-block-body">
                            <div class="map-container">
                                <iframe
                                    src="https://maps.google.com/maps?q={{ $business->address->city }}&t=&z=13&ie=UTF8&iwloc=&output=embed"
                                    width="100%" height="400" frameborder="0" style="border:0;" allowfullscreen=""
                                    aria-hidden="false" tabindex="0"></iframe>
                            </div>

                        </div>

                    </div>


                    <livewire:user-rating :slug="$business->slug" />


                </div>

                <!-- Listing Sidebar -->
                <div class="col-lg-4 col-md-12 col-sm-12">

                    <div class="verified-list mb-4">
                        <i class="ti-check"></i>Verified Listing
                    </div>

                    <div class="page-sidebar">

                        <!-- Agent Detail -->
                        <div class="Reveal-side-widget form-submit">
                            <div class="Reveal-Reveal-side-widget-header dark green">
                                <div class="Reveal-thumb-photo"><img src="https://via.placeholder.com/400x400"
                                        alt=""></div>
                                <div class="Reveal-thumb-details">
                                    <h4>Shaurya Preet</h4>
                                    <span>202 Listings</span>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="Reveal-Reveal-side-widget-body">
                                <div class="form-group">
                                    <label>Full Name</label>
                                    <input type="text" class="form-control" placeholder="Your Name">
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="text" class="form-control" placeholder="Your Email">
                                </div>
                                <div class="form-group">
                                    <label>Message</label>
                                    <textarea class="form-control" placeholder="Send Message to author..."></textarea>
                                </div>
                                <button class="btn btn-theme full-width">Send Message</button>
                            </div>
                        </div>
                        @php
                            date_default_timezone_set('Asia/Kathmandu');
                            $today = date('Y-m-d', time());
                            $day = date('l');
                            $schedule = \App\Models\Schedule::where('day', $day)
                                ->where('business_id', $business->id)
                                ->first();
                            $start = strtotime($today . ' ' . $schedule->opening);
                            $end = strtotime($today . ' ' . $schedule->closing);
                            if (time() >= $start && time() <= $end) {
                                $status = 'Now Open';
                            } else {
                                $status = 'Closed';
                            }
                        @endphp
                        <!-- Listing Hour Detail -->
                        <div class="Reveal-side-widget">
                            <div class="Reveal-Reveal-side-widget-header dark red">
                                <div class="Reveal-thumb-details">
                                    <h4>Opening Time</h4>
                                    <span>{{ $schedule->opening }} To {{ $schedule->closing }}</span>
                                </div>
                                <div class="opening-status">{{ $status }}</div>
                                <div class="clearfix"></div>
                            </div>

                            <div class="Reveal-other-body">
                                <ul class="listing-hour-day">
                                    @foreach ($business->schedules as $s)
                                        <li class="{{ $s->day == $day ? 'active' : '' }}">
                                            <span class="listing-hour-day">{{ $s->day }}</span>
                                            <span class="listing-hour-time">{{ $s->opening }} -
                                                {{ $s->closing }}</span>
                                        </li>
                                    @endforeach

                                </ul>
                            </div>

                        </div>

                        <!-- Some Imp Boxes -->
                        <div class="imp-boxes">
                            <div class="imp-boxes-single">
                                <div class="imp-boxes-single-icon"><img src="{{ asset('assets/img/phone.svg') }}"
                                        width="25" alt="" /></div>
                                <div class="imp-boxes-single-content">{{ $business->contact->mobile }}</div>
                            </div>
                            <div class="imp-boxes-single">
                                <div class="imp-boxes-single-icon"><img src="{{ asset('assets/img/mail.svg') }}"
                                        width="25" alt="" /></div>
                                <div class="imp-boxes-single-content">{{ $business->contact->email }}</div>
                            </div>
                            <div class="imp-boxes-single">
                                <div class="imp-boxes-single-icon"><img src="{{ asset('assets/img/share.svg') }}"
                                        width="25" alt="" /></div>
                                <div class="imp-boxes-single-content">
                                    <ul>
                                        <li><a href="#"><i class="ti-facebook"></i></a></li>
                                        <li><a href="#"><i class="ti-twitter"></i></a></li>
                                        <li><a href="#"><i class="ti-google"></i></a></li>
                                        <li><a href="#"><i class="ti-instagram"></i></a></li>
                                        <li><a href="#"><i class="ti-linkedin"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- Some Imp Boxes -->


                        <!-- Business Info -->
                        <div class="tr-single-box">
                            <div class="tr-single-header">
                                <h4><i class="ti-direction"></i> Listing Info</h4>
                            </div>

                            <div class="Reveal-other-body">
                                <ul class="Reveal-service">
                                    <li>
                                        <div class="Reveal-service-icon">
                                            <a href="#">
                                                <div class="Reveal-icon-box-round">
                                                    <i class="lni-map-marker"></i>
                                                </div>
                                                <div class="Reveal-icon-box-text">
                                                    {{ $business->address->street }}
                                                </div>
                                            </a>
                                        </div>
                                    </li>

                                    <li>
                                        <div class="Reveal-service-icon">
                                            <a href="#">
                                                <div class="Reveal-icon-box-round">
                                                    <i class="lni-phone-handset"></i>
                                                </div>
                                                <div class="Reveal-icon-box-text">
                                                    {{ $business->contact->tel }}
                                                </div>
                                            </a>
                                        </div>
                                    </li>

                                    <li>
                                        <div class="Reveal-service-icon">
                                            <a href="#">
                                                <div class="Reveal-icon-box-round">
                                                    <i class="lni-envelope"></i>
                                                </div>
                                                <div class="Reveal-icon-box-text">
                                                    {{ $business->contact->email }}
                                                </div>
                                            </a>
                                        </div>
                                    </li>

                                    <li>
                                        <div class="Reveal-service-icon">
                                            <a href="#">
                                                <div class="Reveal-icon-box-round">
                                                    <i class="lni-world"></i>
                                                </div>
                                                <div class="Reveal-icon-box-text">
                                                    www.myfinding.com
                                                </div>
                                            </a>
                                        </div>
                                    </li>

                                </ul>
                            </div>

                        </div>

                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- ============================ Property Detail End ================================== -->


    <!-- ============================ Call To Action Start ================================== -->
    <section class="call-to-act" style="background:#e4074e url(assets/img/landing-bg.png) no-repeat">
        <div class="container">
            <div class="row justify-content-center">

                <div class="col-lg-7 col-md-8">
                    <div class="clt-caption text-center mb-4">
                        <h3>Subscribe Now!</h3>
                        <p>Simple pricing plans. Unlimited web maintenance service</p>
                    </div>
                    <div class="inner-flexible-box subscribe-box">
                        <div class="input-group">
                            <input type="text" class="form-control large" placeholder="Enter your mail here">
                            <button class="btn btn-subscribe" type="button"><i class="fa fa-arrow-right"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ============================ Call To Action End ================================== -->

    <!-- ============================ Footer Start ================================== -->
    <footer class="dark-footer skin-dark-footer">
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
                        <p class="mb-0">© 2021 Reveal. Designd By <a href="https://themezhub.net">Themezhub</a> All
                            Rights Reserved</p>
                    </div>

                </div>
            </div>
        </div>
    </footer>
    <!-- ============================ Footer End ================================== -->


    <a id="back2Top" class="top-scroll" title="Back to top" href="#"><i class="ti-arrow-up"></i></a>
@endsection
