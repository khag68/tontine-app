

<x-layouts.app-layout>
<div class="max-w-4xl mx-auto py-10 px-4">
    <h2 class="text-xl font-bold text-indigo-700 mb-6">📤 Mes retraits</h2>

    @livewire('client.withdrawal-form') {{-- Formulaire de demande de retrait --}}

    <div class="mt-10">
        @livewire('client.withdrawal-history') {{-- Liste des retraits avec statut --}}
    </div>
</div>
</x-layouts.app-layout>


