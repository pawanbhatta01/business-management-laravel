<div>
    <div class="card m-4">
        <div class="card-header">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" wire:click='clear'
                data-bs-target="#add">
                Add
            </button>

            <!-- Modal -->
            <div wire:ignore.self class="modal fade" id="add" tabindex="-1" aria-labelledby="addLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="addLabel">Add Testimonial</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3">
                                <select class="form-select" wire:model='business'>
                                    <option selected>Select Business</option>
                                    @foreach ($businesses as $business)
                                        <option value="{{ $business->id }}">{{ $business->name }}</option>
                                    @endforeach
                                </select>
                                @error('business')
                                    <div class="form-text text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Name</label>
                                <input type="text" class="form-control" wire:model='name'>
                                @error('name')
                                    <div class="form-text text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Post</label>
                                <input type="text" class="form-control" wire:model='post'>
                                @error('post')
                                    <div class="form-text text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Description</label>
                                <textarea name="" id="" cols="30" rows="10" class="form-control" wire:model='description'></textarea>
                                @error('description')
                                    <div class="form-text text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" wire:click='add'>Save changes</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-striped table-bordered table-responsive-sm">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Post</th>
                        <th scope="col">Business</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($testimonials as $testimonial)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $testimonial->name }}</td>
                            <td>{{ $testimonial->post }}</td>
                            <td>{{ $testimonial->business->name }}</td>
                            <td>
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal"
                                    wire:click='getData({{ $testimonial }})' data-bs-target="#show">
                                    Show
                                </button>

                                <!-- Modal -->
                                <div wire:ignore.self class="modal fade" id="show" tabindex="-1"
                                    aria-labelledby="showLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="showLabel">Show Testimonial</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <strong>Description : </strong> {{ $description }}
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                    wire:click='getData({{ $testimonial }})' data-bs-target="#edit">
                                    Edit
                                </button>

                                <!-- Modal -->
                                <div wire:ignore.self class="modal fade" id="edit" tabindex="-1"
                                    aria-labelledby="editLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="editLabel">Edit Testimonial</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="mb-3">
                                                    <label class="form-label">Name</label>
                                                    <input type="text" class="form-control" wire:model='name'>
                                                    @error('name')
                                                        <div class="form-text text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Post</label>
                                                    <input type="text" class="form-control" wire:model='post'>
                                                    @error('post')
                                                        <div class="form-text text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Description</label>
                                                    <textarea name="" id="" cols="30" rows="10" class="form-control"
                                                        wire:model='description'></textarea>
                                                    @error('description')
                                                        <div class="form-text text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                                <button type="button" class="btn btn-primary" wire:click='edit'>Save
                                                    changes</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                    wire:click='getData({{ $testimonial }})' data-bs-target="#delete">
                                    Delete
                                </button>

                                <!-- Modal -->
                                <div wire:ignore.self class="modal fade" id="delete" tabindex="-1"
                                    aria-labelledby="deleteLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="deleteLabel">Delete Testimonial</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Are you sure you want to delete this testimonial?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                                <button type="button" class="btn btn-danger"
                                                    wire:click='delete'>Save
                                                    changes</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
