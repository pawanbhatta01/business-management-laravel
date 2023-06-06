@extends('layouts.frontend')

@section('title')
    Contact
@endsection

@section('content')
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

    <div class="container">
        @include('layouts.businessnavbar')
    </div>

    <section class="gray">

        <div class="container">

            <div class="row">

                <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="contact-box">
                        <i class="ti-shopping-cart theme-cl"></i>
                        <h4>Contact Sales</h4>
                        <p>sales@rikadahelp.co.uk</p>
                        <span>+01 215 245 6258</span>
                    </div>
                </div>

                <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="contact-box">
                        <i class="ti-user theme-cl"></i>
                        <h4>Contact Sales</h4>
                        <p>sales@rikadahelp.co.uk</p>
                        <span>+01 215 245 6258</span>
                    </div>
                </div>

                <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="contact-box">
                        <i class="ti-comment-alt theme-cl"></i>
                        <h4>Start Live Chat</h4>
                        <span>+01 215 245 6258</span>
                        <span class="live-chat">Live Chat</span>
                    </div>
                </div>

            </div>

            <!-- row Start -->
            <div class="row">

                <div class="col-lg-7 col-md-7">

                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" class="form-control" placeholder="Your Name">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" class="form-control" placeholder="Your Email">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Subject</label>
                        <input type="text" class="form-control" placeholder="Subject">
                    </div>

                    <div class="form-group">
                        <label>Message</label>
                        <textarea class="form-control" placeholder="Description"></textarea>
                    </div>

                    <div class="form-group">
                        <button class="btn btn-theme" type="submit">Submit Request</button>
                    </div>

                </div>

                <div class="col-lg-5 col-md-5">
                    <div class="contact-info-map">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d54875.24055089478!2d76.7508579533216!3d30.726761932228868!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390fedb2d3da9405%3A0xaecad931f1a39595!2sICICI%20Bank%20Sector%2034%2C%20Chandigarh%20-%20Branch%20%26%20ATM!5e0!3m2!1sen!2sin!4v1611821871299!5m2!1sen!2sin"
                            width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen=""
                            aria-hidden="false" tabindex="0"></iframe>
                    </div>
                </div>

            </div>
            <!-- /row -->

        </div>

    </section>
@endsection
