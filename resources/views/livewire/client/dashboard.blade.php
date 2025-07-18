<x-client-layout>
    <div class="min-h-screen bg-gray-50 flex">
        <!-- Sidebar élégante -->
        <div class="hidden lg:flex lg:w-72 xl:w-80 flex-col border-r border-gray-100 bg-white/80 backdrop-blur-sm">
            <!-- Logo avec effet de profondeur -->
            <div class="flex items-center justify-center h-24 px-6">
                <div class="relative">
                    <div class="absolute -inset-2 bg-gradient-to-r from-indigo-500 to-purple-600 rounded-lg blur opacity-75"></div>
                    <div class="relative bg-white rounded-lg px-4 py-2 shadow-sm">
                        <span class="text-xl font-bold bg-gradient-to-r from-indigo-600 to-purple-600 bg-clip-text text-transparent">Tontine+</span>
                    </div>
                </div>
            </div>

            <!-- Navigation minimaliste -->
            <nav class="flex-1 px-4 space-y-1">
                <a href="{{ route('client.dashboard') }}" class="flex items-center px-4 py-3 rounded-xl text-indigo-600 font-medium bg-indigo-50/50 group transition-all duration-300">
                    <div class="w-8 h-8 flex items-center justify-center bg-white rounded-lg shadow-xs mr-3 group-hover:bg-indigo-100 transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                        </svg>
                    </div>
                    Tableau de bord
                </a>

                <a href="{{ route('client.deposits') }}" class="flex items-center px-4 py-3 rounded-xl text-gray-600 hover:text-indigo-600 font-medium hover:bg-indigo-50/30 group transition-all duration-300">
                    <div class="w-8 h-8 flex items-center justify-center bg-white rounded-lg shadow-xs mr-3 group-hover:bg-indigo-100 transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500 group-hover:text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    Mes dépôts
                </a>

                <a href="{{ route('client.withdrawals') }}" class="flex items-center px-4 py-3 rounded-xl text-gray-600 hover:text-indigo-600 font-medium hover:bg-indigo-50/30 group transition-all duration-300">
                    <div class="w-8 h-8 flex items-center justify-center bg-white rounded-lg shadow-xs mr-3 group-hover:bg-indigo-100 transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500 group-hover:text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    Mes retraits
                </a>

                <a href="{{ route('client.kyc') }}" class="flex items-center px-4 py-3 rounded-xl text-gray-600 hover:text-indigo-600 font-medium hover:bg-indigo-50/30 group transition-all duration-300">
                    <div class="w-8 h-8 flex items-center justify-center bg-white rounded-lg shadow-xs mr-3 group-hover:bg-indigo-100 transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500 group-hover:text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                        </svg>
                    </div>
                    Vérification KYC
                </a>

                <a href="{{ route('profile') }}" class="flex items-center px-4 py-3 rounded-xl text-gray-600 hover:text-indigo-600 font-medium hover:bg-indigo-50/30 group transition-all duration-300">
                    <div class="w-8 h-8 flex items-center justify-center bg-white rounded-lg shadow-xs mr-3 group-hover:bg-indigo-100 transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500 group-hover:text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                    </div>
                    Mon profil
                </a>
            </nav>

            <!-- Profil utilisateur avec effet de profondeur -->
            <div class="p-4 border-t border-gray-100">
                <div class="relative group">
                    <div class="absolute -inset-1 bg-gradient-to-r from-indigo-400 to-purple-500 rounded-xl blur opacity-0 group-hover:opacity-30 transition-opacity duration-300"></div>
                    <div class="relative bg-white rounded-xl p-3 flex items-center">
                        <div class="flex-shrink-0">
                            <img class="h-10 w-10 rounded-full object-cover" src="https://ui-avatars.com/api/?name={{ urlencode(auth()->user()->name) }}&background=indigo&color=white" alt="Profile">
                        </div>
                        <div class="ml-3 overflow-hidden">
                            <p class="text-sm font-medium text-gray-900 truncate">{{ auth()->user()->name }}</p>
                            <p class="text-xs text-gray-500 truncate">{{ auth()->user()->email }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Contenu principal -->
        <div class="flex-1 flex flex-col overflow-hidden">
            <!-- Header mobile -->
            <header class="lg:hidden bg-white/80 backdrop-blur-sm border-b border-gray-100">
                <div class="flex items-center justify-between px-4 py-3">
                    <button @click="mobileMenuOpen = !mobileMenuOpen" class="text-gray-500 focus:outline-none">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                    </button>
                    <div class="text-lg font-bold bg-gradient-to-r from-indigo-600 to-purple-600 bg-clip-text text-transparent">Tontine+</div>
                    <div class="w-6"></div>
                </div>
            </header>

            <!-- Menu mobile (slide-in) -->
            <div x-show="mobileMenuOpen" x-transition:enter="transition ease-out duration-200"
                 x-transition:enter-start="opacity-0 -translate-x-full" x-transition:enter-end="opacity-100 translate-x-0"
                 x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100 translate-x-0"
                 x-transition:leave-end="opacity-0 -translate-x-full"
                 class="fixed inset-y-0 left-0 z-50 w-72 bg-white shadow-lg lg:hidden" style="display: none;">
                <!-- Contenu du menu mobile -->
            </div>

            <!-- Contenu -->
            <main class="flex-1 overflow-y-auto p-4 sm:p-6">
                <!-- Bannière d'accueil avec effet de gradient animé -->
                <div class="relative overflow-hidden rounded-2xl bg-gradient-to-r from-indigo-500 to-purple-600 p-6 text-white mb-8 shadow-lg">
                    <div class="absolute inset-0 bg-gradient-to-r from-indigo-400/30 to-purple-500/30 animate-gradient-shift"></div>
                    <div class="relative z-10">
                        <div class="flex flex-col md:flex-row md:items-center md:justify-between">
                            <div class="mb-4 md:mb-0">
                                <h1 class="text-2xl font-bold mb-1">Bonjour, {{ auth()->user()->name }}</h1>
                                <p class="text-indigo-100/90">Voici votre tableau de bord financier</p>
                            </div>
                            <div class="flex items-center space-x-6">
                                <div class="text-center">
                                    <p class="text-indigo-100/90 text-sm">Solde actuel</p>
                                    <p class="text-2xl font-bold">{{ number_format(auth()->user()->balance, 0, ',', ' ') }} FCFA</p>
                                </div>
                                <div class="hidden md:block h-10 w-px bg-indigo-400/50"></div>
                                <div class="text-center">
                                    <p class="text-indigo-100/90 text-sm">Statut KYC</p>
                                    <span class="px-3 py-1 rounded-full text-xs font-medium
                                        @if(auth()->user()->kyc_status === 'verified') bg-white/20 text-white backdrop-blur-sm
                                        @elseif(auth()->user()->kyc_status === 'pending') bg-amber-100 text-amber-800
                                        @else bg-rose-100 text-rose-800 @endif">
                                        {{ ucfirst(auth()->user()->kyc_status ?? 'non vérifié') }}
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @livewire('client.notifications')
                @livewire('client.NotificationBell')
                <!-- Actions rapides - Grille moderne -->
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5 mb-8">
                    <a href="{{ route('client.deposits') }}" class="group relative overflow-hidden bg-white rounded-xl shadow-xs hover:shadow-md transition-all duration-300 border border-gray-100 hover:border-indigo-100/50">
                        <div class="absolute inset-0 bg-gradient-to-br from-white to-indigo-50 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                        <div class="relative z-10 p-5">
                            <div class="flex items-center">
                                <div class="bg-green-50 p-3 rounded-lg shadow-xs">
                                    <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                    </svg>
                                </div>
                                <div class="ml-4">
                                    <h3 class="font-semibold text-gray-900 group-hover:text-indigo-600 transition-colors">Effectuer un dépôt</h3>
                                    <p class="text-gray-500 text-sm">Ajouter de l'argent à votre compte</p>
                                </div>
                            </div>
                        </div>
                    </a>

                    <a href="{{ route('client.withdrawals') }}" class="group relative overflow-hidden bg-white rounded-xl shadow-xs hover:shadow-md transition-all duration-300 border border-gray-100 hover:border-indigo-100/50">
                        <div class="absolute inset-0 bg-gradient-to-br from-white to-blue-50 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                        <div class="relative z-10 p-5">
                            <div class="flex items-center">
                                <div class="bg-blue-50 p-3 rounded-lg shadow-xs">
                                    <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                </div>
                                <div class="ml-4">
                                    <h3 class="font-semibold text-gray-900 group-hover:text-indigo-600 transition-colors">Demander un retrait</h3>
                                    <p class="text-gray-500 text-sm">Retirer de l'argent de votre compte</p>
                                </div>
                            </div>
                        </div>
                    </a>

                    <a href="{{ route('client.kyc') }}" class="group relative overflow-hidden bg-white rounded-xl shadow-xs hover:shadow-md transition-all duration-300 border border-gray-100 hover:border-indigo-100/50">
                        <div class="absolute inset-0 bg-gradient-to-br from-white to-purple-50 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                        <div class="relative z-10 p-5">
                            <div class="flex items-center">
                                <div class="bg-purple-50 p-3 rounded-lg shadow-xs">
                                    <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                </div>
                                <div class="ml-4">
                                    <h3 class="font-semibold text-gray-900 group-hover:text-indigo-600 transition-colors">Vérification KYC</h3>
                                    <p class="text-gray-500 text-sm">Compléter votre vérification</p>
                                </div>
                            </div>
                        </div>
                    </a>

                    <a href="{{ route('profile') }}" class="group relative overflow-hidden bg-white rounded-xl shadow-xs hover:shadow-md transition-all duration-300 border border-gray-100 hover:border-indigo-100/50">
                        <div class="absolute inset-0 bg-gradient-to-br from-white to-indigo-50 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                        <div class="relative z-10 p-5">
                            <div class="flex items-center">
                                <div class="bg-indigo-50 p-3 rounded-lg shadow-xs">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                    </svg>
                                </div>
                                <div class="ml-4">
                                    <h3 class="font-semibold text-gray-900 group-hover:text-indigo-600 transition-colors">Mon profil</h3>
                                    <p class="text-gray-500 text-sm">Gérer vos informations</p>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

                <!-- Statistiques - Design épuré -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-5 mb-8">
                    <!-- Carte Solde -->
                    <div class="bg-white rounded-xl shadow-xs border border-gray-100 overflow-hidden group hover:shadow-md transition-all duration-300">
                        <div class="p-5">
                            <div class="flex justify-between items-start">
                                <div>
                                    <p class="text-sm font-medium text-gray-500">Solde actuel</p>
                                    <p class="text-2xl font-bold text-gray-900 mt-1">{{ number_format(auth()->user()->balance, 0, ',', ' ') }} FCFA</p>
                                </div>
                                <div class="p-2 bg-indigo-50 rounded-lg group-hover:bg-indigo-100 transition-colors">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </div>
                            </div>
                            <div class="mt-4 flex items-center text-sm text-green-600">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
                                </svg>
                                +5% depuis hier
                            </div>
                        </div>
                    </div>

                    <!-- Carte Statut KYC -->
                    <div class="bg-white rounded-xl shadow-xs border border-gray-100 overflow-hidden group hover:shadow-md transition-all duration-300">
                        <div class="p-5">
                            <div class="flex justify-between items-start">
                                <div>
                                    <p class="text-sm font-medium text-gray-500">Statut KYC</p>
                                    <p class="text-lg font-semibold mt-1 capitalize @class([
                                        'text-green-600' => auth()->user()->kyc_status === 'verified',
                                        'text-amber-600' => auth()->user()->kyc_status === 'pending',
                                        'text-rose-600' => auth()->user()->kyc_status === 'rejected',
                                        'text-gray-600' => !auth()->user()->kyc_status,
                                    ])">
                                        {{ auth()->user()->kyc_status ?? 'non vérifié' }}
                                    </p>
                                </div>
                                <div class="p-2 rounded-lg @class([
                                    'bg-green-50 group-hover:bg-green-100' => auth()->user()->kyc_status === 'verified',
                                    'bg-amber-50 group-hover:bg-amber-100' => auth()->user()->kyc_status === 'pending',
                                    'bg-rose-50 group-hover:bg-rose-100' => auth()->user()->kyc_status === 'rejected',
                                    'bg-gray-50 group-hover:bg-gray-100' => !auth()->user()->kyc_status,
                                ]) transition-colors">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 @class([
                                        'text-green-600' => auth()->user()->kyc_status === 'verified',
                                        'text-amber-600' => auth()->user()->kyc_status === 'pending',
                                        'text-rose-600' => auth()->user()->kyc_status === 'rejected',
                                        'text-gray-600' => !auth()->user()->kyc_status,
                                    ])" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                                    </svg>
                                </div>
                            </div>
                            <div class="mt-4">
                                @if(auth()->user()->kyc_status === 'verified')
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                        Complet
                                    </span>
                                @else
                                    <a href="{{ route('client.kyc') }}" class="text-sm text-indigo-600 hover:text-indigo-800 transition-colors flex items-center">
                                        Compléter maintenant
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                                        </svg>
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>

                    <!-- Carte Total Dépôts -->
                    <div class="bg-white rounded-xl shadow-xs border border-gray-100 overflow-hidden group hover:shadow-md transition-all duration-300">
                        <div class="p-5">
                            <div class="flex justify-between items-start">
                                <div>
                                    <p class="text-sm font-medium text-gray-500">Total cotisé</p>
                                    <p class="text-xl font-bold text-gray-900 mt-1">{{ number_format(auth()->user()->deposits()->sum('amount'), 0, ',', ' ') }} FCFA</p>
                                </div>
                                <div class="p-2 bg-purple-50 rounded-lg group-hover:bg-purple-100 transition-colors">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-purple-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </div>
                            </div>
                            <div class="mt-4">
                                <div class="w-full bg-gray-200 rounded-full h-1.5">
                                    <div class="bg-gradient-to-r from-indigo-500 to-purple-600 h-1.5 rounded-full" style="width: 75%"></div>
                                </div>
                                <p class="text-xs text-gray-500 mt-1.5">75% de votre objectif mensuel</p>
                            </div>
                        </div>
                    </div>

                    <!-- Carte Dernier Dépôt -->
                    <div class="bg-white rounded-xl shadow-xs border border-gray-100 overflow-hidden group hover:shadow-md transition-all duration-300">
                        <div class="p-5">
                            <div class="flex justify-between items-start">
                                <div>
                                    <p class="text-sm font-medium text-gray-500">Dernier dépôt</p>
                                    <p class="text-lg font-medium text-gray-900 mt-1">
                                        @if($lastDeposit = auth()->user()->deposits()->latest()->first())
                                            {{ number_format($lastDeposit->amount, 0, ',', ' ') }} FCFA
                                        @else
                                            Aucun dépôt
                                        @endif
                                    </p>
                                    <p class="text-xs text-gray-500 mt-1">
                                        {{ optional($lastDeposit)->created_at?->format('d M Y à H:i') ?? '-' }}
                                    </p>
                                </div>
                                <div class="p-2 bg-blue-50 rounded-lg group-hover:bg-blue-100 transition-colors">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4" />
                                    </svg>
                                </div>
                            </div>
                            <div class="mt-4">
                                <a href="{{ route('client.deposits') }}" class="inline-flex items-center text-sm text-indigo-600 hover:text-indigo-800 transition-colors">
                                    Voir l'historique
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Graphiques et Activité -->
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-5">
                    <!-- Graphique des dépôts -->
                    <div class="bg-white rounded-xl shadow-xs border border-gray-100 overflow-hidden group hover:shadow-md transition-all duration-300">
                        <div class="p-5">
                            <div class="flex justify-between items-center mb-4">
                                <h3 class="text-lg font-semibold text-gray-900 flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                                    </svg>
                                    Dépôts mensuels
                                </h3>
                                <select class="text-xs border-gray-200 rounded-lg focus:border-indigo-500 focus:ring-indigo-500 bg-gray-50 py-1.5">
                                    <option>12 mois</option>
                                    <option>6 mois</option>
                                    <option>30 jours</option>
                                </select>
                            </div>
                            <div class="h-64">
                                <!-- Placeholder pour le graphique -->
                                <div class="flex items-center justify-center h-full bg-gray-50 rounded-lg">
                                    <p class="text-gray-400">Graphique des dépôts</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Activité récente -->
                    <div class="bg-white rounded-xl shadow-xs border border-gray-100 overflow-hidden group hover:shadow-md transition-all duration-300">
                        <div class="p-5">
                            <div class="flex justify-between items-center mb-4">
                                <h3 class="text-lg font-semibold text-gray-900 flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                    </svg>
                                    Activité récente
                                </h3>
                                <a href="#" class="text-sm text-indigo-600 hover:text-indigo-800">Voir tout</a>
                            </div>
                            <div class="space-y-4">
                                @foreach(range(1, 3) as $item)
                                <div class="flex items-start pb-4 border-b border-gray-100 last:border-0 last:pb-0 group">
                                    <div class="flex-shrink-0 mt-1">
                                        <div class="h-8 w-8 rounded-full bg-indigo-100 flex items-center justify-center group-hover:bg-indigo-200 transition-colors">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                        </div>
                                    </div>
                                    <div class="ml-3 flex-1">
                                        <p class="text-sm font-medium text-gray-900">Dépôt effectué</p>
                                        <p class="text-sm text-gray-500">25,000 FCFA ajoutés à votre compte</p>
                                        <p class="text-xs text-gray-400 mt-1">Il y a 2 heures</p>
                                    </div>
                                    <span class="text-xs bg-green-100 text-green-800 px-2 py-1 rounded-full">Complété</span>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </main>

            <!-- Footer minimaliste -->
            <footer class="bg-white/80 backdrop-blur-sm border-t border-gray-100 py-4 px-6">
                <div class="flex flex-col md:flex-row justify-between items-center text-sm text-gray-500">
                    <p>&copy; {{ now()->year }} Tontine+. Tous droits réservés.</p>
                    <div class="flex space-x-4 mt-2 md:mt-0">
                        <a href="#" class="hover:text-indigo-600 transition-colors">Conditions</a>
                        <a href="#" class="hover:text-indigo-600 transition-colors">Confidentialité</a>
                        <a href="#" class="hover:text-indigo-600 transition-colors">Support</a>
                    </div>
                </div>
            </footer>
        </div>
    </div>


