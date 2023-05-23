<div>
    <div class="my-4 mx-4">
        <div class="card">
            <div class="card-header">
                Basic Infomation
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-4 col-md-6 col-sm-12 my-3">
                        <strong>Name: </strong>{{ $business->name }}
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12 my-3">
                        <strong>Slug: </strong>{{ $business->slug }}
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12 my-3">
                        <strong>Creator: </strong>{{ $business->creator->name }}
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12 my-3">
                        <strong>Owner Name: </strong>{{ $business->owner_name }}
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12 my-3">
                        <strong>Preview Image: </strong>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal"
                            data-bs-target="#viewImage">
                            View Image
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="viewImage" tabindex="-1" aria-labelledby="viewImageLabel"
                            aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable  ">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="viewImageLabel">View Image</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <img class="w-100" src="{{ asset('images/' . $business->image) }}"
                                            alt="">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 my-3">
                        <strong>Description: </strong>{{ $business->description }}
                    </div>

                </div>
            </div>
        </div>
        <div class="card my-2">
            <div class="card-header">
                Contact Infomation
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary btn-sm float-end" data-bs-toggle="modal"
                    data-bs-target="#contact" wire:click='contactModal'>
                    Edit
                </button>

                <!-- Modal -->
                <div wire:ignore.self class="modal fade" id="contact" tabindex="-1" aria-labelledby="contactLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="contactLabel">Edit Contact Details</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <form action="" wire:submit.prevent='editContact'>
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label class="form-label">Mobile Number</label>
                                        <input type="text" class="form-control" wire:model='mobile'>
                                        @error('mobile')
                                            <div class="form-text text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Tel</label>
                                        <input type="text" class="form-control" wire:model='tel'>
                                        @error('tel')
                                            <div class="form-text text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Fax</label>
                                        <input type="text" class="form-control" wire:model='fax'>
                                        @error('fax')
                                            <div class="form-text text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Email</label>
                                        <input type="email" class="form-control" wire:model='email'>
                                        @error('email')
                                            <div class="form-text text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Website</label>
                                        <input type="url" class="form-control" wire:model='website'>
                                        @error('website')
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
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-4 col-md-6 col-sm-12 my-3">
                        <strong>Mobile: </strong>{{ $business->contact->mobile }}
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12 my-3">
                        <strong>Tel: </strong>{{ $business->contact->tel }}
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12 my-3">
                        <strong>Fax: </strong>{{ $business->contact->fax }}
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12 my-3">
                        <strong>Email: </strong>{{ $business->contact->email }}
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12 my-3">
                        <strong>Website: </strong>{{ $business->contact->website }}
                    </div>
                </div>
            </div>
        </div>
        <div class="card my-2">
            <div class="card-header">
                Address Infomation
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary btn-sm float-end" data-bs-toggle="modal"
                    data-bs-target="#address" wire:click='addressModal'>
                    Edit
                </button>

                <!-- Modal -->
                <div wire:ignore.self class="modal fade" id="address" tabindex="-1"
                    aria-labelledby="addressLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered ">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="addressLabel">Edit Address Details</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <form action="" wire:submit.prevent='editAddress'>
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label class="form-label">Country</label>
                                        <input type="text" class="form-control" wire:model='country'>
                                        @error('country')
                                            <div class="form-text text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">State</label>
                                        <input type="text" class="form-control" wire:model='state'>
                                        @error('state')
                                            <div class="form-text text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">District</label>
                                        <input type="text" class="form-control" wire:model='district'>
                                        @error('district')
                                            <div class="form-text text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">City</label>
                                        <input type="text" class="form-control" wire:model='city'>
                                        @error('city')
                                            <div class="form-text text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Zip</label>
                                        <input type="text" class="form-control" wire:model='zip'>
                                        @error('zip')
                                            <div class="form-text text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Street</label>
                                        <input type="text" class="form-control" wire:model='street'>
                                        @error('street')
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
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-4 col-md-6 col-sm-12 my-3">
                        <strong>Country: </strong>{{ $business->address->country }}
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12 my-3">
                        <strong>State: </strong>{{ $business->address->state }}
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12 my-3">
                        <strong>District: </strong>{{ $business->address->district }}
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12 my-3">
                        <strong>City: </strong>{{ $business->address->city }}
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12 my-3">
                        <strong>Zip: </strong>{{ $business->address->zip }}
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12 my-3">
                        <strong>Street: </strong>{{ $business->address->street }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
