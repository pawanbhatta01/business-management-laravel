<?php

namespace App\Http\Livewire;

use App\Models\Business;
use App\Models\BusinessContact;
use Livewire\Component;

class HomeMessageHome extends Component
{

    public $name, $email, $message, $business_id;

    protected function rules()
    {
        return [
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required'
        ];
    }

    public function mount(string $slug)
    {
        $business = Business::where('slug', $slug)->first();
        $this->business_id = $business->id;
    }

    public function updated($fields)
    {
        $this->validateOnly($fields);
    }

    public function send()
    {
        $this->validate();

        BusinessContact::create([
            'name' => $this->name,
            'email' => $this->email,
            'message' => $this->message,
            'subject' => "",
            'business_id' => $this->business_id
        ]);

        $this->name = "";
        $this->email = "";
        $this->message = "";

        session()->flash('message', 'Message is sent successfully');
    }

    public function render()
    {
        return view('livewire.home-message-home');
    }
}
