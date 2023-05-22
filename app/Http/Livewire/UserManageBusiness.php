<?php

namespace App\Http\Livewire;

use App\Models\Address;
use Livewire\Component;
use App\Models\Business;
use App\Models\Contact;
use Illuminate\Support\Facades\Auth;
use Livewire\WithFileUploads;

class UserManageBusiness extends Component
{
    use WithFileUploads;


    protected $businesses;
    public $name, $slug, $owner_name, $description, $image, $business_id;

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
        $this->dispatchBrowserEvent('message', ['message' => "Business Added Successfully."]);
        $this->dispatchBrowserEvent('modal-close');
    }

    public function render()
    {
        $this->businesses = Business::where('creator_id', Auth::id())->get();
        return view('livewire.user-manage-business', ['businesses' => $this->businesses]);
    }
}
