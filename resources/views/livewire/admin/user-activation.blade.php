<div>
    <div>
    <h2 class="text-xl font-bold mb-4">📶 Utilisateurs actifs</h2>

    <input wire:model.debounce.500ms="search" type="text" placeholder="🔍 Rechercher par nom..."
        class="mb-4 px-4 py-2 border rounded w-full" />

    <table class="min-w-full bg-white rounded shadow">
        <thead class="bg-gray-100">
            <tr>
                <th class="px-4 py-2">👤 Nom</th>
                <th class="px-4 py-2">📧 Email</th>
                <th class="px-4 py-2">🕒 Dernière activité</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr class="border-b hover:bg-gray-50 transition">
                <td class="px-4 py-2">{{ $user->name }}</td>
                <td class="px-4 py-2">{{ $user->email }}</td>
                <td class="px-4 py-2">
                    <span class="inline-flex items-center gap-1 px-2 py-1 rounded bg-blue-600 text-white text-sm">
                        🕒 {{ $user->updated_at->diffForHumans() }}
                    </span>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{ $users->links() }}
</div>


</div>
