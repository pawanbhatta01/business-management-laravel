<?php

namespace App\Http\Livewire;

use App\Models\Address;
use App\Models\Contact;
use Livewire\Component;
use App\Models\Business;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class UserManageBusiness extends Component
{
    use WithFileUploads;


    protected $businesses;
    public $name, $slug, $owner_name, $description, $image, $business_id, $old_image;

    protected function rules()
    {
        return [
            'name' => 'required',
            'slug' => 'required|alpha_dash|unique:businesses,slug,' . $this->business_id,
            'owner_name' => 'required',
            'description' => 'required'
        ];
    }

    public function updated($fields)
    {
        $this->validateOnly($fields);
    }

    public function add()
    {
        $this->validate();
        $this->validate([
            'image' => 'required|image|mimes:png,jpg,jpeg|max:2048'
        ]);

        $image_name = strtolower(str_replace(" ", "", $this->name)) . "-" . time() . "." . $this->image->getClientOriginalExtension();
        $this->image->storeAs('images', $image_name, 'files');

        $business = Business::create([
            'name' => $this->name,
            'slug' => $this->slug,
            'owner_name' => $this->owner_name,
            'description' => $this->description,
            'creator_id' => Auth::id(),
            'status' => 0,
            'image' => $image_name
        ]);

        Address::create([
            'business_id' => $business->id
        ]);

        Contact::create([
            'business_id' => $business->id
        ]);
        $this->dispatchBrowserEvent('message', ['message' => "Business is added successfully."]);
        $this->dispatchBrowserEvent('modal-close');
    }

    public function getData(int $id)
    {
        $this->business_id = $id;
        $business = Business::where('id', $id)->withTrashed()->first();

        $this->name = $business->name;
        $this->slug = $business->slug;
        $this->owner_name = $business->owner_name;
        $this->description = $business->description;
        $this->old_image = $business->image;
    }

    public function edit()
    {
        $this->validate();

        $business = Business::find($this->business_id);

        if ($this->image != Null) {
            $this->validate([
                'image' => 'image|mimes:png,jpg,jpeg|max:2048'
            ]);
            $image_name = strtolower(str_replace(" ", "", $this->name)) . "-" . time() . "." . $this->image->getClientOriginalExtension();
            $this->image->storeAs('images', $image_name, 'files');
            File::delete(public_path('images/' . $business->image));
            $business->image = $image_name;
        }

        $business->name = $this->name;
        $business->slug = $this->slug;
        $business->owner_name = $this->owner_name;
        $business->description = $this->description;

        $business->save();

        $this->dispatchBrowserEvent('message', ['message' => "Business is updated successfully."]);
        $this->dispatchBrowserEvent('modal-close');
    }

    public function delete()
    {
        $business = Business::find($this->business_id);
        $business->delete();
        $this->dispatchBrowserEvent('message', ['message' => "Business is temporarily deleted."]);
        $this->dispatchBrowserEvent('modal-close');
    }

    public function restore()
    {
        $business = Business::where('id', $this->business_id)->withTrashed()->first();
        $business->restore();
        $this->dispatchBrowserEvent('message', ['message' => "Business is restored successfully."]);
        $this->dispatchBrowserEvent('modal-close');
    }

    public function deletePermanent()
    {
        $business = Business::where('id', $this->business_id)->withTrashed()->first();
        $business->forceDelete();
        $this->dispatchBrowserEvent('message', ['message' => "Business is permanently deleted."]);
        $this->dispatchBrowserEvent('modal-close');
    }

    public function render()
    {
        $this->businesses = Business::where('creator_id', Auth::id())->withTrashed()->get();
        return view('livewire.user-manage-business', ['businesses' => $this->businesses]);
    }
}
