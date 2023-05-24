<?php

namespace App\Http\Livewire;

use App\Models\Business;
use App\Models\Rating;
use Livewire\Component;

class UserManageBusinessRating extends Component
{
    protected $ratings;
    public $business_id, $rating_id;

    public function mount(string $slug)
    {
        $business = Business::where('slug', $slug)->first();
        $this->business_id = $business->id;
    }

    public function getId(int $id)
    {
        $this->rating_id = $id;
    }

    public function delete()
    {
        $rating = Rating::where('id', $this->rating_id)->first();
        $rating->delete();
        $this->dispatchBrowserEvent('message', ['message' => "Business is temporarily deleted."]);
        $this->dispatchBrowserEvent('modal-close');
    }
    public function restore()
    {
        $rating = Rating::where('id', $this->rating_id)->withTrashed()->first();
        $rating->restore();
        $this->dispatchBrowserEvent('message', ['message' => "Business is restored successfully."]);
        $this->dispatchBrowserEvent('modal-close');
    }
    public function deletePermanent()
    {
        $rating = Rating::where('id', $this->rating_id)->withTrashed()->first();
        $rating->forceDelete();
        $this->dispatchBrowserEvent('message', ['message' => "Business is permanently deleted ."]);
        $this->dispatchBrowserEvent('modal-close');
    }
    public function render()
    {
        // $this->business = Business::where('id', $this->business_id)->with('ratings')->first();
        $this->ratings = Rating::where('business_id', $this->business_id)->withTrashed()->get();
        return view('livewire.user-manage-business-rating', ['ratings' => $this->ratings]);
    }
}
