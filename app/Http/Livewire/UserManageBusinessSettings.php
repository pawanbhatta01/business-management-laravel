<?php

namespace App\Http\Livewire;

use App\Models\Business;
use App\Models\BusinessSiteConfig;
use Livewire\Component;

class UserManageBusinessSettings extends Component
{
    protected $settings;
    public $business_id, $value, $setting_id;

    public function mount(string $slug)
    {
        $business = Business::where('slug', $slug)->first();
        $this->business_id = $business->id;
    }

    public function view(int $id)
    {
        $setting = BusinessSiteConfig::where('id', $id)->first();
        $this->value = $setting->value;
        $this->setting_id = $setting->id;
    }

    public function edit()
    {
        $setting = BusinessSiteConfig::where('id', $this->setting_id)->first();
        $setting->value = $this->value;
        $setting->update();
        $this->dispatchBrowserEvent('message', ['message' => "Setting is updated successfully."]);
        $this->dispatchBrowserEvent('modal-close');

        $this->resetErrorBag();
        $this->value = "";
    }

    public function render()
    {
        $this->settings = BusinessSiteConfig::where('business_id', $this->business_id)->get();
        return view('livewire.user-manage-business-settings', ['settings' => $this->settings]);
    }
}
