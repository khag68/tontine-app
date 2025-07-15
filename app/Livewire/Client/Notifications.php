<?php

namespace App\Livewire\Client;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Notification;
use Illuminate\Support\Facades\Auth;

class Notifications extends Component
{
    use WithPagination;

    public $unreadCount;

    public function mount()
    {
        $this->unreadCount = Notification::where('user_id', Auth::id())
            ->where('read_at', false)
            ->count();
    }

    public function markAsRead($id)
    {
        $notif = Notification::where('id', $id)
            ->where('user_id', Auth::id())
            ->first();

        if ($notif) {
            $notif->update(['read' => true]);
        }
    }

    public function render()
    {
        $notifications = Notification::where('user_id', Auth::id())
            ->latest()
            ->paginate(8);

        $this->unreadCount = Notification::where('user_id', Auth::id())
            ->where('read_at', false)
            ->count();

        return view('livewire.client.notifications', [
            'notifications' => $notifications,
            'unreadCount' => $this->unreadCount
        ]);
    }
}
