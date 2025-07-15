<div>
    <h2 class="text-xl font-bold mb-4">🔒 Gestion des comptes utilisateurs</h2>

    <table class="min-w-full bg-white rounded shadow">
        <thead class="bg-gray-100 text-gray-700">
            <tr>
                <th class="px-4 py-2">Nom</th>
                <th class="px-4 py-2">Email</th>
                <th class="px-4 py-2">Statut</th>
                <th class="px-4 py-2">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr class="border-b">
                <td class="px-4 py-2">{{ $user->name }}</td>
                <td class="px-4 py-2">{{ $user->email }}</td>
                <td class="px-4 py-2">
                    <span class="px-2 py-1 rounded text-white {{ $user->is_active ? 'bg-green-600' : 'bg-red-600' }}">
                        {{ $user->is_active ? 'Actif' : 'Inactif' }}
                    </span>
                </td>
                <td class="px-4 py-2">
                    <button wire:click="toggleStatus({{ $user->id }})"
                        class="bg-indigo-500 text-white px-3 py-1 rounded hover:bg-indigo-600 transition">
                        {{ $user->is_active ? 'Désactiver' : 'Activer' }}
                    </button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
