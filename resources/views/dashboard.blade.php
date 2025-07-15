<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Mon Dashboard | Tontine+</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    @livewireStyles
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
</head>
<body class="bg-gray-50 text-gray-800 font-sans overflow-hidden ">

<div x-data="{ sidebarOpen: false, isScrolled: false }"
     @scroll.window="isScrolled = window.pageYOffset > 10"
     class="flex h-screen overflow-hidden">

    <!-- Sidebar -->
    <aside class="bg-gradient-to-b from-indigo-700 to-purple-800 w-64 border-r hidden lg:flex flex-col transition-all duration-300 transform hover:shadow-xl">
        <div class="px-6 py-5 font-bold text-white text-2xl border-b border-indigo-600 flex items-center space-x-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <span>Tontine+</span>
        </div>
        <nav class="flex-1 px-4 py-6 space-y-2 text-sm">
            <a href="{{ route('client.dashboard') }}" class="flex items-center px-3 py-3 rounded-lg text-white bg-indigo-600 bg-opacity-20 font-medium transition-all hover:bg-opacity-30 hover:pl-5">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                </svg>
                Tableau de bord
            </a>
            <a href="{{ route('client.kyc') }}" class="flex items-center px-3 py-3 rounded-lg text-indigo-100 hover:text-white transition-colors hover:bg-indigo-600 hover:bg-opacity-20">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                </svg>
                Vérification KYC
            </a>
            <a href="{{ route('client.deposits') }}" class="flex items-center px-3 py-3 rounded-lg text-indigo-100 hover:text-white transition-colors hover:bg-indigo-600 hover:bg-opacity-20">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                Dépôts
            </a>
            <a href="{{ route('client.withdrawals') }}" class="flex items-center px-3 py-3 rounded-lg text-indigo-100 hover:text-white transition-colors hover:bg-indigo-600 hover:bg-opacity-20">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4" />
                </svg>
                Retraits
            </a>
            <a href="{{ route('profile') }}" class="flex items-center px-3 py-3 rounded-lg text-indigo-100 hover:text-white transition-colors hover:bg-indigo-600 hover:bg-opacity-20">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                </svg>
                Mon profil
            </a>
        </nav>
        <div class="p-4 text-xs text-indigo-300 border-t border-indigo-600">
            &copy; {{ now()->year }} Tontine+ v1.0
        </div>
    </aside>

    <!-- Mobile sidebar toggle -->
    <div class="lg:hidden fixed top-4 left-4 z-50">
        <button @click="sidebarOpen = !sidebarOpen" class="text-white bg-indigo-600 p-2 rounded-full shadow-lg hover:bg-indigo-700 transition-colors">
            <svg class="w-6 h-6" fill="none" stroke="currentColor">
                <path x-show="!sidebarOpen" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M4 6h16M4 12h16M4 18h16"/>
                <path x-show="sidebarOpen" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M6 18L18 6M6 6l12 12"/>
            </svg>
        </button>
    </div>

    <!-- Mobile Sidebar -->
    <aside x-show="sidebarOpen" x-transition:enter="transition ease-in-out duration-300"
           x-transition:enter-start="-translate-x-full" x-transition:enter-end="translate-x-0"
           x-transition:leave="transition ease-in-out duration-300"
           x-transition:leave-start="translate-x-0" x-transition:leave-end="-translate-x-full"
           @click.outside="sidebarOpen = false"
           class="fixed inset-y-0 left-0 w-64 bg-gradient-to-b from-indigo-700 to-purple-800 shadow-xl p-6 space-y-4 text-sm z-40 lg:hidden">
        <h2 class="text-lg font-bold text-white flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            Tontine+
        </h2>
        <nav class="space-y-2">
            <a href="{{ route('dashboard') }}" class="flex items-center px-3 py-3 rounded-lg text-white bg-indigo-600 bg-opacity-20 font-medium">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                </svg>
                Tableau de bord
            </a>
            <a href="{{ route('client.kyc') }}" class="flex items-center px-3 py-3 rounded-lg text-indigo-100 hover:text-white transition-colors hover:bg-indigo-600 hover:bg-opacity-20">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                </svg>
                Vérification KYC
            </a>
            <a href="{{ route('client.deposits') }}" class="flex items-center px-3 py-3 rounded-lg text-indigo-100 hover:text-white transition-colors hover:bg-indigo-600 hover:bg-opacity-20">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                Dépôts
            </a>
            <a href="{{ route('client.withdrawals') }}" class="flex items-center px-3 py-3 rounded-lg text-indigo-100 hover:text-white transition-colors hover:bg-indigo-600 hover:bg-opacity-20">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4" />
                </svg>
                Retraits
            </a>
            <a href="{{ route('profile') }}" class="flex items-center px-3 py-3 rounded-lg text-indigo-100 hover:text-white transition-colors hover:bg-indigo-600 hover:bg-opacity-20">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                </svg>
                Mon profil
            </a>
        </nav>
    </aside>

    <!-- Main Content -->
    <main class="flex-1 flex flex-col overflow-y-auto bg-gray-50">
        <!-- Sticky Header -->
        <header class="bg-white shadow-sm px-6 py-4 sticky top-0 z-20 transition-all duration-300"
                :class="{ 'shadow-md': isScrolled }">
            <div class="flex justify-between items-center">
                <div class="flex items-center space-x-4">
                    <h1 class="text-xl font-semibold text-gray-800 flex items-center">
                        <span class="mr-2">👋</span>
                        <span class="text-transparent bg-clip-text bg-gradient-to-r from-indigo-600 to-purple-600">
                            Bonjour {{ Auth::user()->name }}
                        </span>
                    </h1>
                    <span class="text-xs bg-indigo-100 text-indigo-800 px-2 py-1 rounded-full animate-pulse">
                        {{ Auth::user()->role }}
                    </span>
                </div>
                <div class="flex items-center space-x-4">
                    <button class="p-2 text-gray-500 hover:text-indigo-600 rounded-full hover:bg-gray-100 transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                        </svg>
                    </button>
                    <form method="POST" action="">
                        @csrf
                        <button type="submit" class="flex items-center text-sm text-gray-600 hover:text-indigo-600 transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                            </svg>
                            Déconnexion
                        </button>
                    </form>
                </div>
            </div>
        </header>

        <!-- Dashboard Content -->
        <section class="px-6 py-8 space-y-8 animate__animated animate__fadeIn">
            <!-- Stats Cards Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                <!-- Solde Card -->
                <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 hover:shadow-lg transition-all duration-300 transform hover:-translate-y-1 group">
                    <div class="flex justify-between items-start">
                        <div>
                            <p class="text-sm font-medium text-gray-500">Solde actuel</p>
                            <p class="text-2xl font-bold text-indigo-600 mt-2">{{ number_format(Auth::user()->balance, 0) }} FCFA</p>
                        </div>
                        <div class="p-3 bg-indigo-50 rounded-lg group-hover:bg-indigo-100 transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                    </div>
                    <div class="mt-4 flex items-center text-sm text-green-600">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
                        </svg>
                        +5% depuis hier
                    </div>
                </div>

                <!-- KYC Status Card -->
                <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 hover:shadow-lg transition-all duration-300 transform hover:-translate-y-1 group">
                    <div class="flex justify-between items-start">
                        <div>
                            <p class="text-sm font-medium text-gray-500">Statut KYC</p>
                            <p class="text-lg font-semibold mt-2 capitalize @class([
                                'text-green-600' => Auth::user()->kyc_status === 'verified',
                                'text-yellow-600' => Auth::user()->kyc_status === 'pending',
                                'text-red-600' => Auth::user()->kyc_status === 'rejected',
                            ])">
                                {{ Auth::user()->kyc_status ?? 'non vérifié' }}
                            </p>
                        </div>
                        <div class="p-3 rounded-lg @class([
                            'bg-green-50 group-hover:bg-green-100' => Auth::user()->kyc_status === 'verified',
                            'bg-yellow-50 group-hover:bg-yellow-100' => Auth::user()->kyc_status === 'pending',
                            'bg-red-50 group-hover:bg-red-100' => Auth::user()->kyc_status === 'rejected',
                            'bg-gray-50 group-hover:bg-gray-100' => !Auth::user()->kyc_status,
                        ]) transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 @class([
                                'text-green-600' => Auth::user()->kyc_status === 'verified',
                                'text-yellow-600' => Auth::user()->kyc_status === 'pending',
                                'text-red-600' => Auth::user()->kyc_status === 'rejected',
                                'text-gray-600' => !Auth::user()->kyc_status,
                            ])" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                            </svg>
                        </div>
                    </div>
                    <div class="mt-4">
                        @if(Auth::user()->kyc_status === 'verified')
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                Complet
                            </span>
                        @else
                            <a href="{{ route('client.kyc') }}" class="text-sm text-indigo-600 hover:text-indigo-800 transition-colors flex items-center">
                                Compléter maintenant
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                </svg>
                            </a>
                        @endif
                    </div>
                </div>

                <!-- Total Dépôts Card -->
                <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 hover:shadow-lg transition-all duration-300 transform hover:-translate-y-1 group">
                    <div class="flex justify-between items-start">
                        <div>
                            <p class="text-sm font-medium text-gray-500">Total cotisé</p>
                            <p class="text-xl font-bold text-indigo-700 mt-2">{{ number_format(Auth::user()->deposits()->sum('amount'), 0) }} FCFA</p>
                        </div>
                        <div class="p-3 bg-purple-50 rounded-lg group-hover:bg-purple-100 transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-purple-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                    </div>
                    <div class="mt-4">
                        <div class="w-full bg-gray-200 rounded-full h-2">
                            <div class="bg-indigo-600 h-2 rounded-full" style="width: 75%"></div>
                        </div>
                        <p class="text-xs text-gray-500 mt-1">75% de votre objectif mensuel</p>
                    </div>
                </div>

                <!-- Dernier Dépôt Card -->
                <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 hover:shadow-lg transition-all duration-300 transform hover:-translate-y-1 group">
                    <div class="flex justify-between items-start">
                        <div>
                            <p class="text-sm font-medium text-gray-500">Dernier dépôt</p>
                            <p class="text-lg font-medium text-gray-800 mt-2">
                                @if($lastDeposit = Auth::user()->deposits()->latest()->first())
                                    {{ number_format($lastDeposit->amount, 0) }} FCFA
                                @else
                                    Aucun dépôt
                                @endif
                            </p>
                            <p class="text-xs text-gray-500 mt-1">
                                {{ optional($lastDeposit)->created_at?->format('d M Y à H:i') ?? '-' }}
                            </p>
                        </div>
                        <div class="p-3 bg-blue-50 rounded-lg group-hover:bg-blue-100 transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4" />
                            </svg>
                        </div>
                    </div>
                    <div class="mt-4">
                        <a href="{{ route('client.deposits') }}" class="inline-flex items-center text-sm text-indigo-600 hover:text-indigo-800 transition-colors">
                            Voir l'historique
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Charts Section -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                <!-- Monthly Deposits Chart -->
                @isset($monthlyDepositsChart)
                    <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 hover:shadow-lg transition-all duration-300">
                        <div class="flex justify-between items-center mb-4">
                            <h3 class="text-lg font-semibold text-gray-800 flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                                </svg>
                                Dépôts mensuels
                            </h3>
                            <select class="text-sm border-gray-300 rounded-md focus:border-indigo-500 focus:ring-indigo-500">
                                <option>12 mois</option>
                                <option>6 mois</option>
                                <option>30 jours</option>
                            </select>
                        </div>
                        <livewire:livewire-column-chart
                            :column-chart-model="$this->monthlyDepositsChart"
                            key="{{ now()->timestamp }}"
                        />
                    </div>
                @endisset

                <!-- Recent Activity -->
                <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 hover:shadow-lg transition-all duration-300">
                    <div class="flex justify-between items-center mb-4">
                        <h3 class="text-lg font-semibold text-gray-800 flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>
                            Activité récente
                        </h3>
                        <a href="#" class="text-sm text-indigo-600 hover:text-indigo-800">Voir tout</a>
                    </div>
                    <div class="space-y-4">
                        @foreach(range(1, 3) as $item)
                            <div class="flex items-start pb-4 border-b border-gray-100 last:border-0 last:pb-0">
                                <div class="flex-shrink-0 mt-1">
                                    <div class="h-8 w-8 rounded-full bg-indigo-100 flex items-center justify-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
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
              <footer class="bg-white text-center py-4 text-sm text-gray-500 border-t mt-auto">
            <div class="container mx-auto px-6">
                <p>&copy; {{ now()->year }} Tontine+. Tous droits réservés.</p>
                <div class="flex justify-center space-x-6 mt-2">
                    <a href="#" class="text-gray-400 hover:text-indigo-600 transition-colors">
                        Conditions d'utilisation
                    </a>
                    <a href="#" class="text-gray-400 hover:text-indigo-600 transition-colors">
                        Politique de confidentialité
                    </a>
                    <a href="#" class="text-gray-400 hover:text-indigo-600 transition-colors">
                        Support
                    </a>
                </div>
            </div>
        </footer>
        </section>

        <!-- Footer -->

    </main>
</div>

@livewireScripts
</body>
</html>

</x-app-layout>

<style>
    .bg-animate {
        background-size: 400% 400%;
        animation: gradient 15s ease infinite;
    }

    @keyframes gradient {
        0% { background-position: 0% 50%; }
        50% { background-position: 100% 50%; }
        100% { background-position: 0% 50%; }
    }

    .animate-pulse {
        animation: pulse 2s cubic-bezier(0.4, 0, 0.6, 1) infinite;
    }

    @keyframes pulse {
        0%, 100% { opacity: 1; }
        50% { opacity: 0.5; }
    }

    [x-cloak] { display: none !important; }

    /* Custom scrollbar */
    ::-webkit-scrollbar {
        width: 8px;
        height: 8px;
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
</style>
