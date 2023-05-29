<?php

namespace App\Http\Livewire;

use App\Models\Menu;
use Livewire\Component;
use App\Models\Business;
use App\Models\BusinessPage;
use Illuminate\Support\Facades\File;

class UserManageBusinessMenu extends Component
{

    public $business_id, $page, $menu_id, $order;
    protected $menus, $pages;

    protected function rules()
    {
        return [
            'page' => 'required',
        ];
    }

    public function modalClose()
    {
        $this->resetInput();
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

    public function getData(int $id)
    {
        $this->menu_id = $id;
        $menu = Menu::where('id', $id)->withTrashed()->first();
        $this->page = $menu->page_id;
        $this->order = $menu->order;
    }

    public function edit()
    {
        $this->validate();

        $menu = Menu::find($this->menu_id);
        $menu->page_id = $this->page;
        $menu->order = $this->order;
        $menu->update();

        $this->resetInput();

        $this->dispatchBrowserEvent('message', ['message' => "Menu is updated successfully."]);
        $this->dispatchBrowserEvent('modal-close');
    }
    public function resetInput()
    {
        $this->order = "";
        $this->page = "";
        $this->menu_id = "";
        $this->resetErrorBag();
    }

    public function add()
    {
        $this->validate();

        Menu::create([
            'page_id' => $this->page,
            'order' => $this->order,
            'business_id' => $this->business_id
        ]);

        $this->resetInput();

        $this->dispatchBrowserEvent('message', ['message' => "Menu is added successfully."]);
        $this->dispatchBrowserEvent('modal-close');
    }

    public function delete()
    {
        $menu = Menu::find($this->menu_id);
        $menu->delete();
        $this->dispatchBrowserEvent('message', ['message' => "Menu is temporarily deleted."]);
        $this->dispatchBrowserEvent('modal-close');
        $this->resetInput();
    }

    public function restore()
    {
        $menu = Menu::where('id', $this->menu_id)->withTrashed()->first();
        $menu->restore();
        $this->dispatchBrowserEvent('message', ['message' => "Menu is restored successfully."]);
        $this->dispatchBrowserEvent('modal-close');
        $this->resetInput();
    }

    public function deletePermanent()
    {
        $menu = Menu::where('id', $this->menu_id)->withTrashed()->first();
        $menu->forceDelete();
        $this->dispatchBrowserEvent('message', ['message' => "Menu is permanently deleted."]);
        $this->dispatchBrowserEvent('modal-close');
        $this->resetInput();
    }
    public function render()
    {
        $this->menus = Menu::where('business_id', $this->business_id)->with('page')->withTrashed()->get();
        $this->pages = BusinessPage::where('business_id', $this->business_id)->whereNotIn('slug', ['home', 'about', 'services', 'gallery', 'contact'])->get();
        return view('livewire.user-manage-business-menu', ['pages' => $this->pages, 'menus' => $this->menus]);
    }
}
