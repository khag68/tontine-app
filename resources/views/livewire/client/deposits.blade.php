
<x-layouts.app-layout>
<div class="max-w-4xl mx-auto py-10 px-4">
    <h2 class="text-xl font-bold text-indigo-700 mb-6">💰 Mes dépôts</h2>

    @livewire('client.deposit-form') {{-- Formulaire de dépôt --}}

    <div class="mt-10">
        @livewire('client.deposit-history') {{-- Historique des dépôts paginé --}}
    </div>

</div>
</x-layouts.app-layout>


