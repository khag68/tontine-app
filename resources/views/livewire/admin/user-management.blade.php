<div class="space-y-6">

    <h2 class="text-xl font-bold">👥 Gestion des utilisateurs</h2>

    <!-- 🔍 Filtre par statut -->
    <div class="mb-4">
        <label for="statusFilter" class="block font-medium mb-1">Filtrer par statut :</label>
        <select wire:model="statusFilter" id="statusFilter" class="border rounded px-3 py-2 w-64">
            <option value="all">📋 Tous</option>
            <option value="active">🟢 Actifs</option>
            <option value="inactive">🔴 Inactifs</option>
        </select>
    </div>

    <!-- ✅ Message de confirmation -->
    @if(session()->has('message'))
        <div class="bg-green-100 text-green-700 border border-green-300 p-3 rounded">
            {{ session('message') }}
        </div>
    @endif

    <!-- 📊 Tableau utilisateurs -->
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
            @foreach($filteredUsers as $user)
            <tr class="border-b hover:bg-gray-50">
                <td class="px-4 py-2">{{ $user->name }}</td>
                <td class="px-4 py-2">{{ $user->email }}</td>
                <td class="px-4 py-2">
                    <span class="flex items-center gap-2 px-2 py-1 rounded text-white {{ $user->is_active ? 'bg-green-600' : 'bg-red-600' }}">
                        {!! $user->is_active ? '&#9989;' : '&#10060;' !!}
                        {{ $user->is_active ? 'Actif' : 'Inactif' }}
                    </span>
                </td>
                <td class="px-4 py-2">
                    <button wire:click="toggleActivation({{ $user->id }})"
                        wire:loading.attr="disabled"
                        class="bg-indigo-500 text-white px-4 py-2 rounded hover:bg-indigo-600 transition">
                        {{ $user->is_active ? 'Désactiver' : 'Activer' }}
                    </button>

                    <span wire:loading wire:target="toggleActivation" class="text-sm text-gray-500 ml-2">
                        ⏳ Mise à jour...
                    </span>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

<!-- 🔁 Pagination -->
<div class="mt-6">
    {{ $filteredUsers->links() }}
</div>

    <!-- 🔁 Aucun utilisateur filtré -->
    @if($filteredUsers->isEmpty())
        <p class="text-gray-500 mt-4">Aucun utilisateur trouvé pour ce filtre.</p>
    @endif
</div>
