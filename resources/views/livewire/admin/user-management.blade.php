<div>
   <div x-data="{ confirmDelete: false, userToDelete: null }">
    <h2 class="text-xl font-bold mb-4">🔐 Gestion des comptes utilisateurs</h2>

    <!-- Filtre -->
    <div class="mb-4">
        <label for="statusFilter">Filtrer par statut :</label>
        <select wire:model="statusFilter" id="statusFilter" class="border rounded px-3 py-2">
            <option value="all">📋 Tous</option>
            <option value="active">🟢 Actifs</option>
            <option value="inactive">🔴 Inactifs</option>
        </select>
    </div>

    <!-- Tableau -->
    <table class="min-w-full bg-white rounded shadow">
        <thead class="bg-gray-100">
            <tr>
                <th class="px-4 py-2">👤 Nom</th>
                <th class="px-4 py-2">📧 Email</th>
                <th class="px-4 py-2">📌 Statut</th>
                <th class="px-4 py-2">⚙️ Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($filteredUsers as $user)
            <tr class="border-b hover:bg-gray-50 transition">
                <td class="px-4 py-2">{{ $user->name }}</td>
                <td class="px-4 py-2">{{ $user->email }}</td>
                <td class="px-4 py-2">
                    <span class="inline-flex items-center gap-1 px-2 py-1 rounded text-white text-sm
                        {{ $user->is_active ? 'bg-green-600' : 'bg-red-600' }}">
                        {!! $user->is_active ? '&#9989;' : '&#10060;' !!}
                        {{ $user->is_active ? 'Actif' : 'Inactif' }}
                    </span>
                </td>
                <td class="px-4 py-2 space-x-2">
                    <button wire:click="toggleActivation({{ $user->id }})"
                        class="bg-indigo-500 text-white px-3 py-1 rounded hover:bg-indigo-600 transition">
                        🔄 {{ $user->is_active ? 'Désactiver' : 'Activer' }}
                    </button>

                    <button @click="confirmDelete = true; userToDelete = {{ $user->id }}"
                        class="bg-red-600 text-white px-3 py-1 rounded hover:bg-red-700 transition">
                        🗑️ Supprimer
                    </button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{ $filteredUsers->links() }}

    <!-- 🧨 Modale de confirmation -->
    <div x-show="confirmDelete" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
        <div class="bg-white p-6 rounded shadow-lg w-full max-w-md">
            <h3 class="text-lg font-bold mb-4">Confirmer la suppression</h3>
            <p>Êtes-vous sûr de vouloir supprimer cet utilisateur ? Cette action est irréversible.</p>
            <div class="mt-4 flex justify-end gap-4">
                <button @click="confirmDelete = false" class="px-4 py-2 bg-gray-300 rounded">Annuler</button>
                <button wire:click="deleteUser(userToDelete)" @click="confirmDelete = false"
                    class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700">
                    Confirmer
                </button>
            </div>
        </div>
    </div>
</div>

</div>