</x-client-layout>

<style>
    /* Animation de gradient fluide */
    .animate-gradient-shift {
        animation: gradientShift 8s ease infinite;
        background-size: 200% 200%;
    }

    @keyframes gradientShift {
        0% { background-position: 0% 50%; }
        50% { background-position: 100% 50%; }
        100% { background-position: 0% 50%; }
    }

    /* Transitions douces */
    .transition-all {
        transition-property: all;
        transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
        transition-duration: 300ms;
    }

    /* Effets de profondeur */
    .shadow-xs {
        box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
    }

    /* Scrollbar personnalisée */
    ::-webkit-scrollbar {
        width: 6px;
        height: 6px;
    }

    ::-webkit-scrollbar-track {
        background: #f1f1f1;
        border-radius: 10px;
    }

    ::-webkit-scrollbar-thumb {
        background: #c1c1c1;
        border-radius: 10px;
    }

    ::-webkit-scrollbar-thumb:hover {
        background: #a1a1a1;
    }

    /* Effet de flou moderne */
    .backdrop-blur-sm {
        backdrop-filter: blur(6px);
    }

    /* Animation d'entrée pour les éléments */
    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(10px); }
        to { opacity: 1; transform: translateY(0); }
    }

    .animate-fade-in {
        animation: fadeIn 0.5s ease-out forwards;
    }
</style>

<script>
    // Initialisation Alpine.js pour le menu mobile
    document.addEventListener('alpine:init', () => {
        Alpine.data('dashboard', () => ({
            mobileMenuOpen: false,

            init() {
                // Animation d'entrée progressive des éléments
                const elements = document.querySelectorAll('[data-animate]');
                elements.forEach((el, index) => {
                    el.style.animationDelay = `${index * 0.1}s`;
                    el.classList.add('animate-fade-in');
                });
            }
        }))
    });
</script>
