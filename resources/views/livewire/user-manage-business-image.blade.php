<div>
    <div class="card m-4">
        <div class="card-header">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary btn-sm float-end" data-bs-toggle="modal" wire:click='resetInput'
                data-bs-target="#add">
                Add
            </button>

            <!-- Modal -->
            <div wire:ignore.self class="modal fade" id="add" tabindex="-1" aria-labelledby="addLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="addLabel">Add Image</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <form action="" wire:submit.prevent='add'>
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label class="form-label">Name</label>
                                    <input type="text" class="form-control" wire:model='name'>
                                    @error('name')
                                        <div class="form-text text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Image</label>
                                    <input type="file" class="form-control" wire:model='image'>
                                    @if ($image)
                                        <img src="{{ $image->temporaryUrl() }}" width="100" height="100"
                                            alt="">
                                    @endif
                                    @error('image')
                                        <div class="form-text text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Add Image</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body table-responsive">
            <table class="table table-striped table-hover table-bordered">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Image Name</th>
                        <th scope="col">Image Link</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($images as $img)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $img->name }}</td>
                            <td>
                                <a target="_blank" href="{{ url('images/' . $img->link) }}">{{ $img->link }}</a>
                            </td>
                            <td>

                                @if (!$img->deleted_at)
                                    <button type="button" class="btn btn-primary btn-sm mb-2" data-bs-toggle="modal"
                                        data-bs-target="#edit" wire:click='getData({{ $img->id }})'>
                                        Edit
                                    </button>
                                    <button type="button" class="btn btn-danger btn-sm mb-2" data-bs-toggle="modal"
                                        data-bs-target="#delete" wire:click='getData({{ $img->id }})'>
                                        Delete
                                    </button>

                                    <div wire:ignore.self class="modal fade" id="edit" tabindex="-1"
                                        aria-labelledby="editLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="editLabel">Edit Image</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <form action="" wire:submit.prevent='edit'>
                                                    <div class="modal-body">
                                                        <div class="mb-3">
                                                            <label class="form-label">Name</label>
                                                            <input type="text" class="form-control"
                                                                wire:model='name'>
                                                            @error('name')
                                                                <div class="form-text text-danger">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="form-label">Image</label>
                                                            <input type="file" class="form-control"
                                                                wire:model='image'>
                                                            @if ($image)
                                                                <img src="{{ $image->temporaryUrl() }}" width="100"
                                                                    height="100" alt="">
                                                            @endif
                                                            @if ($oldImage)
                                                                <img src="{{ asset('images/' . $oldImage) }}"
                                                                    width="100" height="100" alt="">
                                                            @endif
                                                            @error('image')
                                                                <div class="form-text text-danger">{{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Add
                                                            Image</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                    <div wire:ignore.self class="modal fade" id="delete" tabindex="-1"
                                        aria-labelledby="deleteLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="deleteLabel">Delete Image</h5>
                                                    <button type="button" class="btn-close" wire:click='modalClose'
                                                        data-bs-dismiss="modal" wire:click='modalClose'
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    Are you sure you want to delete this image ?
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
                                        data-bs-target="#restore" wire:click='getData({{ $img->id }})'>
                                        Restore
                                    </button>
                                    <button type="button" class="btn btn-danger btn-sm mb-2" data-bs-toggle="modal"
                                        data-bs-target="#deletePermanent" wire:click='getData({{ $img->id }})'>
                                        Delete
                                    </button>
                                    <!-- Modal -->
                                    <div wire:ignore.self class="modal fade" id="restore" tabindex="-1"
                                        aria-labelledby="restoreLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="restoreLabel">Restore Image</h5>
                                                    <button type="button" class="btn-close" wire:click='modalClose'
                                                        data-bs-dismiss="modal" wire:click='modalClose'
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    Are you sure you want to restore this Image ?
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
                                                        Permanently Delete Image</h5>
                                                    <button type="button" class="btn-close" wire:click='modalClose'
                                                        data-bs-dismiss="modal" wire:click='modalClose'
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    Are you sure you want to permanently delete this Image ?
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
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td class="text-center" colspan="4">No Images Found</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
