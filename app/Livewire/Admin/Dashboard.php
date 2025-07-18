<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\User;
use App\Models\Deposit;
use App\Models\Withdrawal;
use Carbon\Carbon;

class Dashboard extends Component
{
    public $totalUsers, $pendingKyc, $kycVerified, $activeUsers,
           $newUsersToday, $totalDeposits, $pendingWithdrawals,
           $monthlyStats;

    public function mount()
    {
        $this->loadStats();
        $this->prepareMonthlyStats();

    }


    public function loadStats()
    {
        $this->totalUsers = User::where('role', 'client')->count();
        $this->pendingKyc = User::where('kyc_status', 'pending')->count();
        $this->kycVerified = User::where('kyc_status', 'verified')->count();
        $this->activeUsers = User::where('is_active', true)->count();
        $this->newUsersToday = User::whereDate('created_at', now()->toDateString())->count();
        $this->totalDeposits = Deposit::where('status', 'completed')->sum('amount');
        $this->pendingWithdrawals = Withdrawal::where('status', 'pending')->count();
    }

    public function prepareMonthlyStats()
    {
        $this->monthlyStats = collect();

        foreach (range(1, 12) as $month) {
            $label = Carbon::create()->month($month)->format('M');
            $sum = Deposit::whereMonth('created_at', $month)
                ->whereYear('created_at', now()->year)
                ->where('status', 'completed')
                ->sum('amount');

            $this->monthlyStats->push(['month' => $label, 'amount' => $sum]);
        }
    }

    public function render()
    {
        return view('livewire.admin.dashboard', [
            'totalUsers' => $this->totalUsers,
            'pendingKyc' => $this->pendingKyc,
            'kycVerified' => $this->kycVerified,
            'activeUsers' => $this->activeUsers,
            'newUsersToday' => $this->newUsersToday,
            'totalDeposits' => $this->totalDeposits,
            'pendingWithdrawals' => $this->pendingWithdrawals,
            'monthlyStats' => $this->monthlyStats,
        ]);
    }
}