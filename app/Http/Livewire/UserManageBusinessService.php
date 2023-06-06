<?php

namespace App\Http\Livewire;

use App\Models\Business;
use App\Models\Service;
use Livewire\Component;

class UserManageBusinessService extends Component
{

    protected $services;
    public $business_id, $title, $description, $service_id;

    protected function rules()
    {
        return [
            'title' => 'required|max:20',
            'description' => 'required|min:100'
        ];
    }

    public function mount($slug)
    {
        $business = Business::where('slug', $slug)->first();
        $this->business_id = $business->id;
    }

    public function resetInput()
    {
        $this->title = "";
        $this->description = "";
    }

    public function updated($fields)
    {
        $this->validateOnly($fields);
    }

    public function add()
    {
        $this->validate();
        Service::create([
            'title' => $this->title,
            'description' => $this->description,
            'business_id' => $this->business_id
        ]);

        $this->dispatchBrowserEvent('message', ['message' => "Business Service is added successfully."]);
        $this->dispatchBrowserEvent('modal-close');
        $this->resetInput();
    }

    public function view(int $id)
    {
        $this->service_id = $id;
        $service = Service::where('id', $id)->withTrashed()->first();
        $this->description = $service->description;
        $this->title = $service->title;
    }

    public function edit()
    {
        $this->validate();
        $service = Service::where('id', $this->service_id)->first();
        if ($service) {
            $service->title = $this->title;
            $service->description = $this->description;
            $service->update();
            $this->dispatchBrowserEvent('message', ['message' => "Business Service is updated successfully."]);
        }

        $this->dispatchBrowserEvent('modal-close');
        $this->resetInput();
    }

    public function delete()
    {
        Service::where('id', $this->service_id)->delete();
        $this->dispatchBrowserEvent('message', ['message' => "Business Service is temorarily deleted."]);
        $this->dispatchBrowserEvent('modal-close');
        $this->resetInput();
    }
    public function restore()
    {
        Service::where('id', $this->service_id)->restore();
        $this->dispatchBrowserEvent('message', ['message' => "Business Service is restored successfully."]);
        $this->dispatchBrowserEvent('modal-close');
        $this->resetInput();
    }
    public function deletePermanent()
    {
        Service::where('id', $this->service_id)->forceDelete();
        $this->dispatchBrowserEvent('message', ['message' => "Business Service is permanently deleted."]);
        $this->dispatchBrowserEvent('modal-close');
        $this->resetInput();
    }
    public function render()
    {
        $this->services = Service::where('business_id', $this->business_id)->withTrashed()->get();
        return view('livewire.user-manage-business-service', ['services' => $this->services]);
    }
}
