<div>
    <div class="row">
        @foreach ($services as $service)
            <div class="col-lg-3 col-md-4 col-sm-6 col-12 py-3">
                <div class="card achievement-wrap">
                    <div class="card-body achievement-content">
                        <div class="ache-icon purple"><i class="ti-agenda"></i></div>
                        <h3>{{ $service->title }}</h3>
                        <p>{{ $service->description }}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="d-flex justify-content-center">
        {{ $services->links() }}
    </div>
</div>
