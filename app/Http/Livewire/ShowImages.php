<?php

namespace App\Http\Livewire;

use App\Models\Business;
use App\Models\File;
use Livewire\Component;

class ShowImages extends Component
{
    public $business;
    protected $images;


    public function mount(Business $business)
    {
        $this->business = $business;
    }
    public function render()
    {
        $this->images = File::where('business_id', $this->business->id)->where('type', "image")->paginate(12);
        return view('livewire.show-images', ['images' => $this->images]);
    }
}
