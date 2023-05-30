<?php

namespace App\Http\Livewire;

use App\Models\Business;
use Livewire\Component;

class AdminManageBusiness extends Component
{
    protected $businesses;
    public $business_id;


    public function getId(int $id)
    {
        $this->business_id = $id;
    }

    public function delete()
    {
        $business = Business::where('id', $this->business_id)->first();
        $business->delete();
        $this->dispatchBrowserEvent('message', ['message' => "Business is temporarily deleted."]);
        $this->dispatchBrowserEvent('modal-close');
    }
    public function restore()
    {
        $Business = Business::where('id', $this->business_id)->withTrashed()->first();
        $Business->restore();
        $this->dispatchBrowserEvent('message', ['message' => "Business is restored successfully."]);
        $this->dispatchBrowserEvent('modal-close');
    }
    public function deletePermanent()
    {
        $Business = Business::where('id', $this->business_id)->with('contact')->with('address')->with('ratings')->with('menus')->with('pages')->withTrashed()->first();
        if ($Business->ratings->count() != 0 && $Business->menus->count() != 0) {
            $this->dispatchBrowserEvent('message', ['message' => "Business is not empty. You can't delete until the contents are deleted."]);
            $this->dispatchBrowserEvent('modal-close');
        } else {
            $Business->contact->forceDelete();
            $Business->address->forceDelete();
            if ($Business->pages->count() != 0) {

                $Business->pages->forceDelete();
            }
            $$Business->forceDelete();
            $this->dispatchBrowserEvent('message', ['message' => "Business is permanently deleted."]);
            $this->dispatchBrowserEvent('modal-close');
        }
    }
    public function render()
    {
        $this->businesses = Business::withTrashed()->get();
        return view('livewire.admin-manage-business', ['businesses' => $this->businesses]);
    }
}
