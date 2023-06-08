<?php

namespace App\Http\Livewire;

use App\Models\Business;
use App\Models\BusinessAbout;
use Livewire\Component;
use Livewire\WithFileUploads;

class UserManageBusinessAbout extends Component
{

    use WithFileUploads;

    protected $about, $business;
    public $title, $description, $image, $business_id;

    protected function rules()
    {
        return [
            'title' => 'required',
            'description' => 'required',
            'image' => 'required'
        ];
    }

    public function updated($fields)
    {
        $this->validateOnly($fields);
    }

    public function mount(string $slug)
    {
        $business = Business::where('slug', $slug)->first();
        $this->business_id = $business->id;
    }

    public function getData()
    {
        $about = BusinessAbout::where('business_id', $this->business_id)->first();
        $this->title = $about->title;
        $this->description = $about->description;
        $this->image = $about->image;
    }

    public function update()
    {
        $about = BusinessAbout::where('business_id', $this->business_id)->first();
        $about->title = $this->title;
        $about->description = $this->description;
        $about->image = $this->image;
        $about->update();

        $this->dispatchBrowserEvent('message', ['message' => "Business is permanently deleted."]);
        $this->dispatchBrowserEvent('modal-close');
    }
    public function render()
    {
        $this->business = Business::where('id', $this->business_id)->with('about')->first();
        // dd($this->business->about);
        // $about = BusinessAbout::where('business_id', $this->business->id)->first();
        return view('livewire.user-manage-business-about', ['business' => $this->business]);
    }
}
