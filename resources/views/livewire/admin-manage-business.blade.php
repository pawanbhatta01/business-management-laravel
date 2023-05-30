<div>
    <div class="card m-4">
        <div class="card-body table-responsive">
            <table class="table table-striped table-hover ">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Slug</th>
                        <th scope="col">Founder</th>
                        <th scope="col">Creator</th>
                        <th scope="col">Deletion Status</th>
                        <th scope="col">Approved Status</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($businesses as $business)
                        <tr>
                            <th scope="row">#</th>
                            <td>{{ $business->name }}</td>
                            <td>{{ $business->slug }}</td>
                            <td>{{ $business->owner_name }}</td>
                            @php
                                $user = \App\Models\User::where('id', $business->creator_id)
                                    ->withTrashed()
                                    ->first();
                            @endphp
                            <td>{{ $user->name }}</td>
                            <td>
                                @if (!$business->deleted_at)
                                    <span class="badge bg-success">Active</span>
                                @else
                                    <span class="badge bg-warning">Inactive</span>
                                @endif
                            </td>
                            <td>
                                @if ($business->status)
                                    <span class="badge bg-success">Approved</span>
                                @else
                                    <span class="badge bg-warning">Unapproved</span>
                                @endif
                            </td>
                            <td>
                                @if (!$business->status)
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#approve">
                                        Approve
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="approve" tabindex="-1" aria-labelledby="approveLabel"
                                        aria-hidden="true">
                                        <div class="modal-dialog        ">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="approveLabel">Modal title</h5>
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
                                @else
                                    @if (!$business->deleted_at)
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-danger btn-sm"
                                            wire:click='getId({{ $business->id }})' data-bs-toggle="modal"
                                            data-bs-target="#delete">
                                            Delete
                                        </button>

                                        <!-- Modal -->
                                        <div wire:ignore.self class="modal fade" id="delete" tabindex="-1"
                                            aria-labelledby="deleteLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="deleteLabel">Delete business Account
                                                        </h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Are you sure you want to delete this business account?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Close</button>
                                                        <button type="button" wire:click='delete'
                                                            class="btn btn-primary">Save
                                                            changes</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @else
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-success btn-sm mb-1"
                                            wire:click='getId({{ $business->id }})' data-bs-toggle="modal"
                                            data-bs-target="#restore">
                                            Restore
                                        </button>

                                        <!-- Modal -->
                                        <div wire:ignore.self class="modal fade" id="restore" tabindex="-1"
                                            aria-labelledby="restoreLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="restoreLabel">Restore business
                                                            Account
                                                        </h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Are you sure you want to restore this business account?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Close</button>
                                                        <button type="button" wire:click='restore'
                                                            class="btn btn-primary">Save
                                                            changes</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-danger btn-sm"
                                            wire:click='getId({{ $business->id }})' data-bs-toggle="modal"
                                            data-bs-target="#deletePermanent">
                                            Delete
                                        </button>

                                        <!-- Modal -->
                                        <div wire:ignore.self class="modal fade" id="deletePermanent" tabindex="-1"
                                            aria-labelledby="deletePermanentLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="deletePermanentLabel">Delete
                                                            business Account</h5>
                                                        <button type="button" class="btn-close"
                                                            data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Are you sure you want to delete this business account?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Close</button>
                                                        <button type="button" wire:click='deletePermanent'
                                                            class="btn btn-primary">Save
                                                            changes</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <th class="text-center" colspan="8" scope="row">No Business Found</th>
                        </tr>
                    @endforelse

                </tbody>
            </table>
        </div>
    </div>
</div>
