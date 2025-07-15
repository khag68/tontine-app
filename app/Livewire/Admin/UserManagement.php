<?php

namespace App\Livewire\Admin;

use Livewire\Component;

use Livewire\WithPagination;

class UserManagement extends Component
{
    use WithPagination;

    public $statusFilter = 'all';

    public function getFilteredUsersProperty()
    {
        return User::where('role', 'client')
            ->when($this->statusFilter === 'active', fn($q) => $q->where('is_active', true))
            ->when($this->statusFilter === 'inactive', fn($q) => $q->where('is_active', false))
            ->paginate(10); // 🧩 Nombre d'utilisateurs par page
    }

    public function toggleActivation($userId)
    {
        $user = User::findOrFail($userId);
        $user->update(['is_active' => !$user->is_active]);

        AdminAction::create([
            'admin_id' => Auth::id(),
            'action_type' => AdminAction::ACTION_USER_ACTIVATION,
            'target_id' => $user->id,
            'action_details' => ['new_status' => $user->is_active],
            'notes' => 'Changement de statut utilisateur',
        ]);

        session()->flash('message', 'Statut mis à jour pour ' . $user->name);
    }

    public function render()
    {
        return view('livewire.admin.user-management', [
            'filteredUsers' => $this->filteredUsers
        ]);
    }
}