<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\User;
use App\Models\AdminAction;
use Illuminate\Support\Facades\Auth;

class UserActivation extends Component
{
    public $users;

    public function mount()
    {
        $this->users = User::where('role', 'client')->get();
    }

    public function toggleStatus($userId)
    {
        $user = User::findOrFail($userId);
        $user->update(['is_active' => !$user->is_active]);

        AdminAction::create([
            'admin_id' => Auth::id(),
            'action_type' => AdminAction::ACTION_USER_ACTIVATION,
            'target_id' => $user->id,
            'action_details' => ['new_status' => $user->is_active],
            'notes' => 'Modification statut utilisateur',
        ]);

        $this->mount(); // Rafraîchir les données
    }

    public function render()
    {
        return view('livewire.admin.user-activation');
    }
}