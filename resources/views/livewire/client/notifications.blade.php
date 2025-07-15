<div class="bg-white rounded-lg shadow p-6">
  
    <h3 class="text-lg font-bold text-indigo-700 mb-4 flex justify-between items-center">
        🔔 Notifications
        <span class="text-xs bg-indigo-100 text-indigo-700 px-2 py-1 rounded">
            Non lus : {{ $unreadCount }}
        </span>
    </h3>

    <ul class="divide-y text-sm">
        @forelse($notifications as $notif)
            <li class="py-3 flex justify-between items-center">
                <div>
                    <p class="font-semibold text-gray-800">{{ $notif->title }}</p>
                    <p class="text-gray-600">{{ $notif->message }}</p>
                    <p class="text-xs text-gray-400">{{ $notif->created_at->diffForHumans() }}</p>
                </div>
                @unless($notif->read)
                    <button wire:click="markAsRead({{ $notif->id }})" class="text-xs text-indigo-600 hover:underline">
                        Marquer comme lu
                    </button>
                @endunless
            </li>
        @empty
            <li class="py-4 text-gray-500 text-center">Aucune notification.</li>
        @endforelse
    </ul>

    <div class="mt-4">{{ $notifications->links() }}</div>
</div>
