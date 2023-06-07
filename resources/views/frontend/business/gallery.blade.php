@extends('layouts.frontend')

@section('title')
    Gallery
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
    <section>
        <div class="container">

            <!-- Row -->
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="sec-heading center">
                        <h2>Gallery</h2>
                        <h3>Recent Add <span class="theme-cl">Gallery</span></h3>
                    </div>
                </div>
            </div>
            <!-- Row -->

            <livewire:show-images :business="$business" />

        </div>


        <!-- Row -->
        {{-- <div class="row">
            <div class="col-lg-12 col-md-12 text-center">
                <a href="half-map-with-grid2-layout" class="btn btn-light btn-md rounded">Explore More Listings</a>
            </div>
        </div> --}}
        <!-- Row -->

        </div>
    </section>
@endsection
