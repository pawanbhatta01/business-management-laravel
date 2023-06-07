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
                            <img src="{{ asset('images/' . $business->image) }}"
                                style="height: 90px !important; object-fit:cover !important" class="img-responsive w-100"
                                alt="" />
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
                        <i class="ti-email theme-cl"></i>
                        <h4>Email</h4>
                        <p>{{ $business->contact->email }}</p>
                    </div>
                </div>

                <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="contact-box">
                        <i class="ti-location-pin theme-cl"></i>
                        <h4>Address</h4>
                        <p>{{ $business->address->street }}</p>
                    </div>
                </div>

                <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="contact-box">
                        <i class="ti-comment-alt theme-cl"></i>
                        <h4>Contact number</h4>
                        <p>{{ $business->contact->mobile }}</p>
                    </div>
                </div>

            </div>

            <!-- row Start -->
            <div class="row">

                <livewire:send-message :business="$business" />
                <div class="col-lg-5 col-md-5">
                    <div class="contact-info-map">
                        <iframe
                            src="https://maps.google.com/maps?q={{ $business->address->city }}&t=&z=13&ie=UTF8&iwloc=&output=embed"
                            width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen=""
                            aria-hidden="false" tabindex="0"></iframe>
                    </div>
                </div>

            </div>
            <!-- /row -->

        </div>

    </section>
@endsection
