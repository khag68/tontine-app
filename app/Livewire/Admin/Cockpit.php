<?php

namespace App\Livewire\Admin;

use Livewire\Component;

class Cockpit extends Component
{
    public $activeTab = 'dashboard';

    public function setTab($tab)
    {
        $this->activeTab = $tab;
    }

   public function render()
    {
        return view('livewire.admin.cockpit', [
            'activeTab' => $this->activeTab // ✅ Passage à la vue
        ]);
    }
}
