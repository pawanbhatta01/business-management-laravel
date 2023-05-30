<?php

namespace App\Http\Livewire;

use App\Models\Business;
use Livewire\Component;

class TopRatedPlaces extends Component
{

    protected $businesses;
    public function render()
    {
        $this->businesses = Business::where('status', 1)->with('ratings')->with('address')->with('contact')->with('creator')->latest()->take(8)->get();
        return view('livewire.top-rated-places', ['businesses' => $this->businesses]);
    }
}
