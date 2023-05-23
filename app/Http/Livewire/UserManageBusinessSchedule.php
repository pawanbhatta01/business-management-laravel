<?php

namespace App\Http\Livewire;

use App\Models\Business;
use App\Models\Schedule;
use Livewire\Component;

class UserManageBusinessSchedule extends Component
{
    public $business_id;
    public $schedule_id, $opening, $closing;
    protected $business;

    public function rules()
    {
        return [
            'opening' => 'required',
            'closing' => 'required'
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

    public function editModal(int $id)
    {
        $this->schedule_id = $id;
        $schedule = Schedule::find($id);
        $this->opening = $schedule->opening;
        $this->closing = $schedule->closing;
    }

    public function edit()
    {
        $this->validate();
        Schedule::where('id', $this->schedule_id)->update(
            [
                'opening' => $this->opening,
                'closing' => $this->closing,
            ]
        );
        $this->dispatchBrowserEvent('message', ['message' => "Schedule is updated successfully."]);
        $this->dispatchBrowserEvent('modal-close');
    }
    public function render()
    {
        $this->business = Business::where('id', $this->business_id)->with('schedules')->first();
        return view('livewire.user-manage-business-schedule', ['business' => $this->business]);
    }
}
