<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Business;
use App\Models\BusinessPage;
use Illuminate\Http\Request;
use Livewire\WithFileUploads;
use App\Models\BusinessPage as Page;
use Illuminate\Support\Facades\File;

class UserManageBusinessPage extends Component
{
    use WithFileUploads;
    protected $pages;
    public $business_id, $title, $content, $slug, $featured_image, $business_slug, $page_id, $old_featured_image;

    protected function rules()
    {
        return [
            'slug' => 'required|string|alpha_dash',
            'title' => 'required|string',
            'content' => 'required|string'
        ];
    }

    public function updated($fields)
    {
        $this->validateOnly($fields);
    }

    public function resetInput()
    {
        $this->content = "";
        $this->slug = "";
        $this->title = "";
        $this->featured_image = null;
        $this->resetErrorBag();
    }
    public function mount(string $slug)
    {
        $this->resetInput();
        $this->business_slug = $slug;
        $business = Business::where('slug', $slug)->first();
        $this->business_id = $business->id;
    }

    public function getData(int $id)
    {
        $this->resetInput();
        $this->page_id = $id;
        $page = BusinessPage::where('id', $this->page_id)->withTrashed()->first();
        $this->title = $page->title;
        $this->slug = $page->slug;
        $this->old_featured_image = $page->featured_image;
        $this->content = $page->content;
    }

    public function modalClose()
    {
        $this->resetInput();
    }

    public function delete()
    {
        $page = BusinessPage::find($this->page_id);
        $page->delete();
        $this->dispatchBrowserEvent('message', ['message' => "Page is temporarily deleted."]);
        $this->dispatchBrowserEvent('modal-close');
        $this->resetInput();
    }

    public function restore()
    {
        $page = BusinessPage::where('id', $this->page_id)->withTrashed()->first();
        $page->restore();
        $this->dispatchBrowserEvent('message', ['message' => "Page is restored successfully."]);
        $this->dispatchBrowserEvent('modal-close');
        $this->resetInput();
    }

    public function deletePermanent()
    {
        $page = BusinessPage::where('id', $this->page_id)->withTrashed()->first();
        if ($page->featured_image) {
            File::delete(public_path('images/' . $page->featured_image));
        }
        $page->forceDelete();
        $this->dispatchBrowserEvent('message', ['message' => "Page is permanently deleted."]);
        $this->dispatchBrowserEvent('modal-close');
        $this->resetInput();
    }
    public function render()
    {
        $this->pages = Page::where('business_id', $this->business_id)->whereNotIn('slug', ['home', 'about', 'services', 'gallery', 'contact'])->withTrashed()->get();
        return view('livewire.user-manage-business-page', ['pages' => $this->pages]);
    }
}
