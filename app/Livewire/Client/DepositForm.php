<?php
namespace App\Livewire\Client;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Deposit;
use App\Models\Notification;
use Illuminate\Support\Facades\Auth;

class DepositForm extends Component
{
    use WithPagination;

    protected $paginationTheme = 'tailwind';

    public $amount;
    public $description;

    protected $rules = [
        'amount' => 'required|numeric|min:1000',
        'description' => 'nullable|string|max:255',
    ];

    public function submit()
    {
        $this->validate();

        $user = Auth::user();

        // Création du dépôt
        Deposit::create([
            'user_id' => $user->id,
            'amount' => $this->amount,
            'description' => $this->description,
            'status' => 'completed',
        ]);

        // Mise à jour du solde
        if (isset($user->balance)) {
            $user->increment('balance', $this->amount);
        }

        // Création de la notification
        Notification::create([
            'user_id' => $user->id,
            'type' => 'deposit_confirmed',
            'title' => 'Dépôt confirmé',
            'message' => "Votre dépôt de {$this->amount} FCFA a été enregistré avec succès.",
        ]);

        session()->flash('message', '💳 Dépôt enregistré avec succès.');

        $this->reset(['amount', 'description']);
    }

    public function render()
    {
        $deposits = Deposit::where('user_id', Auth::id())
            ->latest()
            ->paginate(8);

        return view('livewire.client.deposit-form', compact('deposits'));
    }
}
