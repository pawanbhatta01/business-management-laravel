<div>
    <div class="card m-4">
        <div class="card-body table-responsive">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Total Businesses</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($users as $user)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            @php
                                $i = 0;
                            @endphp
                            @foreach ($user->business as $business)
                                @php
                                    $i++;
                                @endphp
                            @endforeach
                            <td>{{ $i }}</td>
                            <td>
                                @if (!$user->deleted_at)
                                    <span class="badge bg-success">Active</span>
                                @else
                                    <span class="badge bg-warning">Inactive</span>
                                @endif
                            </td>
                            <td>
                                @if (!$user->deleted_at)
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-danger btn-sm"
                                        wire:click='getId({{ $user->id }})' data-bs-toggle="modal"
                                        data-bs-target="#delete">
                                        Delete
                                    </button>

                                    <!-- Modal -->
                                    <div wire:ignore.self class="modal fade" id="delete" tabindex="-1"
                                        aria-labelledby="deleteLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="deleteLabel">Delete User Account</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    Are you sure you want to delete this user account?
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
                                    <button type="button" class="btn btn-success btn-sm"
                                        wire:click='getId({{ $user->id }})' data-bs-toggle="modal"
                                        data-bs-target="#restore">
                                        Restore
                                    </button>

                                    <!-- Modal -->
                                    <div wire:ignore.self class="modal fade" id="restore" tabindex="-1"
                                        aria-labelledby="restoreLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="restoreLabel">Restore User Account</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    Are you sure you want to restore this user account?
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
                                        wire:click='getId({{ $user->id }})' data-bs-toggle="modal"
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
                                                        User Account</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    Are you sure you want to delete this user account?
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
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <th class="text-center" colspan="6" scope="row">No Users Found</th>
                        </tr>
                    @endforelse

                </tbody>
            </table>
        </div>
    </div>
</div>
