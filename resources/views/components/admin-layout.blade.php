<div>
    <!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>{{ $title ?? 'Admin' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>
<body class="bg-gray-100 text-gray-900">

    <div x-data="{ sidebarOpen: false }" class="flex h-screen overflow-hidden">

        <!-- 🧭 Sidebar -->
       <aside x-data="{ tab: '{{ request()->route()->getName() }}' }" class="bg-white w-64 border-r shadow-lg hidden md:block">
    <div class="p-6 font-bold text-xl text-indigo-600">Tontine Admin</div>
    <nav class="mt-6 space-y-2">
        <a href="{{ route('admin.cockpit') }}"
           :class="tab === 'admin.cockpit' ? 'bg-indigo-100 font-semibold' : ''"
           class="block px-6 py-2 rounded transition">📊 Dashboard</a>
        <a href="#" @click="tab = 'kyc'" :class="tab === 'kyc' ? 'bg-indigo-100 font-semibold' : ''"
           class="block px-6 py-2 rounded transition">📁 KYC</a>
        <a href="#" @click="tab = 'activation'" :class="tab === 'activation' ? 'bg-indigo-100 font-semibold' : ''"
           class="block px-6 py-2 rounded transition">📶 Trafic</a>
        <a href="#" @click="tab = 'users'" :class="tab === 'users' ? 'bg-indigo-100 font-semibold' : ''"
           class="block px-6 py-2 rounded transition">🔐 Utilisateurs</a>
        <a href="#" @click="tab = 'actions'" :class="tab === 'actions' ? 'bg-indigo-100 font-semibold' : ''"
           class="block px-6 py-2 rounded transition">📚 Historique</a>
    </nav>
</aside>


        <!-- 📱 Mobile Sidebar Toggle -->
        <div class="md:hidden fixed top-4 left-4 z-50">
            <button @click="sidebarOpen = !sidebarOpen" class="bg-indigo-600 text-white px-3 py-2 rounded shadow">
                ☰
            </button>
        </div>

        <!-- 📱 Mobile Sidebar -->
        <div x-show="sidebarOpen" class="fixed inset-0 bg-black bg-opacity-50 z-40 md:hidden">
            <aside class="bg-white w-64 h-full p-6 shadow-lg">
                <div class="font-bold text-xl text-indigo-600 mb-6">Tontine Admin</div>
                <nav class="space-y-2">
                    <a href="/admin/dashboard" class="block px-4 py-2 hover:bg-indigo-100 rounded">📊 Dashboard</a>
                    <a href="#" class="block px-4 py-2 hover:bg-indigo-100 rounded">📁 KYC</a>
                    <a href="#" class="block px-4 py-2 hover:bg-indigo-100 rounded">📶 Trafic</a>
                    <a href="#" class="block px-4 py-2 hover:bg-indigo-100 rounded">🔐 Utilisateurs</a>
                    <a href="#" class="block px-4 py-2 hover:bg-indigo-100 rounded">📚 Historique</a>
                </nav>
            </aside>
        </div>

        <!-- 🧩 Main Content -->
        <div class="flex-1 flex flex-col overflow-y-auto">
            <!-- 📌 Header -->
            <header class="bg-white shadow px-6 py-4 flex justify-between items-center">

                <!-- 🔔 Notification Alpine -->
<div x-data="{ show: false, message: '' }"
     x-on:notify.window="message = $event.detail.message; show = true; setTimeout(() => show = false, 3000)"
     x-show="show"
     class="fixed top-4 right-4 bg-green-500 text-white px-4 py-2 rounded shadow z-50 transition">
    ✅ <span x-text="message"></span>
</div>

                <h1 class="text-xl font-semibold">Tableau de bord</h1>
                <div class="flex items-center gap-4">
                    <span class="text-sm text-gray-600">👤 {{ Auth::user()->name }}</span>
                    <form method="POST" action="">
                        @csrf
                        <button class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600">Déconnexion</button>
                    </form>
                </div>
            </header>

            <!-- 📦 Slot content -->
            <main class="p-6">
                {{ $slot }}
            </main>
                        <!-- Footer -->
            <footer class="bg-white border-t mt-auto py-4 px-6 text-sm text-gray-500 text-center">
    © {{ date('Y') }} Tontine Admin — Tous droits réservés.
</footer>

        </div>
    </div>

    @livewireScripts
</body>
</html>

</div>
