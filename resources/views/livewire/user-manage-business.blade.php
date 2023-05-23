<div>
    <div class="card mx-4 mt-4">
        <div class="card-header ">
            <!-- Button trigger modal -->
            <button type="button" wire:click='modalClose' class="btn btn-primary btn-sm float-end" data-bs-toggle="modal"
                data-bs-target="#add">
                Add Business
            </button>

            <!-- Modal -->
            <div wire:ignore.self class="modal fade" id="add" tabindex="-1" aria-labelledby="addLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="addLabel">Add Business</h5>
                            <button type="button" class="btn-close" wire:click='modalClose' wire:click='modalClose'
                                data-bs-dismiss="modal" wire:click='modalClose' aria-label="Close"></button>
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
                                <button type="button" class="btn btn-secondary" wire:click='modalClose'
                                    data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Add Business</button>
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
                                    @if ($business->status)
                                        <span class="badge bg-success">Approved</span>
                                    @else
                                        <span title="Please wait until your business is approved."
                                            class="badge bg-warning">Unapproved</span>
                                    @endif
                                </p>

                                @if (!$business->deleted_at)
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-info btn-sm mb-2" data-bs-toggle="modal"
                                        data-bs-target="#view" wire:click='getData({{ $business->id }})'>
                                        View
                                    </button>
                                    <button type="button" class="btn btn-primary btn-sm mb-2" data-bs-toggle="modal"
                                        data-bs-target="#edit" wire:click='getData({{ $business->id }})'>
                                        Edit
                                    </button>
                                    <button type="button" class="btn btn-danger btn-sm mb-2" data-bs-toggle="modal"
                                        data-bs-target="#delete" wire:click='getData({{ $business->id }})'>
                                        Delete
                                    </button>
                                    @if ($business->status)
                                        <a name="" id="" class="btn btn-secondary btn-sm mb-2"
                                            href="{{ route('business.home', $business->slug) }}"
                                            role="button">Manage</a>
                                    @endif
                                    <!-- Modal -->
                                    <div wire:ignore.self class="modal fade" id="view" tabindex="-1"
                                        aria-labelledby="viewLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="viewLabel">View Business</h5>
                                                    <button type="button" class="btn-close" wire:click='modalClose'
                                                        data-bs-dismiss="modal" wire:click='modalClose'
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <strong>Name: </strong>{{ $name }}
                                                    <hr>
                                                    <strong>Slug: </strong>{{ $slug }}
                                                    <hr>
                                                    <strong>Owner Name: </strong>{{ $owner_name }}
                                                    <hr>
                                                    <strong>Description: </strong>{{ $description }}
                                                    <hr>
                                                    <strong>Preview: </strong>
                                                    <img class="d-block" width="100" height="100"
                                                        src="{{ asset('images/' . $old_image) }}"
                                                        alt="{{ $business->name }}" style="object-fit: cover">
                                                    <hr>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal" wire:click='modalClose'>Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div wire:ignore.self class="modal fade" id="edit" tabindex="-1"
                                        aria-labelledby="editLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="editLabel">Edit Business</h5>
                                                    <button type="button" class="btn-close" wire:click='modalClose'
                                                        data-bs-dismiss="modal" wire:click='modalClose'
                                                        aria-label="Close"></button>
                                                </div>
                                                <form wire:submit.prevent='edit' enctype="multipart/form-data">
                                                    <div class="modal-body">
                                                        <div class="mb-3">
                                                            <label class="form-label">Name</label>
                                                            <input type="text" class="form-control"
                                                                wire:model='name'>
                                                            @error('name')
                                                                <div class="form-text text-danger">{{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="form-label">Slug</label>
                                                            <input type="text" class="form-control"
                                                                wire:model='slug'>
                                                            @error('slug')
                                                                <div class="form-text text-danger">{{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="form-label">Owner Name</label>
                                                            <input type="text" class="form-control"
                                                                wire:model='owner_name'>
                                                            @error('owner_name')
                                                                <div class="form-text text-danger">{{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="form-label">Description</label>
                                                            <input type="text" class="form-control"
                                                                wire:model='description'>
                                                            @error('description')
                                                                <div class="form-text text-danger">{{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="form-label">Image</label>
                                                            <input type="file" class="form-control"
                                                                wire:model='image'>
                                                            @error('image')
                                                                <div class="form-text text-danger">{{ $message }}
                                                                </div>
                                                            @enderror
                                                            @if ($image)
                                                                <img width="100" class="my-2" height="100"
                                                                    src="{{ $image->temporaryUrl() }}"
                                                                    alt="">
                                                            @endif
                                                            <img width="100" class="my-2" height="100"
                                                                src="{{ asset('images/' . $old_image) }}"
                                                                alt="">
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal"
                                                            wire:click='modalClose'>Close</button>
                                                        <button type="submit" class="btn btn-primary">Save
                                                            changes</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Modal -->
                                    <div wire:ignore.self class="modal fade" id="delete" tabindex="-1"
                                        aria-labelledby="deleteLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="deleteLabel">Delete Business</h5>
                                                    <button type="button" class="btn-close" wire:click='modalClose'
                                                        data-bs-dismiss="modal" wire:click='modalClose'
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    Are you sure you want to delete this Business ?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal" wire:click='modalClose'>Close</button>
                                                    <button type="button" wire:click='delete'
                                                        class="btn btn-danger">Delete</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @else
                                    <button type="button" class="btn btn-success btn-sm mb-2" data-bs-toggle="modal"
                                        data-bs-target="#restore" wire:click='getData({{ $business->id }})'>
                                        Restore
                                    </button>
                                    <button type="button" class="btn btn-danger btn-sm mb-2" data-bs-toggle="modal"
                                        data-bs-target="#deletePermanent" wire:click='getData({{ $business->id }})'>
                                        Delete
                                    </button>
                                    <!-- Modal -->
                                    <div wire:ignore.self class="modal fade" id="restore" tabindex="-1"
                                        aria-labelledby="restoreLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="restoreLabel">Restore Business</h5>
                                                    <button type="button" class="btn-close" wire:click='modalClose'
                                                        data-bs-dismiss="modal" wire:click='modalClose'
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    Are you sure you want to restore this Business ?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal" wire:click='modalClose'>Close</button>
                                                    <button type="button" wire:click='restore'
                                                        class="btn btn-danger">Restore</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Modal -->
                                    <div wire:ignore.self class="modal fade" id="deletePermanent" tabindex="-1"
                                        aria-labelledby="deletePermanentLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="deletePermanentLabel">
                                                        Permanently Delete Business</h5>
                                                    <button type="button" class="btn-close" wire:click='modalClose'
                                                        data-bs-dismiss="modal" wire:click='modalClose'
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    Are you sure you want to permanently delete this Business ?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal" wire:click='modalClose'>Close</button>
                                                    <button type="button" wire:click='deletePermanent'
                                                        class="btn btn-danger">Delete</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
