<?php

namespace App\Http\Livewire;

use App\Models\Address;
use App\Models\Contact;
use Livewire\Component;
use App\Models\Business;
use App\Models\BusinessPage;
use App\Models\Schedule;
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

    public function resetInputs()
    {
        $this->name = "";
        $this->slug = "";
        $this->owner_name = "";
        $this->description = "";
        $this->image = Null;
        $this->business_id = "";
        $this->old_image = "";
        $this->resetErrorBag();
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

        $days = array("Sunday", "Monday", "Tuesday", "Wednesday", "Thrusday", "Friday", "Saturday");
        foreach ($days as $day) {
            Schedule::create([
                'business_id' => $business->id,
                'day' => $day
            ]);
        }

        $pages = array(
            'Home' => 'home',
            'About' => 'about',
            'Services' => 'services',
            'Gallery' => 'gallery',
            'Contact' => 'contact',
        );

        foreach ($pages as $title => $slug) {
            BusinessPage::create([
                'business_id' => $business->id,
                'title' => $title,
                'slug' => $slug,
            ]);
        }
        $this->dispatchBrowserEvent('message', ['message' => "Business is added successfully."]);
        $this->dispatchBrowserEvent('modal-close');
        $this->resetInputs();
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

    public function modalClose()
    {
        $this->resetInputs();
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
        $this->resetInputs();
    }

    public function delete()
    {
        $business = Business::find($this->business_id);
        $business->delete();
        $this->dispatchBrowserEvent('message', ['message' => "Business is temporarily deleted."]);
        $this->dispatchBrowserEvent('modal-close');
        $this->resetInputs();
    }

    public function restore()
    {
        $business = Business::where('id', $this->business_id)->withTrashed()->first();
        $business->restore();
        $this->dispatchBrowserEvent('message', ['message' => "Business is restored successfully."]);
        $this->dispatchBrowserEvent('modal-close');
        $this->resetInputs();
    }

    public function deletePermanent()
    {
        $business = Business::where('id', $this->business_id)->with('contact')->with('address')->with('schedules')->with('ratings')->with('pages')->with('menus')->with('files')->withTrashed()->first();
        File::delete(public_path('images/' . $business->image));
        $business->contact->forceDelete();
        $business->address->forceDelete();
        $business->schedules->forceDelete();
        $business->ratings->forceDelete();
        $business->pages->forceDelete();
        $business->menus->forceDelete();
        foreach ($business->files as $file) {
            File::delete(public_path('images/' . $file->link));
        }
        $business->files->forceDelete();
        $business->forceDelete();
        $this->dispatchBrowserEvent('message', ['message' => "Business is permanently deleted."]);
        $this->dispatchBrowserEvent('modal-close');
        $this->resetInputs();
    }

    public function render()
    {
        $this->businesses = Business::where('creator_id', Auth::id())->withTrashed()->get();
        return view('livewire.user-manage-business', ['businesses' => $this->businesses]);
    }
}
