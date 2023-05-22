<div>
    <div class="card mx-4 mt-4">
        <div class="card-header ">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary btn-sm float-end" data-bs-toggle="modal" data-bs-target="#add">
                Add Business
            </button>

            <!-- Modal -->
            <div wire:ignore.self class="modal fade" id="add" tabindex="-1" aria-labelledby="addLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="addLabel">Add Business</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <form wire:submit.prevent='add' enctype="multipart/form-data">
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label class="form-label">Name</label>
                                    <input type="text" class="form-control" wire:model='name'>
                                    @error('name')
                                        <div class="form-text text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Slug</label>
                                    <input type="text" class="form-control" wire:model='slug'>
                                    @error('slug')
                                        <div class="form-text text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Owner Name</label>
                                    <input type="text" class="form-control" wire:model='owner_name'>
                                    @error('owner_name')
                                        <div class="form-text text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Description</label>
                                    <input type="text" class="form-control" wire:model='description'>
                                    @error('description')
                                        <div class="form-text text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Image</label>
                                    <input type="file" class="form-control" wire:model='image'>
                                    @error('image')
                                        <div class="form-text text-danger">{{ $message }}</div>
                                    @enderror
                                    @if ($image)
                                        <img width="100" class="my-2" height="100"
                                            src="{{ $image->temporaryUrl() }}" alt="">
                                    @endif
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                @foreach ($businesses as $business)
                    <div class="col-lg-4 col-md-6 col-sm-6 mb-3">
                        <div class="card">
                            <img height="150" style="object-fit: cover"
                                src="{{ asset('images/' . $business->image) }}" class="card-img-top"
                                alt={{ $business->name }}">
                            <div class="card-body">
                                <h5 class="card-title">{{ $business->name }}</h5>
                                <p class="card-text">{{ Str::limit($business->description, 50) }}</p>
                                <p class="card-text">
                                    @if ($business->status == 1)
                                        <span class="badge bg-success">Approved</span>
                                    @else
                                        <span class="badge bg-warning">Unapproved</span>
                                    @endif
                                </p>
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-info btn-sm mb-2" data-bs-toggle="modal"
                                    data-bs-target="#view">
                                    View
                                </button>
                                <button type="button" class="btn btn-primary btn-sm mb-2" data-bs-toggle="modal"
                                    data-bs-target="#edit">
                                    Edit
                                </button>
                                <button type="button" class="btn btn-danger btn-sm mb-2" data-bs-toggle="modal"
                                    data-bs-target="#delete">
                                    Delete
                                </button>
                                <a name="" id="" class="btn btn-secondary btn-sm mb-2" href="#"
                                    role="button">Manage</a>

                                <!-- Modal -->
                                <div class="modal fade" id="view" tabindex="-1" aria-labelledby="viewLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="viewLabel">View Business</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                ...
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                                <button type="button" class="btn btn-primary">Save changes</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal fade" id="edit" tabindex="-1" aria-labelledby="editLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="editLabel">Edit Business</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                ...
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                                <button type="button" class="btn btn-primary">Save changes</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Modal -->
                                <div class="modal fade" id="delete" tabindex="-1" aria-labelledby="deleteLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="deleteLabel">Modal title</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                ...
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                                <button type="button" class="btn btn-primary">Save changes</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
