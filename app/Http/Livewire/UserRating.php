<?php

namespace App\Http\Livewire;

use App\Models\Business;
use App\Models\Rating;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class UserRating extends Component
{
    public $slug, $rate, $review;
    protected $business;

    public function rules()
    {
        return [
            'rate' => 'required|numeric|min:1|max:5',
            'review' => 'required|string'
        ];
    }

    public function mount(string $slug)
    {
        $this->slug = $slug;
    }

    public function updated($fields)
    {
        $this->validateOnly($fields);
    }

    public function rate()
    {
        $this->validate();

        $business = Business::where('slug', $this->slug)->first();

        Rating::create([
            'rate' => $this->rate,
            'comment' => $this->review,
            'business_id' => $business->id,
            'user_id' => Auth::user()->id
        ]);

        session()->flash('message', 'Review was given successfully.');
    }


    public function render()
    {
        $this->business = Business::where('slug', $this->slug)->with('address')->with('contact')->with('ratings')->first();
        return view('livewire.user-rating', ['business' => $this->business]);
    }
}
