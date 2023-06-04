<div>
    <div class="Reveal-Reveal-side-widget-body">
        @if (Session::has('message'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{ Session::get('message') }}</strong>
                <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="form-group">
            <label>Full Name</label>
            <input type="text" class="form-control" placeholder="Your Name" wire:model='name'>
            @error('name')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="email" class="form-control" placeholder="Your Email" wire:model='email'>
            @error('email')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label>Message</label>
            <textarea class="form-control" placeholder="Send Message to author..." wire:model='message'></textarea>
            @error('message')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <button class="btn btn-theme full-width text-white" wire:click='send'>Send Message</button>
    </div>
</div>
