<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Business;
use Livewire\WithFileUploads;
use App\Models\File as FileModel;
use Illuminate\Support\Facades\File;

class UserManageBusinessImage extends Component
{
    use WithFileUploads;
    protected $images;
    public $business_id,$name,$image,$image_id,$oldImage;

    protected function rules()
    {
        return [
            'name' => 'required|string',
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

    public function getData(int $id)
    {
        $this->image_id = $id;
        $image = FileModel::where('id',$id)->withTrashed()->first();
        $this->name = $image->name;
        $this->oldImage = $image->link;
    }

    public function edit()
    {
        $this->validate();

        $image = FileModel::find($this->image_id);
        if ($this->image != Null) {
            $this->validate([
                'image' => 'image|mimes:png,jpg,jpeg|max:2048'
            ]);
            $image_name = strtolower(str_replace(" ", "", $this->name)) . "-" . time() . "." . $this->image->getClientOriginalExtension();
            $this->image->storeAs('images', $image_name, 'files');
            File::delete(public_path('images/' . $image->image));
            $image->link = $image_name;
        }

        $image->name = $this->name;
        $image->update();

        $this->resetInput();

        $this->dispatchBrowserEvent('message', ['message' => "Image is updated successfully."]);
        $this->dispatchBrowserEvent('modal-close');

    }
    public function resetInput()
    {
        $this->name = "";
        $this->image = Null;
        $this->image_id = "";
        $this->resetErrorBag();

    }

    public function add()
    {
        $this->validate();
        $this->validate([
            'image' => 'required|image|mimes:png,jpg,jpeg|max:2048'
        ]);

        $image_name = strtolower(str_replace(" ", "", $this->name)) . "-" . time() . "." . $this->image->getClientOriginalExtension();
        $this->image->storeAs('images', $image_name, 'files');

        FileModel::create([
            'name' => $this->name,
            'link' => $image_name,
            'type' => 'image',
            'business_id' => $this->business_id
        ]);

        $this->resetInput();

        $this->dispatchBrowserEvent('message', ['message' => "Image is added successfully."]);
        $this->dispatchBrowserEvent('modal-close');
    }

    public function delete()
    {
        $image = FileModel::find($this->image_id);
        $image->delete();
        $this->dispatchBrowserEvent('message', ['message' => "Image is temporarily deleted."]);
        $this->dispatchBrowserEvent('modal-close');
        $this->resetInput();
    }

    public function restore()
    {
        $image = FileModel::where('id', $this->image_id)->withTrashed()->first();
        $image->restore();
        $this->dispatchBrowserEvent('message', ['message' => "Image is restored successfully."]);
        $this->dispatchBrowserEvent('modal-close');
        $this->resetInput();
    }

    public function deletePermanent()
    {
        $image = FileModel::where('id', $this->image_id)->withTrashed()->first();
        File::delete(public_path('images/' . $image->link));
        $image->forceDelete();
        $this->dispatchBrowserEvent('message', ['message' => "Image is permanently deleted."]);
        $this->dispatchBrowserEvent('modal-close');
        $this->resetInput();
    }
    public function render()
    {
        $this->images = FileModel::where('business_id', $this->business_id)->where('type', 'image')->withTrashed()->get();
        return view('livewire.user-manage-business-image', ['images' => $this->images]);
    }
}
