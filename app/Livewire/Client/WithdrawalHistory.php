<?php

namespace App\Livewire\Client;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Withdrawal;

class WithdrawalHistory extends Component
{
    use WithPagination;

    public function render()
    {
        $withdrawals = Withdrawal::where('user_id', auth()->id())
            ->latest()
            ->paginate(10);

        return view('livewire.client.withdrawal-history', [
            'withdrawals' => $withdrawals
        ]);
    }
}
