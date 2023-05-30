<div>
    <!-- Row -->
    <div class="row">

        @foreach ($businesses as $business)
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
            <!-- Single Listing Grid -->
            <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="Reveal-grid-wrapper">
                    <div class="list-badge now-open">{{ $status }}</div>
                    <div class="Reveal-grid-thumb">

                        <a href="{{ route('frontend.business', $business->slug) }}" class="lup-box"><img height="800"
                                width="100%" style="object-fit: cover;" src="{{ asset('images/' . $business->image) }}"
                                class="img-fluid" alt="" /></a>
                    </div>
                    <div class="Reveal-grid-caption">
                        <div class="Reveal-grid-caption-header">
                            <h4 class="Reveal-header-title"><a
                                    href="{{ route('frontend.business', $business->slug) }}">{{ $business->name }}</a>
                            </h4>
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
                            <div class="Reveal-grid-reviews">
                                @for ($j = 0; $j < $avg; $j++)
                                    <i class="fas fa-star filled"></i>
                                @endfor
                                @for ($j = 0; $j < 5 - $avg; $j++)
                                    <i class="fas fa-star"></i>
                                @endfor
                                <span class="overall-reviews">({{ $i }} Reviews)</span>
                            </div>
                        </div>
                        <div class="Reveal-grid-caption-body">
                            <ul class="Reveal-contact-list">
                                <li><img src="assets/img/add.svg" class=""
                                        alt="" />{{ $business->address->street }}</li>
                                <li><img src="assets/img/call.svg" class=""
                                        alt="" />{{ $business->contact->mobile }}</li>
                            </ul>
                        </div>
                    </div>
                    <div class="Reveal-grid-footer">
                        <div class="Reveal-grid-footer-flex">
                            <div class="Reveal-author-caption">
                                <div class="Reveal-author-thumb">
                                    <img src="https://via.placeholder.com/400x400" class="img-fluid" alt="" />
                                </div>
                                <div class="Reveal-author-header">
                                    <h4>{{ $business->creator->name }}<span>{{ $business->created_at->diffForHumans() }}</span>
                                    </h4>
                                </div>
                            </div>
                        </div>
                        <div class="Reveal-grid-footer-last">
                            <a href="{{ route('frontend.business', $business->slug) }}"
                                class="Reveal-view-btn">View</a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

    </div>
    <!-- Row -->
</div>
