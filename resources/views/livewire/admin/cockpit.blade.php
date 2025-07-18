<x-admin-layout>
    <div x-data="{ tab: 'dashboard' }" class="p-6 space-y-8 bg-gray-50 min-h-screen">
        <!-- Style pour x-cloak -->
        <style>[x-cloak] { display: none !important; }</style>

        <!-- En-tête avec titre -->
        <div class="flex flex-col space-y-2">
            <h1 class="text-3xl font-bold text-gray-800">Administration</h1>
            <p class="text-gray-600">Tableau de bord de gestion et de monitoring</p>
        </div>

        <!-- Barre d'onglets améliorée -->
        <div class="flex flex-wrap gap-2 border-b border-gray-200 pb-2">
            <template x-for="item in ['dashboard', 'kyc', 'activation', 'users', 'actions']" :key="item">
                <button @click="tab = item"
                    :class="{
                        'border-indigo-500 text-indigo-600': tab === item,
                        'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300': tab !== item
                    }"
                    class="px-4 py-2 text-sm font-medium border-b-2 focus:outline-none transition-colors duration-200 flex items-center space-x-2">
                    <template x-if="item === 'dashboard'">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"/>
                        </svg>
                    </template>
                    <template x-if="item === 'kyc'">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                        </svg>
                    </template>
                    <template x-if="item === 'activation'">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                        </svg>
                    </template>
                    <template x-if="item === 'users'">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                        </svg>
                    </template>
                    <template x-if="item === 'actions'">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                        </svg>
                    </template>
                    <span x-text="item.charAt(0).toUpperCase() + item.slice(1)"></span>
                </button>
            </template>
        </div>

        <!-- Contenu dynamique avec card et ombres -->
        <div class="relative min-h-[60vh]">
            <div x-show="tab === 'dashboard'" x-transition:enter="transition ease-out duration-300"
                 x-transition:enter-start="opacity-0 translate-y-2"
                 x-transition:enter-end="opacity-100 translate-y-0"
                 x-transition:leave="transition ease-in duration-200"
                 x-transition:leave-start="opacity-100 translate-y-0"
                 x-transition:leave-end="opacity-0 translate-y-2"
                 x-cloak class="absolute w-full space-y-6">
                <div class="bg-white rounded-lg shadow-sm p-6 border border-gray-100">
                    <livewire:admin.dashboard />
                </div>
            </div>

            <div x-show="tab === 'kyc'" x-transition x-cloak class="absolute w-full">
                <div class="bg-white rounded-lg shadow-sm p-6 border border-gray-100">
                    <livewire:admin.kyc-management />
                </div>
            </div>

            <div x-show="tab === 'activation'" x-transition x-cloak class="absolute w-full">
                <div class="bg-white rounded-lg shadow-sm p-6 border border-gray-100">
                    <livewire:admin.user-activation />
                </div>
            </div>

            <div x-show="tab === 'users'" x-transition x-cloak class="absolute w-full">
                <div class="bg-white rounded-lg shadow-sm p-6 border border-gray-100">
                    <livewire:admin.user-management />
                </div>
            </div>

            <div x-show="tab === 'actions'" x-transition x-cloak class="absolute w-full">
                <div class="bg-white rounded-lg shadow-sm p-6 border border-gray-100">
                    <livewire:admin.admin-action-history />
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
