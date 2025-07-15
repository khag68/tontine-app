<!-- resources/views/admin/kyc.blade.php -->
<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h2 class="text-2xl font-bold text-gray-900 mb-4">Validation des documents KYC</h2>

                    <!-- Filtres -->
                    <div class="mb-6">
                        <div class="flex space-x-4">
                            <button wire:click="$set('filter', 'pending')"
                                    class="px-4 py-2 rounded-lg {{ $filter === 'pending' ? 'bg-blue-500 text-white' : 'bg-gray-200 text-gray-700' }}">
                                En attente
                            </button>
                            <button wire:click="$set('filter', 'approved')"
                                    class="px-4 py-2 rounded-lg {{ $filter === 'approved' ? 'bg-green-500 text-white' : 'bg-gray-200 text-gray-700' }}">
                                Approuvés
                            </button>
                            <button wire:click="$set('filter', 'rejected')"
                                    class="px-4 py-2 rounded-lg {{ $filter === 'rejected' ? 'bg-red-500 text-white' : 'bg-gray-200 text-gray-700' }}">
                                Rejetés
                            </button>
                        </div>
                    </div>

                    @livewire('admin.kyc-management')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
