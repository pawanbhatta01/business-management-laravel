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
    <!-- ================================ End Banner ========================================= -->
    <div class="container">
        @include('layouts.businessnavbar')
    </div>
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
                                @foreach ($business->services as $service)
                                    <li>{{ $service->title }}</li>
                                @endforeach
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
                                <div class="Reveal-thumb-photo">
                                    @if ($business->creator->image)
                                        <img src="{{ asset('images/' . $business->creator->image) }}"
                                            style="width: 60px; height:60px;background-color: rgb(222, 219, 219);margin-top:0.6rem; border-radius:50%; object-fit:cover" />
                                    @else
                                        @php
                                            $name = $business->creator->name;
                                            $name = explode(' ', $name);
                                            $name = strtoupper(substr($name[0], 0, 1) . substr($name[1], 0, 1));
                                        @endphp
                                        <div style="width: 60px; height:60px;background-color: rgb(222, 219, 219);margin-top:0.6rem; border-radius:50%; text-align:center; line-height:60px;"
                                            style="">
                                            {{ $name }}</div>
                                    @endif
                                    {{-- <img src="https://via.placeholder.com/400x400" alt=""> --}}
                                </div>
                                <div class="Reveal-thumb-details">
                                    <h4>{{ $business->creator->name }}</h4>
                                    @php
                                        $count = \App\Models\Business::where('creator_id', $business->creator->id)->count();
                                    @endphp
                                    <span>{{ $count }} Listings</span>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <livewire:home-message-home :slug="$business->slug">
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
                                @php
                                    function getValue(string $key, $business)
                                    {
                                        $data = \App\Models\BusinessSiteConfig::where('business_id', $business->id)
                                            ->where('key', $key)
                                            ->first();
                                        return $data->value;
                                    }
                                @endphp
                                <div class="imp-boxes-single-content">
                                    <ul>
                                        <li>
                                            <a href="{{ getValue('facebook', $business) }}"><i class="ti-facebook"></i></a>
                                        </li>
                                        <li>
                                            <a href="{{ getValue('linkedin', $business) }}"><i class="ti-linkedin"></i></a>
                                        </li>
                                        <li>
                                            <a href="{{ getValue('instagram', $business) }}"><i
                                                    class="ti-instagram"></i></a>
                                        </li>
                                        <li>
                                            <a href="{{ getValue('youtube', $business) }}"><i class="ti-youtube"></i></a>
                                        </li>
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
                                            <a href="tel:{{ $business->contact->tel }}">
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
                                            <a href="mailto:{{ $business->contact->email }}">
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
                                            <a href="{{ getValue('website', $business) }}">
                                                <div class="Reveal-icon-box-round">
                                                    <i class="lni-world"></i>
                                                </div>
                                                <div class="Reveal-icon-box-text">
                                                    {{ getValue('website', $business) }}
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

    <a id="back2Top" class="top-scroll" title="Back to top" href="#"><i class="ti-arrow-up"></i></a>
@endsection
