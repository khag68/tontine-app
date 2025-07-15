<div x-data="{ open: false }" class="relative">
    <!-- Bouton cloche -->
    <button @click="open = !open" class="relative text-indigo-600 hover:text-indigo-800 focus:outline-none">
        <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002
                6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C8.67 6.165 8 7.388
                8 9v5.159c0 .538-.214 1.055-.595 1.436L6 17h9z" />
        </svg>

        @if($unreadCount > 0)
            <span class="absolute -top-1 -right-1 bg-red-600 text-white text-xs px-1.5 py-0.5 rounded-full">
                {{ $unreadCount }}
            </span>
        @endif
    </button>

    <!-- Dropdown -->
    <div x-show="open" @click.away="open = false"
         class="absolute right-0 mt-2 w-80 max-w-full sm:max-w-md bg-white border border-gray-200 rounded-lg shadow-lg z-50 overflow-hidden"
         x-transition:enter="transition ease-out duration-200"
         x-transition:enter-start="opacity-0 scale-95"
         x-transition:enter-end="opacity-100 scale-100"
         x-transition:leave="transition ease-in duration-100"
         x-transition:leave-start="opacity-100 scale-100"
         x-transition:leave-end="opacity-0 scale-95">
        <div class="p-4">
            <h3 class="text-sm font-semibold text-indigo-700 mb-3">🔔 Notifications</h3>
            <ul class="space-y-3 text-sm">
                @forelse($notifications as $notif)
                    <li class="flex justify-between items-start">
                        <div>
                            <p class="font-medium text-gray-800">{{ $notif->title }}</p>
                            <p class="text-gray-600 text-xs">{{ $notif->message }}</p>
                            <p class="text-xs text-gray-400">{{ $notif->created_at->diffForHumans() }}</p>
                            <p class="text-xs italic text-gray-500">{{ $notif->getTypeLabel() }}</p>
                        </div>
                        @if ($notif->isUnread())
                            <button wire:click="markAsRead({{ $notif->id }})"
                                    class="text-indigo-600 text-xs hover:underline mt-1">
                                ✔️
                            </button>
                        @endif
                    </li>
                @empty
                    <li class="text-sm text-gray-500">Aucune notification.</li>
                @endforelse
            </ul>
        </div>
    </div>
</div>
