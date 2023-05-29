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
                            <h5 class="modal-title" id="addLabel">Add Menu</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <form action="" wire:submit.prevent='add'>
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label class="form-label">Select a page</label>
                                    <select class="form-select" wire:model='page'>
                                        <option selected>Select a page</option>
                                        @foreach ($pages as $page)
                                            <option value="{{ $page->id }}">{{ $page->title }}</option>
                                        @endforeach
                                    </select>
                                    @error('page')
                                        <div class="form-text text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Order NO.</label>
                                    <input type="text" class="form-control" wire:model='order'>
                                    @error('order')
                                        <div class="form-text text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Submit</button>
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
                        <th scope="col">Page</th>
                        <th scope="col">Slug</th>
                        <th scope="col">Order</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($menus as $menu)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $menu->page->title }}</td>
                            <td>{{ $menu->page->slug }}</td>
                            <td>
                                {{ $menu->order }}
                            </td>
                            <td>

                                @if (!$menu->deleted_at)
                                    <button type="button" class="btn btn-primary btn-sm mb-2" data-bs-toggle="modal"
                                        data-bs-target="#edit" wire:click='getData({{ $menu->id }})'>
                                        Edit
                                    </button>
                                    <button type="button" class="btn btn-danger btn-sm mb-2" data-bs-toggle="modal"
                                        data-bs-target="#delete" wire:click='getData({{ $menu->id }})'>
                                        Delete
                                    </button>

                                    <div wire:ignore.self class="modal fade" id="edit" tabindex="-1"
                                        aria-labelledby="editLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="editLabel">Edit Menu</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <form action="" wire:submit.prevent='edit'>
                                                    <div class="modal-body">
                                                        <div class="mb-3">
                                                            <label class="form-label">Select a page</label>
                                                            <select class="form-select" wire:model='page'>
                                                                <option selected>Select a page</option>
                                                                @foreach ($pages as $page)
                                                                    <option value="{{ $page->id }}">
                                                                        {{ $page->title }}</option>
                                                                @endforeach
                                                            </select>
                                                            @error('page')
                                                                <div class="form-text text-danger">{{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="form-label">Order NO.</label>
                                                            <input type="text" class="form-control"
                                                                wire:model='order'>
                                                            @error('order')
                                                                <div class="form-text text-danger">{{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Update
                                                        </button>
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
                                                    <h5 class="modal-title" id="deleteLabel">Delete menu</h5>
                                                    <button type="button" class="btn-close" wire:click='modalClose'
                                                        data-bs-dismiss="modal" wire:click='modalClose'
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    Are you sure you want to delete this menu ?
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
                                        data-bs-target="#restore" wire:click='getData({{ $menu->id }})'>
                                        Restore
                                    </button>
                                    <button type="button" class="btn btn-danger btn-sm mb-2" data-bs-toggle="modal"
                                        data-bs-target="#deletePermanent" wire:click='getData({{ $menu->id }})'>
                                        Delete
                                    </button>
                                    <!-- Modal -->
                                    <div wire:ignore.self class="modal fade" id="restore" tabindex="-1"
                                        aria-labelledby="restoreLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="restoreLabel">Restore Menu</h5>
                                                    <button type="button" class="btn-close" wire:click='modalClose'
                                                        data-bs-dismiss="modal" wire:click='modalClose'
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    Are you sure you want to restore this Menu ?
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
                                                        Permanently Delete Menu</h5>
                                                    <button type="button" class="btn-close" wire:click='modalClose'
                                                        data-bs-dismiss="modal" wire:click='modalClose'
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    Are you sure you want to permanently delete this Menu ?
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
                            <td class="text-center" colspan="5">No Menus Found</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
