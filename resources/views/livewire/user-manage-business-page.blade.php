<div>
    <div class="card m-4">
        <div class="card-header">
            <a name="" id="" class="btn btn-primary btn-sm float-end"
                href="{{ route('business.add-page', $business_slug) }}" role="button">Add</a>
        </div>
        <div class="card-body table-responsive">
            <table class="table table-striped table-bordered ">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Title</th>
                        <th scope="col">Slug</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($pages as $page)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $page->title }}</td>
                            <td>{{ $page->slug }}</td>
                            <td>
                                @if (!$page->deleted_at)
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-info btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#view" wire:click='getData({{ $page->id }})'>
                                        View
                                    </button>
                                    <a name="" id="" class="btn btn-primary btn-sm"
                                        href="{{ route('business.edit-page', ['slug' => $business_slug, 'id' => $page->id]) }}"
                                        role="button">Edit</a>
                                    <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#delete" wire:click='getData({{ $page->id }})'>
                                        Delete
                                    </button>

                                    <!-- Modal -->
                                    <div wire:ignore.self class="modal fade" id="view" tabindex="-1"
                                        aria-labelledby="viewLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="viewLabel">View</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close" wire:click='modalClose'></button>
                                                </div>
                                                <div class="modal-body">
                                                    <strong>Content </strong>
                                                    <hr>
                                                    @php
                                                        echo $content;
                                                    @endphp
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal" wire:click='modalClose'>Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Modal -->
                                    <div wire:ignore.self class="modal fade" id="delete" tabindex="-1"
                                        aria-labelledby="deleteLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="deleteLabel">Delete</h5>
                                                    <button type="button" class="btn-close" wire:click='modalClose'
                                                        data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    Are you sure you want to delete this page ?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal" wire:click='modalClose'>Close</button>
                                                    <button type="button" class="btn btn-danger"
                                                        wire:click='delete'>Delete</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @else
                                    <button type="button" class="btn btn-success btn-sm mb-2" data-bs-toggle="modal"
                                        data-bs-target="#restore" wire:click='getData({{ $page->id }})'>
                                        Restore
                                    </button>
                                    <button type="button" class="btn btn-danger btn-sm mb-2" data-bs-toggle="modal"
                                        data-bs-target="#deletePermanent" wire:click='getData({{ $page->id }})'>
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
                            <td class="text-center" colspan="4">No Pages Available</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
