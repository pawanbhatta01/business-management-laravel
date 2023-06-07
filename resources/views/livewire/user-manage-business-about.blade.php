<div>
    <div class="card m-4">
        <div class="card-header">
            <!-- Button trigger modal -->
            <button type="button" wire:click='getData' class="btn btn-primary btn-sm float-end" data-bs-toggle="modal"
                data-bs-target="#edit">
                Edit
            </button>

            <!-- Modal -->
            <div wire:ignore.self class="modal fade" id="edit" tabindex="-1" aria-labelledby="editLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editLabel">Edit About</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3">
                                <label class="form-label">Title</label>
                                <input type="text" class="form-control" wire:model='title'>
                                @error('title')
                                    <div id="textHelp" class="form-text text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Description</label>
                                <textarea name="" id="" cols="30" class="form-control" wire:model='description' rows="10"></textarea>
                                @error('description')
                                    <div id="textHelp" class="form-text text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Image</label>
                                <input type="url" class="form-control" wire:model='image'>
                                @error('image')
                                    <div id="textHelp" class="form-text text-danger">{{ $message }}</div>
                                @enderror
                                <div class="form-text"><strong>Note: </strong> Go to image manager, copy the imagelink
                                    and paste here.</div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" wire:click='update'>Save changes</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-title text-center fs-3">
                {{ $business->about->title }}
            </div>
            <p class="card-text p-5">
                {{ $business->about->description }}
            </p>
        </div>
    </div>
</div>
