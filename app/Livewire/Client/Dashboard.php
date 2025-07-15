<?php

namespace App\Livewire\Client;

use Livewire\Component;

class Dashboard extends Component
{
     public $user;
    public $recentTransactions;
    public $notifications;

    public function mount()
    {
        $this->user = auth()->user();
        $this->loadRecentTransactions();
        $this->loadNotifications();
    }

    public function loadRecentTransactions()
    {
        $deposits = $this->user->deposits()->latest()->take(5)->get();
        $withdrawals = $this->user->withdrawals()->latest()->take(5)->get();
        $this->recentTransactions = $deposits->merge($withdrawals)->sortByDesc('created_at');
    }
    
    public function render()
    {
        return view('livewire.client.dashboard');
    }
}
