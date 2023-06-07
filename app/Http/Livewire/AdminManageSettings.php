<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Business;
use App\Models\SiteConfig;

class AdminManageSettings extends Component
{
    protected $settings;
    public $business_id, $value, $setting_id;

    public function view(int $id)
    {
        $setting = SiteConfig::where('id', $id)->first();
        $this->value = $setting->value;
        $this->setting_id = $setting->id;
    }

    public function edit()
    {
        $setting = SiteConfig::where('id', $this->setting_id)->first();
        $setting->value = $this->value;
        $setting->update();
        $this->dispatchBrowserEvent('message', ['message' => "Setting is updated successfully."]);
        $this->dispatchBrowserEvent('modal-close');

        $this->resetErrorBag();
        $this->value = "";
    }

    public function render()
    {
        $this->settings = SiteConfig::all();
        return view('livewire.admin-manage-settings', ['settings' => $this->settings]);
    }
}
