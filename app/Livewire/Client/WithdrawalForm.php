<?php

namespace App\Livewire\Client;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Withdrawal;
use App\Models\Notification;
use Illuminate\Support\Facades\Auth;

class WithdrawalForm extends Component
{
    use WithPagination;

    protected $paginationTheme = 'tailwind';

    public $amount;
    public $reason;

    protected $rules = [
        'amount' => 'required|numeric|min:1000',
        'reason' => 'required|string|max:255',
    ];

    public function submit()
    {
        $this->validate();

        $user = Auth::user();

        if (!$user->canWithdraw()) {
            session()->flash('error', 'Votre profil KYC doit être vérifié.');
            return;
        }

        if ($user->balance < $this->amount) {
            session()->flash('error', 'Solde insuffisant.');
            return;
        }

        Withdrawal::create([
            'user_id' => $user->id,
            'amount' => $this->amount,
            'reason' => $this->reason,
            'status' => 'pending',
        ]);

        Notification::create([
            'user_id' => $user->id,
            'type' => 'withdrawal_requested',
            'title' => 'Demande de retrait',
            'message' => "Votre demande de retrait de {$this->amount} FCFA a été enregistrée.",
        ]);

        session()->flash('message', '✅ Demande de retrait envoyée.');

        $this->reset(['amount', 'reason']);
    }

    public function render()
    {
        $withdrawals = Withdrawal::where('user_id', Auth::id())
            ->latest()
            ->paginate(8);

        return view('livewire.client.withdrawal-form', compact('withdrawals'));
    }
}