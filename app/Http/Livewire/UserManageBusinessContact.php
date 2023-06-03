<?php

namespace App\Http\Livewire;

use App\Models\Business;
use App\Models\BusinessContact;
use Livewire\Component;
use Livewire\WithPagination;


class UserManageBusinessContact extends Component
{
    use WithPagination;
    public $messages, $business_id;
    protected $paginationTheme = 'bootstrap';
    protected $contacts;

    public function mount(string $slug)
    {
        $business = Business::where('slug', $slug)->first();
        $this->business_id = $business->id;
    }

    public function view(int $id)
    {
        $contact = BusinessContact::where('id', $id)->first();
        $this->messages = $contact->message;
    }
    public function render()
    {
        $this->contacts = BusinessContact::where('business_id', $this->business_id)->paginate(20);
        return view('livewire.user-manage-business-contact', ['contacts' => $this->contacts]);
    }
}
