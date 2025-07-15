<div>
    <h2 class="text-xl font-bold mb-4">Gestion des documents KYC</h2>

    <!-- Filtre -->
    <div class="mb-4">
        <select wire:model="filter" class="border rounded px-3 py-2">
            <option value="pending">⏳ En attente</option>
            <option value="approved">✅ Approuvé</option>
            <option value="rejected">❌ Rejeté</option>
        </select>
    </div>

    <!-- Liste des documents -->
    <table class="min-w-full bg-white rounded shadow">
        <thead>
            <tr class="bg-gray-100 text-gray-700">
                <th class="px-4 py-2">Utilisateur</th>
                <th class="px-4 py-2">Type</th>
                <th class="px-4 py-2">Statut</th>
                <th class="px-4 py-2">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($kycDocuments as $doc)
            <tr class="border-b">
                <td class="px-4 py-2">{{ $doc->user->name }}</td>
                <td class="px-4 py-2">{{ $doc->document_type }}</td>
                <td class="px-4 py-2">{{ ucfirst($doc->status) }}</td>
                <td class="px-4 py-2">
                    <button wire:click="selectDocument({{ $doc->id }})" @click="openModal = true"
                        class="bg-indigo-500 text-white px-3 py-1 rounded hover:bg-indigo-600 transition">
                        Voir
                    </button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Pagination -->
    <div class="mt-4">
        {{ $kycDocuments->links() }}
    </div>

    <!-- 🪟 Modale -->
    <div x-data="{ openModal: false }" x-show="openModal" class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50">
        <div class="bg-white rounded-lg p-6 w-full max-w-lg">
            <h3 class="text-xl font-bold mb-2">Document KYC</h3>

            @if($selectedDocument)
            <p><strong>Utilisateur :</strong> {{ $selectedDocument->user->name }}</p>
            <p><strong>Type :</strong> {{ $selectedDocument->document_type }}</p>
            <p><strong>Status :</strong> {{ $selectedDocument->status }}</p>
            <p class="mt-4"><strong>Note admin :</strong></p>
            <textarea wire:model.defer="adminNotes" class="w-full border rounded p-2 mt-2"></textarea>

            <div class="flex justify-end mt-4 space-x-3">
                <button wire:click="approveDocument"
                    @click="openModal = false"
                    class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
                    ✅ Approuver
                </button>

                <button wire:click="rejectDocument"
                    @click="openModal = false"
                    class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700">
                    ❌ Rejeter
                </button>
            </div>
            @endif
        </div>
    </div>
</div>
