<div>
    <div class="card mx-4 my-4">
        <div class="card-body table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Day</th>
                        <th scope="col">Opening</th>
                        <th scope="col">Closing</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($business->schedules as $schedule)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $schedule->day }}</td>
                            <td>{{ $schedule->opening }}</td>
                            <td>{{ $schedule->closing }}</td>
                            <td>
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#edit" wire:click='editModal({{ $schedule->id }})'>
                                    Edit
                                </button>

                                <!-- Modal -->
                                <div wire:ignore.self class="modal fade" id="edit" tabindex="-1"
                                    aria-labelledby="editLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="editLabel">Edit Time</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <form action="" wire:submit.prevent='edit'>
                                                <div class="modal-body">
                                                    <div class="mb-3">
                                                        <label class="form-label">Opening Time</label>
                                                        <input type="time" class="form-control" wire:model='opening'>
                                                        @error('opening')
                                                            <div class="form-text text-danger">{{ $message }} </div>
                                                        @enderror
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label">Closing Time</label>
                                                        <input type="time" class="form-control" wire:model='closing'>
                                                        @error('closing')
                                                            <div class="form-text text-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                                </div>
                                            </form>
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
