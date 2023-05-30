<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class AdminManageUser extends Component
{
    protected $users;
    public $user_id;

    public function getId(int $id)
    {
        $this->user_id = $id;
    }

    public function delete()
    {
        $user = User::where('id', $this->user_id)->with('business')->first();
        foreach ($user->business as $business)
            $business->delete();
        $user->delete();
        $this->dispatchBrowserEvent('message', ['message' => "User is temporarily deleted."]);
        $this->dispatchBrowserEvent('modal-close');
    }
    public function restore()
    {
        $user = User::where('id', $this->user_id)->withTrashed()->first();
        $user->restore();
        $this->dispatchBrowserEvent('message', ['message' => "User is restored successfully."]);
        $this->dispatchBrowserEvent('modal-close');
    }
    public function deletePermanent()
    {
        $user = User::where('id', $this->user_id)->withTrashed()->with('business')->first();
        if ($user->business) {
            $this->dispatchBrowserEvent('message', ['message' => "User has business. You can't delete until the business is deleted."]);
            $this->dispatchBrowserEvent('modal-close');
        } else {
            $user->forceDelete();
            $this->dispatchBrowserEvent('message', ['message' => "User is permanently deleted."]);
            $this->dispatchBrowserEvent('modal-close');
        }
    }

    public function render()
    {
        $this->users = User::withTrashed()->where('role', 1)->with('business')->get();
        return view('livewire.admin-manage-user', ['users' => $this->users]);
    }
}
