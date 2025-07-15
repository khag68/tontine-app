
<x-layout-app>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard Admin') }}
        </h2>
    </x-slot>

    <div class="py-8 px-6 space-y-8">

        <!-- 📦 Cartes Statistiques -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            <div class="bg-white rounded shadow p-6 text-center hover:scale-105 transform transition">
                <p class="text-sm text-gray-500">👥 Utilisateurs</p>
                <p class="text-3xl font-bold text-indigo-600 mt-2">{{ $totalUsers }}</p>
            </div>

            <div class="bg-white rounded shadow p-6 text-center hover:scale-105 transform transition">
                <p class="text-sm text-gray-500">📄 KYC en attente</p>
                <p class="text-3xl font-bold text-yellow-500 mt-2">{{ $pendingKyc }}</p>
            </div>

            <div class="bg-white rounded shadow p-6 text-center hover:scale-105 transform transition">
                <p class="text-sm text-gray-500">✅ KYC vérifiés</p>
                <p class="text-3xl font-bold text-green-600 mt-2">{{ $kycVerified }}</p>
            </div>

            <div class="bg-white rounded shadow p-6 text-center hover:scale-105 transform transition">
                <p class="text-sm text-gray-500">🟢 Utilisateurs actifs</p>
                <p class="text-3xl font-bold text-teal-600 mt-2">{{ $activeUsers }}</p>
            </div>

            <div class="bg-white rounded shadow p-6 text-center hover:scale-105 transform transition">
                <p class="text-sm text-gray-500">🆕 Nouveaux aujourd’hui</p>
                <p class="text-3xl font-bold text-purple-600 mt-2">{{ $newUsersToday }}</p>
            </div>

            <div class="bg-white rounded shadow p-6 text-center hover:scale-105 transform transition">
                <p class="text-sm text-gray-500">💰 Total Dépôts</p>
                <p class="text-2xl font-bold text-green-600 mt-2">
                    {{ number_format($totalDeposits, 0, ',', ' ') }} FCFA
                </p>
            </div>

            <div class="bg-white rounded shadow p-6 text-center hover:scale-105 transform transition">
                <p class="text-sm text-gray-500">📤 Retraits en attente</p>
                <p class="text-3xl font-bold text-red-600 mt-2">{{ $pendingWithdrawals }}</p>
            </div>
        </div>

        <!-- 📊 Dépôts Mensuels Chart -->
        <div class="bg-white rounded shadow p-6">
            <h3 class="text-lg font-bold mb-4">📊 Dépôts mensuels</h3>
            <canvas id="depositsChart" class="w-full h-64"></canvas>
        </div>

    </div>

    <!-- 🎯 Chart.js CDN & Script -->
    @script
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const ctx = document.getElementById('depositsChart').getContext('2d');

        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: @json(collect($monthlyStats)->pluck('month')),
                datasets: [{
                    label: 'Montant des dépôts (FCFA)',
                    data: @json(collect($monthlyStats)->pluck('amount')),
                    backgroundColor: 'rgba(54, 162, 235, 0.5)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            callback: value => value.toLocaleString() + ' FCFA'
                        }
                    }
                },
                plugins: {
                    tooltip: {
                        callbacks: {
                            label: context => `Dépôt : ${context.raw.toLocaleString()} FCFA`
                        }
                    }
                }
            }
        });
    </script>
    </x-layout-app>

