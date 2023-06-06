<?php

namespace App\Http\Livewire;

use App\Models\Business;
use App\Models\BusinessContact;
use Livewire\Component;

class SendMessage extends Component
{

    public $business, $name, $email, $subject, $message;

    protected function rules()
    {
        return [
            'name' => 'required',
            'email' => 'required|email',
            'subject' => 'required',
            'message' => 'required',
        ];
    }

    public function mount(Business $business)
    {
        $this->business = $business;
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
            'subject' => $this->subject,
            'message' => $this->message,
            'business_id' => $this->business->id
        ]);

        $this->name = "";
        $this->email = "";
        $this->subject = "";
        $this->message = "";


        session()->flash('message', "Message sent successfully");
    }
    public function render()
    {
        return view('livewire.send-message');
    }
}
