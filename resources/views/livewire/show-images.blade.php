<div>
    <div class="row">

        @foreach ($images as $image)
            <!-- Single Listing Grid -->
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="Reveal-grid-wrapper">
                    <div class="Reveal-grid-thumb">
                        <a href="{{ url('images/' . $image->link) }}" target="_blank" class="lup-box"><img
                                style="height:200px !important; object-fit: cover!important; width:100% !important"
                                src="{{ asset('images/' . $image->link) }}" class="img-fluid" alt="" /></a>
                    </div>
                    <div class="Reveal-grid-caption">
                        <div class="Reveal-grid-caption-header">
                            <h4 class="Reveal-header-title"><a href="{{ url('images/' . $image->link) }}"
                                    target="_blank">{{ $image->name }}</a>
                            </h4>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
