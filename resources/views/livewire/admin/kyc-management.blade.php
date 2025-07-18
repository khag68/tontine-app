<div>
  <div x-data="{ showModal: false }">
    <h2 class="text-xl font-bold mb-4">📁 Gestion des demandes KYC</h2>

    <!-- Filtre -->
    <div class="mb-4">
        <label for="statusFilter">Filtrer par statut :</label>
        <select wire:model="statusFilter" id="statusFilter" class="border rounded px-3 py-2">
            <option value="pending">⏳ En attente</option>
            <option value="approved">✅ Approuvé</option>
            <option value="rejected">❌ Rejeté</option>
        </select>
    </div>

    <!-- Tableau -->
    <table class="min-w-full bg-white rounded shadow">
        <thead class="bg-gray-100">
            <tr>
                <th class="px-4 py-2">👤 Utilisateur</th>
                <th class="px-4 py-2">📄 Type</th>
                <th class="px-4 py-2">📌 Statut</th>
                <th class="px-4 py-2">🔍 Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($documents as $doc)
            <tr class="border-b hover:bg-gray-50 transition">
                <td class="px-4 py-2">{{ $doc->user->name }}</td>
                <td class="px-4 py-2">{{ $doc->document_type }}</td>
                <td class="px-4 py-2">
                    <span class="inline-flex items-center gap-1 px-2 py-1 rounded text-white text-sm
                        {{ $doc->status === 'pending' ? 'bg-yellow-500' : ($doc->status === 'approved' ? 'bg-green-600' : 'bg-red-600') }}">
                        {{ $doc->status === 'pending' ? '⏳ En attente' : ($doc->status === 'approved' ? '✅ Approuvé' : '❌ Rejeté') }}
                    </span>
                </td>
                <td class="px-4 py-2">
                    <button wire:click="selectDocument({{ $doc->id }})" @click="showModal = true"
                        class="bg-indigo-500 text-white px-3 py-1 rounded hover:bg-indigo-600 transition">
                        Voir
                    </button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{ $documents->links() }}

    <!-- 🧾 Modale de validation -->
    <div x-show="showModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
        <div class="bg-white p-6 rounded shadow-lg w-full max-w-lg">
            @if($selectedDocument)
            <h3 class="text-lg font-bold mb-2">📄 Document KYC</h3>
            <p><strong>Utilisateur :</strong> {{ $selectedDocument->user->name }}</p>
            <p><strong>Type :</strong> {{ $selectedDocument->document_type }}</p>
            <p><strong>Statut :</strong> {{ ucfirst($selectedDocument->status) }}</p>

            <textarea wire:model.defer="adminNotes" class="w-full border rounded p-2 mt-2" placeholder="Notes administratives..."></textarea>

            <div class="flex justify-end gap-4 mt-4">
                <button wire:click="approve" @click="showModal = false"
                    class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
                    ✅ Approuver
                </button>
                <button wire:click="reject" @click="showModal = false"
                    class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700">
                    ❌ Rejeter
                </button>
            </div>
            @endif
        </div>
    </div>
</div>

</div>
