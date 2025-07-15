<?php

namespace App\Livewire\Client;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Deposit;

class DepositHistory extends Component
{
    use WithPagination;

    protected $paginationTheme = 'tailwind';

    public function render()
    {
        // ❗ NE PAS stocker $deposits dans une propriété publique
        $deposits = Deposit::where('user_id', auth()->id())
            ->latest()
            ->paginate(8);

        return view('livewire.client.deposit-history', compact('deposits'));
    }
}
