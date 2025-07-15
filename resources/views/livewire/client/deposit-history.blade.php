<div class="bg-white shadow rounded-lg p-6">
    <h3 class="text-lg font-bold text-indigo-700 mb-4">💰 Historique des dépôts</h3>

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
            @forelse ($deposits as $deposit)
                <tr class="border-b hover:bg-gray-50">
                    <td class="py-2 font-semibold">{{ number_format($deposit->amount) }} FCFA</td>
                    <td class="py-2">{{ $deposit->description ?? '—' }}</td>
                    <td class="py-2">
                        @switch($deposit->status)
                            @case('completed')
                                <span class="text-green-600 font-medium">✔️ Validé</span>
                                @break
                            @case('pending')
                                <span class="text-yellow-600 font-medium">⏳ En attente</span>
                                @break
                            @case('rejected')
                                <span class="text-red-600 font-medium">❌ Rejeté</span>
                                @break
                            @default
                                <span class="text-gray-600">—</span>
                        @endswitch
                    </td>
                    <td class="py-2 text-gray-500">{{ $deposit->created_at->format('d/m/Y H:i') }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center text-gray-500 py-4">Aucun dépôt enregistré.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div class="mt-4">
        {{ $deposits->links() }}
    </div>
</div>
