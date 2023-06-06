<div class="col-lg-7 col-md-7">
    @if (Session::has('message'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ Session::get('message') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                <span class="sr-only">Close</span>
            </button>
        </div>
    @endif
    <div class="row">
        <div class="col-lg-6 col-md-6">
            <div class="form-group">
                <label>Name</label>
                <input type="text" class="form-control" placeholder="Your Name" wire:model='name'>
                @error('name')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>
        <div class="col-lg-6 col-md-6">
            <div class="form-group">
                <label>Email</label>
                <input type="email" class="form-control" placeholder="Your Email" wire:model='email'>
                @error('email')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>
    </div>

    <div class="form-group">
        <label>Subject</label>
        <input type="text" class="form-control" placeholder="Subject" wire:model='subject'>
        @error('subject')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>

    <div class="form-group">
        <label>Message</label>
        <textarea class="form-control" placeholder="Description" wire:model='message'></textarea>
        @error('message')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>

    <div class="form-group">
        <button class="btn btn-theme" wire:click='send' type="button">Submit Request</button>
    </div>

</div>
