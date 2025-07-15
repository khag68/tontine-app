<div class="bg-white rounded-lg shadow p-6">
    <h3 class="text-lg font-bold text-indigo-700 mb-4">💰 Effectuer un dépôt</h3>

    @if (session()->has('message'))
        <div class="text-green-600 text-sm mb-4">{{ session('message') }}</div>
    @endif

    <form wire:submit.prevent="submit" class="space-y-4">
        <div>
            <label for="amount" class="block text-sm font-medium text-gray-700">Montant</label>
            <input type="number" wire:model.lazy="amount" id="amount"
                   class="mt-1 block w-full border rounded px-3 py-2"
                   placeholder="Minimum 1000 FCFA">
            @error('amount') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
        </div>

        <div>
            <label for="description" class="block text-sm font-medium text-gray-700">Motif (optionnel)</label>
            <textarea wire:model.lazy="description" id="description"
                      class="mt-1 block w-full border rounded px-3 py-2"
                      rows="3" placeholder="Ex : cotisation mensuelle..."></textarea>
            @error('description') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
        </div>

        <div class="flex justify-end">
            <button type="submit"
                    class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700">
                💳 Valider le dépôt
            </button>
        </div>
    </form>

    <hr class="my-6">

    <h4 class="text-md font-semibold text-gray-800 mb-2">📜 Historique des dépôts</h4>

    @if ($deposits->count())
        <table class="w-full table-auto text-sm">
            <thead>
                <tr class="text-left text-gray-500 border-b">
                    <th class="pb-2">Montant</th>
                    <th class="pb-2">Description</th>
                    <th class="pb-2">Statut</th>
                    <th class="pb-2">Date</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($deposits as $deposit)
                    <tr class="border-b">
                        <td class="py-2 font-semibold">{{ number_format($deposit->amount) }} FCFA</td>
                        <td class="py-2">{{ $deposit->description ?? '—' }}</td>
                        <td class="py-2">
                            @if ($deposit->status === 'completed')
                                <span class="text-green-600 font-medium">✔️ Validé</span>
                            @else
                                <span class="text-yellow-600 font-medium">⏳ En attente</span>
                            @endif
                        </td>
                        <td class="py-2 text-gray-500">{{ $deposit->created_at->format('d/m/Y H:i') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="mt-4">{{ $deposits->links() }}</div>
    @else
        <p class="text-gray-500 text-sm mt-2">Aucun dépôt enregistré.</p>
    @endif
</div>
