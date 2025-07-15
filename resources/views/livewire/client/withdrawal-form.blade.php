<div class="bg-white rounded-lg shadow p-6">
    <h3 class="text-lg font-bold text-indigo-700 mb-4">📤 Effectuer un retrait</h3>

    {{-- Feedback utilisateur --}}
    @if (session()->has('error'))
        <div class="text-red-600 text-sm mb-4">{{ session('error') }}</div>
    @endif

    @if (session()->has('message'))
        <div class="text-green-600 text-sm mb-4">{{ session('message') }}</div>
    @endif

    {{-- Formulaire --}}
    <form wire:submit.prevent="submit" class="space-y-4">
        <div>
            <label for="amount" class="text-sm font-medium text-gray-700">Montant</label>
            <input type="number" wire:model.lazy="amount" id="amount"
                   class="mt-1 block w-full border rounded px-3 py-2"
                   placeholder="Minimum 1000 FCFA">
            @error('amount') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
        </div>

        <div>
            <label for="reason" class="text-sm font-medium text-gray-700">Motif du retrait</label>
            <textarea wire:model.lazy="reason" id="reason"
                      class="mt-1 block w-full border rounded px-3 py-2"
                      rows="3" placeholder="Ex: urgence médicale, épargne..."></textarea>
            @error('reason') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
        </div>

        <div class="flex justify-end">
            <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700">
                📤 Soumettre la demande
            </button>
        </div>
    </form>

    <hr class="my-6">

    {{-- Historique des retraits --}}
    <h4 class="text-md font-semibold text-gray-800 mb-2">📃 Historique de mes retraits</h4>

    @if ($withdrawals->count())
        <table class="w-full table-auto text-sm">
            <thead>
                <tr class="text-left text-gray-500 border-b">
                    <th class="pb-2">Montant</th>
                    <th class="pb-2">Motif</th>
                    <th class="pb-2">Statut</th>
                    <th class="pb-2">Date</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($withdrawals as $withdrawal)
                    <tr class="border-b hover:bg-gray-50">
                        <td class="py-2 font-semibold">{{ number_format($withdrawal->amount) }} FCFA</td>
                        <td class="py-2">{{ $withdrawal->reason }}</td>
                        <td class="py-2">
                            @switch($withdrawal->status)
                                @case('approved')
                                    <span class="text-green-600 font-medium">✔️ Approuvé</span>
                                    @break
                                @case('pending')
                                    <span class="text-yellow-600 font-medium">⏳ En attente</span>
                                    @break
                                @case('rejected')
                                    <span class="text-red-600 font-medium">❌ Rejeté</span>
                                    @break
                                @default
                                    <span class="text-gray-500">—</span>
                            @endswitch
                        </td>
                        <td class="py-2 text-gray-500">{{ $withdrawal->created_at->format('d/m/Y H:i') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="mt-4">
            {{ $withdrawals->links() }}
        </div>
    @else
        <p class="text-gray-500 text-sm mt-2">Aucune demande enregistrée pour le moment.</p>
    @endif
</div>
