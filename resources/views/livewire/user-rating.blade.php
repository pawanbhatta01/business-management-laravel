<div>
    <!-- Reviews Comments -->
    <div class="list-single-main-item fl-wrap">

        @php
            $i = 0;
            $rated = false;
        @endphp
        @foreach ($business->ratings as $rating)
            @php
                $i++;
            @endphp
        @endforeach
        <div class="list-single-main-item-title fl-wrap">
            <h3>Item Reviews - <span> {{ $i }} </span></h3>
        </div>
        <div class="reviews-comments-wrap">
            @foreach ($business->ratings as $rating)
                @php
                    if ($rating->user_id == Auth::id()) {
                        $rated = true;
                    }
                    $i = 0;
                    $sum = 0;
                    $avg = 0;
                    $sum += $rating->rate;
                    $i++;
                    
                    if ($i != 0) {
                        $avg = $sum / $i;
                    }
                @endphp
                <!-- reviews-comments-item -->
                <div class="reviews-comments-item">
                    <div class="review-comments-avatar">
                        @php
                            $name = $rating->user->name;
                            $name = explode(' ', $name);
                            $name = strtoupper(substr($name[0], 0, 1) . substr($name[1], 0, 1));
                        @endphp
                        <img src="https://via.placeholder.com/400x400" class="img-fluid" alt="">

                    </div>
                    <div class="reviews-comments-item-text">
                        <h4 style="display: flex;"><a href="#">{{ $rating->user->name }}</a><span
                                class="reviews-comments-item-date"><i
                                    class="ti-calendar theme-cl"></i>{{ $rating->created_at->diffForHumans() }}</span>
                        </h4>

                        <div class="listing-rating high" data-starrating2="5">
                            @for ($j = 0; $j < $avg; $j++)
                                <i class="ti-star active"></i>
                            @endfor
                            @for ($j = 0; $j < 5 - $avg; $j++)
                                <i class="ti-star"></i>
                            @endfor
                            <span class="review-count">{{ $i }}</span>
                        </div>
                        <div class="clearfix"></div>
                        <p>" {{ $rating->comment }} "</p>
                        {{-- <div class="pull-left reviews-reaction">
                            <a href="#" class="comment-love active"><i class="ti-heart"></i> 07</a>
                        </div> --}}
                    </div>
                </div>
                <!--reviews-comments-item end-->
            @endforeach
        </div>
    </div>

    <!-- Add Review Wrap -->
    <div class="Reveal-block-wrap">

        <div class="Reveal-block-header">
            <h4 class="block-title">Add Review</h4>
        </div>

        <div class="Reveal-block-body">

            <div class="review-form-box form-submit">
                @if (Auth::user())
                    @if (Auth::id() != $business->creator->id)
                        @if (!$rated)
                            @if (Session::has('message'))
                                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                    <strong>{{ Session::get('message') }}</strong>
                                    <button type="button" class="close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            @endif
                            <form wire:submit.prevent='rate'>
                                <label for="">Rate</label>
                                <div class="rate-stars">
                                    <input type="checkbox" wire:model='rate' class="rate-value" id="st1"
                                        value="5" />
                                    <label for="st1"></label>
                                    <input type="checkbox" wire:model='rate' class="rate-value" id="st2"
                                        value="4" />
                                    <label for="st2"></label>
                                    <input type="checkbox" wire:model='rate' class="rate-value" id="st3"
                                        value="3" />
                                    <label for="st3"></label>
                                    <input type="checkbox" wire:model='rate' class="rate-value" id="st4"
                                        value="2" />
                                    <label for="st4"></label>
                                    <input type="checkbox" wire:model='rate' class="rate-value" id="st5"
                                        value="1" />
                                    <label for="st5"></label>
                                </div>
                                @error('rate')
                                    <small class="text-danger form-text">{{ $message }}</small>
                                @enderror

                                <div class="form-group">
                                    <label>Review</label>
                                    <textarea class="form-control ht-140" placeholder="Review" wire:model='review'></textarea>
                                    @error('review')
                                        <small class="text-danger form-text">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-theme">Submit Review</button>
                                </div>

                            </form>
                        @else
                            <div class="text-center">
                                <a name="" id="" class="btn btn-danger text-light"
                                    href="javascript:void()" role="button">You have already rated this business.</a>
                            </div>
                        @endif
                    @else
                        <div class="text-center">
                            <a name="" id="" class="btn btn-danger text-light" href="javascript:void()"
                                role="button">You
                                can't review to your own business.</a>
                        </div>
                    @endif
                @else
                    <div class="text-center">
                        <a name="" id="" class="btn btn-danger text-light" href="{{ route('login') }}"
                            role="button">Login to continue.</a>
                    </div>
                @endif
            </div>

        </div>

    </div>

</div>
