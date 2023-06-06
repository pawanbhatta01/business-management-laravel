<?php

namespace App\Http\Livewire;

use App\Models\Business;
use App\Models\Service;
use Livewire\Component;
use Livewire\WithPagination;

class ShowServices extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    public $business;
    protected $services;

    public function mount(Business $business)
    {
        $this->business = $business;
    }
    public function render()
    {
        $this->services = Service::where('business_id', $this->business->id)->paginate(12);
        return view('livewire.show-services', ['services' => $this->services]);
    }
}
