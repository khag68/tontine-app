<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\AdminAction;
use Livewire\WithPagination;

class AdminActionHistory extends Component
{
    use WithPagination;

    public $search = '';

    public function getActionsProperty()
    {
        return AdminAction::with('admin')
            ->when($this->search, fn($q) => $q->where('notes', 'like', '%' . $this->search . '%'))
            ->latest()
            ->paginate(10);
    }

    public function render()
    {
        return view('livewire.admin.admin-action-history', [
            'actions' => $this->actions
        ]);
    }
}