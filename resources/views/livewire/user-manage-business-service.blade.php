<div>
    <div class="card m-4">
        <div class="card-header">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary btn-sm float-end" wire:click='resetInput' data-bs-toggle="modal"
                data-bs-target="#add">
                Add
            </button>

            <!-- Modal -->
            <div wire:ignore.self class="modal fade" id="add" tabindex="-1" aria-labelledby="addLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="addLabel">Add Service</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <form action="" wire:submit.prevent='add'>
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label class="form-label">Title</label>
                                    <input type="text" class="form-control" wire:model='title'>
                                    @error('title')
                                        <div class="form-text text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Description</label>
                                    <textarea class="form-control" wire:model='description'></textarea>
                                    @error('description')
                                        <div class="form-text text-danger">{{ $message }}</div>
                                    @enderror
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

        <div class="card-body table-responsive">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Title</th>
                        <th scope="col">Description</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($services as $service)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $service->title }}</td>
                            <td>
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#view" wire:click='view({{ $service->id }})'>
                                    View
                                </button>

                                <!-- Modal -->
                                <div wire:ignore.self class="modal fade" id="view" tabindex="-1"
                                    aria-labelledby="viewLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="viewLabel">View Description</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                {{ $service->description }}
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td>
                                @if (!$service->deleted_at)
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#edit" wire:click='view({{ $service->id }})'>
                                        Edit
                                    </button>

                                    <!-- Modal -->
                                    <div wire:ignore.self class="modal fade" id="edit" tabindex="-1"
                                        aria-labelledby="editLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered   ">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="editLabel">Edit Service</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <form action="" wire:submit.prevent='edit'>
                                                    <div class="modal-body">
                                                        <div class="mb-3">
                                                            <label class="form-label">Title</label>
                                                            <input type="text" class="form-control"
                                                                wire:model='title'>
                                                            @error('title')
                                                                <div class="form-text text-danger">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="form-label">Description</label>
                                                            <textarea class="form-control" wire:model='description'></textarea>
                                                            @error('description')
                                                                <div class="form-text text-danger">{{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Update
                                                            changes</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#delete" wire:click='view({{ $service->id }})'>
                                        Delete
                                    </button>

                                    <!-- Modal -->
                                    <div wire:ignore.self class="modal fade" id="delete" tabindex="-1"
                                        aria-labelledby="deleteLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="deleteLabel">Delete Service</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    Are you sure you want to delete this service?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Close</button>
                                                    <button type="button" class="btn btn-primary"
                                                        wire:click='delete'>Save
                                                        changes</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @else
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#restore" wire:click='view({{ $service->id }})'>
                                        Restore
                                    </button>

                                    <!-- Modal -->
                                    <div wire:ignore.self class="modal fade" id="restore" tabindex="-1"
                                        aria-labelledby="restoreLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="restoreLabel">Restore Service</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    Are you sure you want to restore this service?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Close</button>
                                                    <button type="button" class="btn btn-primary"
                                                        wire:click='restore'>Save
                                                        changes</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#deletePermanent" wire:click='view({{ $service->id }})'>
                                        Delete
                                    </button>

                                    <!-- Modal -->
                                    <div wire:ignore.self class="modal fade" id="deletePermanent" tabindex="-1"
                                        aria-labelledby="deletePermanentLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="deletePermanentLabel">Delete Service
                                                    </h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    Are you sure you want to delete this service?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Close</button>
                                                    <button type="button" class="btn btn-primary"
                                                        wire:click='deletePermanent'>Save
                                                        changes</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
