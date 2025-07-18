<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\User;
use Livewire\WithPagination;

class UserActivation extends Component
{
    use WithPagination;

    public $search = '';

    public function getUsersProperty()
    {
        return User::where('role', 'client')
            ->where('is_active', true)
            ->when($this->search, fn($q) => $q->where('name', 'like', '%' . $this->search . '%'))
            ->latest()
            ->paginate(10);
    }

    public function render()
    {
        return view('livewire.admin.user-activation', [
            'users' => $this->users
        ]);
    }
}