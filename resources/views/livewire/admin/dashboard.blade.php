<div class="max-w-7xl mx-auto p-6">
    <h1 class="text-2xl font-bold text-gray-800 mb-6">Admin Dashboard</h1>

    {{-- Cards Section --}}
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        {{-- New Subscriptions --}}
        <div class="bg-white shadow rounded-xl p-6">
            <p class="text-sm text-gray-500">New Subscriptions</p>
            <h3 class="text-2xl font-bold text-green-600 mt-1">152</h3>
            <p class="text-xs text-gray-400 mt-2">During selected period</p>
        </div>

        {{-- MRR --}}
        <div class="bg-white shadow rounded-xl p-6">
            <p class="text-sm text-gray-500">Monthly Recurring Revenue (MRR)</p>
            <h3 class="text-2xl font-bold text-green-600 mt-1">$7,820</h3>
            <p class="text-xs text-gray-400 mt-2">From active subscriptions</p>
        </div>

        {{-- Reactivations --}}
        <div class="bg-white shadow rounded-xl p-6">
            <p class="text-sm text-gray-500">Reactivations</p>
            <h3 class="text-2xl font-bold text-green-600 mt-1">24</h3>
            <p class="text-xs text-gray-400 mt-2">Cancelled then restarted</p>
        </div>

        {{-- Subscription Growth --}}
        <div class="bg-white shadow rounded-xl p-6">
            <p class="text-sm text-gray-500">Active Subscriptions</p>
            <h3 class="text-2xl font-bold text-green-600 mt-1">1,204</h3>
            <p class="text-xs text-gray-400 mt-2">Current total</p>
        </div>
    </div>

    {{-- Date Range Selector --}}
    <div class="bg-white rounded-xl shadow p-4 mb-6">
        <h2 class="text-lg font-semibold text-gray-700 mb-2">Filter Tanggal</h2>
        <div class="flex flex-col sm:flex-row gap-4">
            <div class="flex-1">
                <label for="start_date" class="text-sm text-gray-600">Mulai</label>
                <input type="date" id="start_date" class="mt-1 w-full rounded-lg border-gray-300 shadow-sm focus:ring focus:ring-green-300/30 focus:border-green-500">
            </div>
            <div class="flex-1">
                <label for="end_date" class="text-sm text-gray-600">Selesai</label>
                <input type="date" id="end_date" class="mt-1 w-full rounded-lg border-gray-300 shadow-sm focus:ring focus:ring-green-300/30 focus:border-green-500">
            </div>
            <div class="flex items-end">
                <button class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg transition">Terapkan</button>
            </div>
        </div>
    </div>
</div>
