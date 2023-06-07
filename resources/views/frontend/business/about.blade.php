@extends('layouts.frontend')

@section('title')
    About
@endsection

@section('content')
    <!-- ============================================================== -->
    <!-- Top header  -->
    <!-- ============================================================== -->

    <section class="page-title-banner" style="background-image:url({{ asset('images/' . $business->image) }});">
        <div class="container">
            <div class="row m-0 align-items-end detail-swap">
                <div class="tr-list-wrap">
                    <div class="tr-list-detail">
                        <div class="tr-list-thumb">
                            <img src="{{ asset('images/' . $business->image) }}" class="img-responsive w-100"
                                style="height: 90px !important; object-fit:cover !important" alt="" />
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
    <!-- ============================ Page Title End ================================== -->

    <div class="container">
        @include('layouts.businessnavbar')
    </div>

    <!-- ============================ Our Story Start ================================== -->
    <section>
        <div class="container">
            <div class="row align-items-center">

                <!-- Single Box -->
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="doc_video">
                        <div class="thumb">
                            <img class="pro_img img-fluid w-100" src="{{ asset('images/' . $business->about->image) }}">
                            {{-- <div class="overlay_icon">
                                <div class="bb-video-box">
                                    <div class="bb-video-box-inner">
                                        <div class="bb-video-box-innerup">
                                            <a href="https://www.youtube.com/watch?v=A8EI6JaFbv4" data-bs-toggle="modal"
                                                data-bs-target="#popup-video"><i class="fa fa-play"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                </div>

                <!-- Single Box -->
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="about-captione">
                        <h2>{{ $business->about->title }}</h2>
                        <p>{{ $business->about->description }}</p>
                        {{-- <div class="authorct-button">
                            <a href="#" class="btn btn-theme rounded">Read More</a>
                        </div> --}}
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- ============================ Our Story End ================================== -->

    <div class="clearfix"></div>


    <!-- ============================ Footer End ================================== -->
@endsection
