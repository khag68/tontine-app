<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Bienvenue sur Tontine+ | Gestion simplifiée de tontines</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Plateforme moderne de gestion de tontines pour les communautés africaines. Sécurisé, simple et efficace.">
    @vite('resources/css/app.css')
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
</head>
<body class="bg-white text-gray-800 antialiased scroll-smooth selection:bg-indigo-300 selection:text-white">

    <!-- HEADER -->
    <header class="bg-white fixed w-full z-30 shadow-sm transition-all duration-300" x-data="{ scrolled: false }"
            @scroll.window="scrolled = (window.pageYOffset > 10) ? true : false"
            :class="{'shadow-lg': scrolled, 'py-4': !scrolled, 'py-2': scrolled}">
        <div class="max-w-7xl mx-auto px-6 flex justify-between items-center">
            <a href="/" class="flex items-center space-x-2 group">
                <h1 class="text-2xl font-bold text-indigo-600 transition-all duration-300 group-hover:text-indigo-700">Tontine+</h1>
                <span class="text-xs bg-indigo-100 text-indigo-600 px-2 py-1 rounded-full animate__animated animate__fadeIn">Nouveau</span>
            </a>
            <nav class="hidden md:flex space-x-8 text-sm font-medium items-center">
                <a href="#features" class="text-gray-600 hover:text-indigo-600 transition-colors duration-200">Fonctionnalités</a>
                <a href="#about" class="text-gray-600 hover:text-indigo-600 transition-colors duration-200">À propos</a>
                <a href="#testimonials" class="text-gray-600 hover:text-indigo-600 transition-colors duration-200">Témoignages</a>
                <a href="{{ route('login') }}" class="text-indigo-600 border border-indigo-600 rounded px-4 py-1.5 hover:bg-indigo-50 transition-all duration-200 hover:shadow-sm">Connexion</a>
                <a href="{{ route('register') }}" class="bg-indigo-600 text-white rounded px-4 py-1.5 hover:bg-indigo-700 transition-all duration-200 hover:shadow-md shadow-indigo-100">Inscription</a>
            </nav>
            <!-- Menu mobile -->
            <div class="md:hidden" x-data="{ open: false }">
                <button @click="open = !open" class="text-indigo-600 focus:outline-none p-2" aria-label="Menu mobile">
                    <svg class="w-6 h-6 transition-transform duration-200" :class="{'rotate-90': open}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path :class="{'hidden': open}" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': !open}" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
                <div x-show="open" x-transition:enter="transition ease-out duration-200"
                     x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
                     x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100 scale-100"
                     x-transition:leave-end="opacity-0 scale-95"
                     class="absolute right-6 mt-2 w-48 bg-white border rounded-lg shadow-xl py-2 px-4 text-sm z-50 origin-top-right">
                    <a href="#features" class="block py-2 hover:text-indigo-600 transition-colors" @click="open = false">Fonctionnalités</a>
                    <a href="#about" class="block py-2 hover:text-indigo-600 transition-colors" @click="open = false">À propos</a>
                    <a href="#testimonials" class="block py-2 hover:text-indigo-600 transition-colors" @click="open = false">Témoignages</a>
                    <div class="border-t my-1 border-gray-100"></div>
                    <a href="{{ route('login') }}" class="block py-2 text-indigo-600 font-medium hover:underline" @click="open = false">Connexion</a>
                    <a href="{{ route('register') }}" class="block py-2 font-semibold text-white bg-indigo-600 rounded px-3 text-center hover:bg-indigo-700 transition-colors" @click="open = false">Inscription</a>
                </div>
            </div>
        </div>
    </header>

    <!-- HERO -->
    <section class="pt-32 pb-24 px-6 text-center bg-gradient-to-br from-indigo-50 via-white to-indigo-50">
        <div class="max-w-4xl mx-auto">
            <div class="animate__animated animate__fadeIn animate__delay-1s">
                <span class="inline-block bg-indigo-100 text-indigo-600 text-xs font-medium px-3 py-1 rounded-full mb-4 shadow-sm">Nouvelle version disponible</span>
            </div>
            <h1 class="text-4xl sm:text-5xl md:text-6xl font-bold text-gray-900 leading-tight mb-6 animate__animated animate__fadeInUp">
                <span class="bg-clip-text text-transparent bg-gradient-to-r from-indigo-600 to-purple-600">Simplifiez</span> votre gestion de tontine
            </h1>
            <p class="text-gray-600 text-lg md:text-xl mb-8 max-w-2xl mx-auto animate__animated animate__fadeInUp animate__fast">
                Une plateforme moderne pour cotiser, suivre et sécuriser vos finances collectives avec transparence et efficacité.
            </p>
            <div class="flex flex-col sm:flex-row justify-center gap-4 animate__animated animate__fadeInUp animate__faster">
                <a href="{{ route('register') }}" class="inline-flex items-center justify-center bg-gradient-to-r from-indigo-600 to-purple-600 hover:from-indigo-700 hover:to-purple-700 text-white font-semibold py-3 px-8 rounded-full shadow-lg transition-all transform hover:-translate-y-1 hover:shadow-xl">
                    Créer un compte gratuit
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L12.586 11H5a1 1 0 110-2h7.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                    </svg>
                </a>
                <a href="#features" class="inline-flex items-center justify-center bg-white text-gray-700 border border-gray-200 font-medium py-3 px-8 rounded-full shadow-sm hover:shadow-md transition-all hover:border-indigo-300">
                    Explorer les fonctionnalités
                </a>
            </div>
            <div class="mt-16 animate__animated animate__fadeIn animate__delay-1s">
                <div class="relative max-w-3xl mx-auto bg-white p-1 rounded-xl shadow-lg border border-gray-100">
                    <div class="absolute -inset-0.5 bg-gradient-to-r from-indigo-300 to-purple-300 rounded-xl blur opacity-20"></div>
                    <img src="https://images.unsplash.com/photo-1551288049-bebda4e38f71?ixlib=rb-1.2.1&auto=format&fit=crop&w=1200&q=80" alt="Tableau de bord Tontine+" class="w-full h-auto rounded-lg" loading="lazy">
                </div>
            </div>
        </div>
    </section>

    <!-- PARTENAIRES -->
    <section class="py-12 bg-gray-50">
        <div class="max-w-7xl mx-auto px-6">
            <p class="text-center text-gray-500 text-sm mb-8">Faites confiance à la solution utilisée par des milliers de groupes</p>
            <div class="flex flex-wrap justify-center items-center gap-x-12 gap-y-8">
                <div class="opacity-70 hover:opacity-100 transition-opacity duration-300">
                    <img src="https://logo.clearbit.com/mtn.com" alt="MTN" class="h-8" loading="lazy">
                </div>
                <div class="opacity-70 hover:opacity-100 transition-opacity duration-300">
                    <img src="https://logo.clearbit.com/orange.com" alt="Orange" class="h-10" loading="lazy">
                </div>
                <div class="opacity-70 hover:opacity-100 transition-opacity duration-300">
                    <img src="https://logo.clearbit.com/moov-africa.com" alt="Moov Africa" class="h-6" loading="lazy">
                </div>
                <div class="opacity-70 hover:opacity-100 transition-opacity duration-300">
                    <img src="https://logo.clearbit.com/ecobank.com" alt="Ecobank" class="h-10" loading="lazy">
                </div>
                <div class="opacity-70 hover:opacity-100 transition-opacity duration-300">
                    <img src="https://logo.clearbit.com/afrilandfirstbank.com" alt="Afriland First Bank" class="h-8" loading="lazy">
                </div>
            </div>
        </div>
    </section>

    <!-- FONCTIONNALITÉS -->
    <section id="features" class="py-20 px-6 bg-white">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-16">
                <span class="inline-block bg-indigo-50 text-indigo-600 text-sm font-medium px-4 py-1 rounded-full mb-4">Fonctionnalités</span>
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Tout ce dont vous avez besoin pour gérer votre tontine</h2>
                <p class="text-gray-500 max-w-2xl mx-auto">Une plateforme complète conçue pour répondre aux besoins spécifiques des tontines africaines.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Feature 1 -->
                <div class="group bg-white p-8 rounded-xl border border-gray-100 shadow-sm hover:shadow-md transition-all duration-300 hover:border-indigo-100 transform hover:-translate-y-2">
                    <div class="w-14 h-14 bg-indigo-50 rounded-lg flex items-center justify-center mb-6 text-indigo-600 group-hover:bg-indigo-100 transition-colors duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold mb-3 text-gray-900">KYC Sécurisé</h3>
                    <p class="text-gray-500 mb-4">Soumettez vos pièces d'identité et accédez rapidement à la plateforme avec une vérification fluide et sécurisée.</p>
                    <a href="#" class="inline-flex items-center text-indigo-600 font-medium group-hover:text-indigo-700 transition-colors">
                        En savoir plus
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </a>
                </div>

                <!-- Feature 2 -->
                <div class="group bg-white p-8 rounded-xl border border-gray-100 shadow-sm hover:shadow-md transition-all duration-300 hover:border-indigo-100 transform hover:-translate-y-2">
                    <div class="w-14 h-14 bg-indigo-50 rounded-lg flex items-center justify-center mb-6 text-indigo-600 group-hover:bg-indigo-100 transition-colors duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold mb-3 text-gray-900">Dépôts rapides</h3>
                    <p class="text-gray-500 mb-4">Effectuez des cotisations en quelques clics via mobile money ou virement bancaire et visualisez l'historique en temps réel.</p>
                    <a href="#" class="inline-flex items-center text-indigo-600 font-medium group-hover:text-indigo-700 transition-colors">
                        En savoir plus
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </a>
                </div>

                <!-- Feature 3 -->
                <div class="group bg-white p-8 rounded-xl border border-gray-100 shadow-sm hover:shadow-md transition-all duration-300 hover:border-indigo-100 transform hover:-translate-y-2">
                    <div class="w-14 h-14 bg-indigo-50 rounded-lg flex items-center justify-center mb-6 text-indigo-600 group-hover:bg-indigo-100 transition-colors duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold mb-3 text-gray-900">Retraits instantanés</h3>
                    <p class="text-gray-500 mb-4">Demandez un retrait et suivez son traitement depuis votre tableau de bord avec notifications en temps réel.</p>
                    <a href="#" class="inline-flex items-center text-indigo-600 font-medium group-hover:text-indigo-700 transition-colors">
                        En savoir plus
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </a>
                </div>

                <!-- Feature 4 -->
                <div class="group bg-white p-8 rounded-xl border border-gray-100 shadow-sm hover:shadow-md transition-all duration-300 hover:border-indigo-100 transform hover:-translate-y-2">
                    <div class="w-14 h-14 bg-indigo-50 rounded-lg flex items-center justify-center mb-6 text-indigo-600 group-hover:bg-indigo-100 transition-colors duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold mb-3 text-gray-900">Transparence totale</h3>
                    <p class="text-gray-500 mb-4">Toutes les transactions sont enregistrées et visibles par les membres autorisés pour une confiance absolue.</p>
                    <a href="#" class="inline-flex items-center text-indigo-600 font-medium group-hover:text-indigo-700 transition-colors">
                        En savoir plus
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </a>
                </div>

                <!-- Feature 5 -->
                <div class="group bg-white p-8 rounded-xl border border-gray-100 shadow-sm hover:shadow-md transition-all duration-300 hover:border-indigo-100 transform hover:-translate-y-2">
                    <div class="w-14 h-14 bg-indigo-50 rounded-lg flex items-center justify-center mb-6 text-indigo-600 group-hover:bg-indigo-100 transition-colors duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold mb-3 text-gray-900">Calendrier intégré</h3>
                    <p class="text-gray-500 mb-4">Planifiez les tours de tontine et recevez des rappels automatiques pour ne rien oublier.</p>
                    <a href="#" class="inline-flex items-center text-indigo-600 font-medium group-hover:text-indigo-700 transition-colors">
                        En savoir plus
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </a>
                </div>

                <!-- Feature 6 -->
                <div class="group bg-white p-8 rounded-xl border border-gray-100 shadow-sm hover:shadow-md transition-all duration-300 hover:border-indigo-100 transform hover:-translate-y-2">
                    <div class="w-14 h-14 bg-indigo-50 rounded-lg flex items-center justify-center mb-6 text-indigo-600 group-hover:bg-indigo-100 transition-colors duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold mb-3 text-gray-900">Rapports détaillés</h3>
                    <p class="text-gray-500 mb-4">Générez des rapports financiers détaillés et exportez-les en PDF pour une comptabilité transparente.</p>
                    <a href="#" class="inline-flex items-center text-indigo-600 font-medium group-hover:text-indigo-700 transition-colors">
                        En savoir plus
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- TÉMOIGNAGES -->
    <section id="testimonials" class="py-20 px-6 bg-gray-50">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-16">
                <span class="inline-block bg-indigo-50 text-indigo-600 text-sm font-medium px-4 py-1 rounded-full mb-4">Témoignages</span>
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Ce que nos utilisateurs disent</h2>
                <p class="text-gray-500 max-w-2xl mx-auto">Découvrez comment Tontine+ a transformé la gestion des tontines pour des milliers de groupes.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Témoignage 1 -->
                <div class="bg-white p-8 rounded-xl shadow-sm hover:shadow-md transition-shadow duration-300">
                    <div class="flex items-center mb-4">
                        <div class="w-12 h-12 rounded-full overflow-hidden mr-4">
                            <img src="https://randomuser.me/api/portraits/women/43.jpg" alt="Fatou Diop" class="w-full h-full object-cover" loading="lazy">
                        </div>
                        <div>
                            <h4 class="font-semibold text-gray-900">Fatou Diop</h4>
                            <p class="text-sm text-gray-500">Présidente de tontine, Dakar</p>
                        </div>
                    </div>
                    <p class="text-gray-600 italic mb-4">"Depuis que nous utilisons Tontine+, plus de disputes sur les cotisations. Tout est transparent et accessible à tous les membres. Un vrai soulagement!"</p>
                    <div class="flex text-yellow-400">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                        </svg>
                    </div>
                </div>

                <!-- Témoignage 2 -->
                <div class="bg-white p-8 rounded-xl shadow-sm hover:shadow-md transition-shadow duration-300">
                    <div class="flex items-center mb-4">
                        <div class="w-12 h-12 rounded-full overflow-hidden mr-4">
                            <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="Jean Koffi" class="w-full h-full object-cover" loading="lazy">
                        </div>
                        <div>
                            <h4 class="font-semibold text-gray-900">Jean Koffi</h4>
                            <p class="text-sm text-gray-500">Trésorier, Abidjan</p>
                        </div>
                    </div>
                    <p class="text-gray-600 italic mb-4">"En tant que trésorier, Tontine+ m'a libéré d'un énorme fardeau. Plus besoin de courir après les cotisations, tout est automatisé et sécurisé."</p>
                    <div class="flex text-yellow-400">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                        </svg>
                    </div>
                </div>

                <!-- Témoignage 3 -->
                <div class="bg-white p-8 rounded-xl shadow-sm hover:shadow-md transition-shadow duration-300">
                    <div class="flex items-center mb-4">
                        <div class="w-12 h-12 rounded-full overflow-hidden mr-4">
                            <img src="https://randomuser.me/api/portraits/women/65.jpg" alt="Amina Ouedraogo" class="w-full h-full object-cover" loading="lazy">
                        </div>
                        <div>
                            <h4 class="font-semibold text-gray-900">Amina Ouedraogo</h4>
                            <p class="text-sm text-gray-500">Membre de tontine, Ouagadougou</p>
                        </div>
                    </div>
                    <p class="text-gray-600 italic mb-4">"Je peux maintenant suivre mes cotisations et mes gains où que je sois, même en voyage. L'application mobile est vraiment pratique!"</p>
                    <div class="flex text-yellow-400">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" />
                        </svg>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- À PROPOS -->
    <section id="about" class="py-20 px-6 bg-gradient-to-r from-indigo-600 to-purple-600 text-white">
        <div class="max-w-7xl mx-auto">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <div>
                    <span class="inline-block bg-white/20 text-white text-sm font-medium px-4 py-1 rounded-full mb-4">À propos</span>
                    <h2 class="text-3xl md:text-4xl font-bold mb-6">Pensé pour les communautés d'Afrique</h2>
                    <p class="text-indigo-100 text-lg mb-6">Tontine+ aide vos groupes à gérer leurs finances simplement, sans papier ni tracas. Une plateforme de confiance, adaptée aux réalités locales et aux besoins spécifiques des tontines africaines.</p>
                    <div class="space-y-4 mb-8">
                        <div class="flex items-start">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-indigo-200 mr-3 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            <span class="text-indigo-50">Solution 100% mobile adaptée aux connexions intermittentes</span>
                        </div>
                        <div class="flex items-start">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-indigo-200 mr-3 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            <span class="text-indigo-50">Intégration avec Mobile Money et services bancaires locaux</span>
                        </div>
                        <div class="flex items-start">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-indigo-200 mr-3 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            <span class="text-indigo-50">Support multilingue (Français, Anglais, Wolof, Dioula...)</span>
                        </div>
                    </div>
                    <a href="{{ route('register') }}" class="inline-flex items-center justify-center bg-white text-indigo-600 font-semibold py-3 px-8 rounded-full shadow-lg transition-all transform hover:-translate-y-1 hover:shadow-xl">
                        Essayer gratuitement
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L12.586 11H5a1 1 0 110-2h7.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </a>
                </div>
                <div class="relative">
                    <div class="relative z-10 rounded-2xl overflow-hidden shadow-2xl">
                        <img src="https://images.unsplash.com/photo-1600880292203-757bb62b4baf?ixlib=rb-1.2.1&auto=format&fit=crop&w=1200&q=80" alt="Équipe Tontine+" class="w-full h-auto" loading="lazy">
                    </div>
                    <div class="absolute -bottom-6 -left-6 w-32 h-32 bg-purple-400 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-blob"></div>
                    <div class="absolute -top-6 -right-6 w-32 h-32 bg-indigo-400 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-blob animation-delay-2000"></div>
                    <div class="absolute -bottom-8 right-20 w-32 h-32 bg-pink-400 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-blob animation-delay-4000"></div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA -->
    <section class="py-20 px-6 bg-white">
        <div class="max-w-4xl mx-auto text-center bg-gradient-to-r from-indigo-50 to-purple-50 rounded-2xl p-12">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-6">Prêt à révolutionner votre tontine?</h2>
            <p class="text-gray-600 text-lg mb-8 max-w-2xl mx-auto">Rejoignez des milliers de groupes qui font déjà confiance à Tontine+ pour une gestion simplifiée et sécurisée de leurs finances collectives.</p>
            <div class="flex flex-col sm:flex-row justify-center gap-4">
                <a href="{{ route('register') }}" class="inline-flex items-center justify-center bg-gradient-to-r from-indigo-600 to-purple-600 hover:from-indigo-700 hover:to-purple-700 text-white font-semibold py-3 px-8 rounded-full shadow-lg transition-all transform hover:-translate-y-1 hover:shadow-xl">
                    Commencer maintenant
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L12.586 11H5a1 1 0 110-2h7.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                    </svg>
                </a>
                <a href="#features" class="inline-flex items-center justify-center bg-white text-gray-700 border border-gray-200 font-medium py-3 px-8 rounded-full shadow-sm hover:shadow-md transition-all hover:border-indigo-300">
                    Voir les fonctionnalités
                </a>
            </div>
        </div>
    </section>

    <!-- FOOTER -->
    <footer class="bg-gray-900 text-gray-400 py-12 px-6">
        <div class="max-w-7xl mx-auto">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-10">
                <div>
                    <h3 class="text-white text-lg font-semibold mb-4">Tontine+</h3>
                    <p class="mb-4">La plateforme de gestion de tontines la plus simple et sécurisée pour les communautés africaines.</p>
                    <div class="flex space-x-4">
                        <a href="#" class="text-gray-400 hover:text-white transition-colors">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                <path fill-rule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" clip-rule="evenodd" />
                            </svg>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-white transition-colors">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                <path d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84" />
                            </svg>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-white transition-colors">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                <path fill-rule="evenodd" d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z" clip-rule="evenodd" />
                            </svg>
                        </a>
                    </div>
                </div>
                <div>
                    <h3 class="text-white text-lg font-semibold mb-4">Solutions</h3>
                    <ul class="space-y-2">
                        <li><a href="#" class="hover:text-white transition-colors">Tontines rotatives</a></li>
                        <li><a href="#" class="hover:text-white transition-colors">Tontines non rotatives</a></li>
                        <li><a href="#" class="hover:text-white transition-colors">Tontines d'investissement</a></li>
                        <li><a href="#" class="hover:text-white transition-colors">Tontines sociales</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-white text-lg font-semibold mb-4">Ressources</h3>
                    <ul class="space-y-2">
                        <li><a href="#" class="hover:text-white transition-colors">Documentation</a></li>
                        <li><a href="#" class="hover:text-white transition-colors">Blog</a></li>
                        <li><a href="#" class="hover:text-white transition-colors">FAQ</a></li>
                        <li><a href="#" class="hover:text-white transition-colors">Centre d'aide</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-white text-lg font-semibold mb-4">Entreprise</h3>
                    <ul class="space-y-2">
                        <li><a href="#" class="hover:text-white transition-colors">À propos</a></li>
                        <li><a href="#" class="hover:text-white transition-colors">Carrières</a></li>
                        <li><a href="#" class="hover:text-white transition-colors">Contact</a></li>
                        <li><a href="#" class="hover:text-white transition-colors">Presse</a></li>
                    </ul>
                </div>
            </div>
            <div class="border-t border-gray-800 mt-12 pt-8 flex flex-col md:flex-row justify-between items-center">
                <p>&copy; {{ date('Y') }} Tontine+. Tous droits réservés.</p>
                <div class="flex space-x-6 mt-4 md:mt-0">
                    <a href="#" class="text-sm hover:text-white transition-colors">Confidentialité</a>
                    <a href="#" class="text-sm hover:text-white transition-colors">Conditions</a>
                    <a href="#" class="text-sm hover:text-white transition-colors">Cookies</a>
                </div>
            </div>
        </div>
    </footer>

    <!-- ✨ ANIMATIONS -->
    <style>
        [x-cloak] { display: none !important; }

        /* Animation de blob */
        @keyframes blob {
            0% {
                transform: translate(0px, 0px) scale(1);
            }
            33% {
                transform: translate(30px, -50px) scale(1.1);
            }
            66% {
                transform: translate(-20px, 20px) scale(0.9);
            }
            100% {
                transform: translate(0px, 0px) scale(1);
            }
        }

        .animate-blob {
            animation: blob 7s infinite;
        }

        .animation-delay-2000 {
            animation-delay: 2s;
        }

        .animation-delay-4000 {
            animation-delay: 4s;
        }

        /* Animation d'entrée */
        .animate-enter {
            animation: enter 0.5s ease-out forwards;
        }

        @keyframes enter {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Animation de pulse */
        @keyframes pulse {
            0%, 100% {
                transform: scale(1);
            }
            50% {
                transform: scale(1.05);
            }
        }

        .animate-pulse {
            animation: pulse 2s infinite;
        }

        /* Délais d'animation */
        .delay-100 { animation-delay: 0.1s; }
        .delay-200 { animation-delay: 0.2s; }
        .delay-300 { animation-delay: 0.3s; }
        .delay-400 { animation-delay: 0.4s; }
        .delay-500 { animation-delay: 0.5s; }
    </style>

    <!-- Script pour animations au scroll -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // Animation des éléments au scroll
            const animateOnScroll = () => {
                const elements = document.querySelectorAll('.animate-on-scroll');

                elements.forEach(element => {
                    const elementPosition = element.getBoundingClientRect().top;
                    const screenPosition = window.innerHeight / 1.2;

                    if(elementPosition < screenPosition) {
                        element.classList.add('animate-enter');
                    }
                });
            };

            // Initial check
            animateOnScroll();

            // Check on scroll
            window.addEventListener('scroll', animateOnScroll);
        });
    </script>
</body>
</html>
