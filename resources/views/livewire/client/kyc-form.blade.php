<div class="bg-white rounded-lg shadow p-6">
    <form wire:submit.prevent="submit" enctype="multipart/form-data" class="space-y-6">
        <div>
            <label for="identityCard" class="block text-sm font-medium text-gray-700">🪪 Carte d'identité</label>
            <input type="file" wire:model="identityCard" accept=".jpg,.jpeg,.png,.pdf"
                   class="mt-2 block w-full border rounded px-3 py-2">
            @error('identityCard') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
        </div>

        <div>
            <label for="proofOfAddress" class="block text-sm font-medium text-gray-700">📄 Justificatif de domicile</label>
            <input type="file" wire:model="proofOfAddress" accept=".jpg,.jpeg,.png,.pdf"
                   class="mt-2 block w-full border rounded px-3 py-2">
            @error('proofOfAddress') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
        </div>

        <div class="flex justify-end">
            <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700">
                Soumettre
            </button>
        </div>

        @if (session()->has('message'))
            <div class="text-green-600 text-sm mt-4">{{ session('message') }}</div>
        @endif
    </form>
    
</div>
