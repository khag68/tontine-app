<div>
    <div>
    <h2 class="text-xl font-bold mb-4">📚 Historique des actions admin</h2>

    <input wire:model.debounce.500ms="search" type="text" placeholder="🔍 Rechercher dans les notes..."
        class="mb-4 px-4 py-2 border rounded w-full" />

    <table class="min-w-full bg-white rounded shadow">
        <thead class="bg-gray-100">
            <tr>
                <th class="px-4 py-2">👤 Admin</th>
                <th class="px-4 py-2">⚙️ Type</th>
                <th class="px-4 py-2">🎯 Cible</th>
                <th class="px-4 py-2">📝 Notes</th>
                <th class="px-4 py-2">📅 Date</th>
            </tr>
        </thead>
        <tbody>
            @foreach($actions as $action)
            <tr class="border-b hover:bg-gray-50 transition">
                <td class="px-4 py-2">{{ $action->admin->name ?? '—' }}</td>
                <td class="px-4 py-2">
                    <span class="inline-flex items-center gap-1 px-2 py-1 rounded bg-indigo-600 text-white text-sm">
                        ⚙️ {{ $action->getActionTypeLabel() }}
                    </span>
                </td>
                <td class="px-4 py-2">{{ $action->target_id }}</td>
                <td class="px-4 py-2">{{ $action->notes }}</td>
                <td class="px-4 py-2">{{ $action->created_at->format('d/m/Y H:i') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{ $actions->links() }}
</div>


</div>
