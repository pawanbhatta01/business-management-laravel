<?php

namespace App\Http\Livewire;

use App\Models\Address;
use App\Models\Contact;
use Livewire\Component;
use App\Models\Business;

class UserManageBusinessInformation extends Component
{
    public $business_slug;
    protected $business;

    public $mobile, $tel, $fax, $email, $website, $check = "", $country, $state, $district, $city, $zip, $street;

    public function updated($fields)
    {
        if ($this->check == "contact") {
            $this->contactRules();
        } elseif ($this->check == "address") {
            $this->addressRules();
        }
    }

    public function contactRules()
    {
        $this->validate([
            'mobile' => 'numeric',
            'tel' => 'numeric',
            'fax' => 'numeric',
            'email' => 'email',
            'website' => 'url'
        ]);
    }

    public function addressRules()
    {
        $this->validate([
            'country' => 'string',
            'state' => 'string',
            'district' => 'string',
            'city' => 'string',
            'zip' => 'numeric',
            'street' => 'string',
        ]);
    }

    public function contactModal()
    {
        $this->check = "contact";
        $business = Business::where('slug', $this->business_slug)->first();
        $contact = Contact::where('business_id', $business->id)->first();
        $this->mobile = $contact->mobile;
        $this->tel = $contact->tel;
        $this->fax = $contact->fax;
        $this->email = $contact->email;
        $this->website = $contact->website;
    }

    public function addressModal()
    {
        $this->check = "address";
        $business = Business::where('slug', $this->business_slug)->first();
        $address = Address::where('business_id', $business->id)->first();
        $this->country = $address->country;
        $this->state = $address->state;
        $this->district = $address->district;
        $this->city = $address->city;
        $this->zip = $address->zip;
        $this->street = $address->street;
    }

    public function mount(string $slug)
    {
        $this->business_slug = $slug;
    }

    public function editContact()
    {

        $this->validate([
            'mobile' => 'numeric',
            'tel' => 'numeric',
            'fax' => 'numeric',
            'email' => 'email',
            'website' => 'url'
        ]);

        $business = Business::where('slug', $this->business_slug)->first();
        $contact = Contact::where('business_id', $business->id)->first();
        $contact->update(
            [
                'mobile' => $this->mobile,
                'tel' => $this->tel,
                'fax' => $this->fax,
                'email' => $this->email,
                'website' => $this->website,
            ]
        );
        $this->dispatchBrowserEvent('message', ['message' => "Contact information is updated successfully."]);
        $this->dispatchBrowserEvent('modal-close');
    }

    public function editAddress()
    {

        $this->validate([
            'country' => 'string',
            'state' => 'string',
            'district' => 'string',
            'city' => 'string',
            'zip' => 'numeric',
            'street' => 'string',
        ]);

        $business = Business::where('slug', $this->business_slug)->first();
        $address = Address::where('business_id', $business->id)->first();
        $address->update(
            [
                'country' => $this->country,
                'state' => $this->state,
                'district' => $this->district,
                'city' => $this->city,
                'zip' => $this->zip,
                'street' => $this->street,
            ]
        );
        $this->dispatchBrowserEvent('message', ['message' => "Address information is updated successfully."]);
        $this->dispatchBrowserEvent('modal-close');
    }

    public function render()
    {
        $this->business = Business::where('slug', $this->business_slug)->with('address')->with('contact')->with('creator')->first();
        return view('livewire.user-manage-business-information', ['business' => $this->business]);
    }
}
