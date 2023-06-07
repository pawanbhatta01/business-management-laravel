<?php

namespace App\Http\Livewire;

use App\Models\Business;
use App\Models\Testimonial;
use Livewire\Component;

class AdminManageTestimonial extends Component
{
    protected $businesses, $testimonials;
    public $name, $business, $post, $description, $testimonial_id;

    protected function rules()
    {
        return [
            'name' => 'required',
            'business' => 'required',
            'post' => 'required',
            'description' => 'required',
        ];
    }

    public function updated($fields)
    {
        $this->validateOnly($fields);
    }

    public function clear()
    {
        $this->name = "";
        $this->description = "";
        $this->post = "";
        $this->business = "";
    }

    public function add()
    {
        $this->validate();

        Testimonial::create([
            'name' => $this->name,
            'post' => $this->post,
            'description' => $this->description,
            'business_id' => $this->business,
        ]);

        $this->dispatchBrowserEvent('message', ['message' => "Testmonial is added successfully."]);
        $this->dispatchBrowserEvent('modal-close');

        $this->clear();
    }

    public function getData(Testimonial $testimonial)
    {
        $this->testimonial_id = $testimonial->id;
        $this->name = $testimonial->name;
        $this->post = $testimonial->post;
        $this->description = $testimonial->description;
    }

    public function edit()
    {

        Testimonial::where('id', $this->testimonial_id)->update([
            'name' => $this->name,
            'post' => $this->post,
            'description' => $this->description,
        ]);

        $this->dispatchBrowserEvent('message', ['message' => "Testmonial is updated successfully."]);
        $this->dispatchBrowserEvent('modal-close');

        $this->clear();
    }
    public function delete()
    {

        Testimonial::where('id', $this->testimonial_id)->forceDelete();

        $this->dispatchBrowserEvent('message', ['message' => "Testmonial is deleted successfully."]);
        $this->dispatchBrowserEvent('modal-close');

        $this->clear();
    }
    public function render()
    {
        $this->businesses = Business::where('status', 1)->get();
        $this->testimonials = Testimonial::withTrashed()->with('business')->get();
        return view('livewire.admin-manage-testimonial', ['businesses' => $this->businesses, 'testimonials' => $this->testimonials]);
    }
}
