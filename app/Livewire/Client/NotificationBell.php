<?php

namespace App\Livewire\Client;

use Livewire\Component;
use App\Models\Notification;
use Illuminate\Support\Facades\Auth;

class NotificationBell extends Component
{
    public $notifications = [];
    public $unreadCount = 0;

    public function mount()
    {
        $user = Auth::user();

        $this->unreadCount = Notification::unread()
            ->where('user_id', $user->id)
            ->count();

        $this->notifications = Notification::where('user_id', $user->id)
            ->latest()
            ->take(6)
            ->get();
    }

    public function markAsRead($id)
    {
        $notif = Notification::where('id', $id)
            ->where('user_id', Auth::id())
            ->first();

        if ($notif) {
            $notif->markAsRead();
            $this->mount(); // recharge
        }
    }

    public function render()
    {
        return view('livewire.client.notification-bell');
    }
}
