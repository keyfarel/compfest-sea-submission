<div wire:loading.class="opacity-50" class="grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-4">
    <div class="overflow-hidden rounded-xl bg-white p-5 shadow-lg ring-1 ring-black ring-opacity-5">
        <dt class="truncate text-sm font-medium text-gray-500">Pendapatan (Rentang Dipilih)</dt>
        <dd class="mt-1 text-3xl font-semibold tracking-tight text-gray-900">
            Rp {{ number_format($revenueThisMonth) }}
        </dd>
    </div>
    <div class="overflow-hidden rounded-xl bg-white p-5 shadow-lg ring-1 ring-black ring-opacity-5">
        <dt class="truncate text-sm font-medium text-gray-500">Langganan Baru (Bulan Ini)</dt>
        <dd class="mt-1 text-3xl font-semibold tracking-tight text-gray-900">{{ $newSubscriptionsCount }}</dd>
    </div>
    <div class="overflow-hidden rounded-xl bg-white p-5 shadow-lg ring-1 ring-black ring-opacity-5">
        <dt class="truncate text-sm font-medium text-gray-500">Total Langganan Aktif</dt>
        <dd class="mt-1 text-3xl font-semibold tracking-tight text-gray-900">{{ $totalActiveSubscriptions }}</dd>
    </div>
    <div class="overflow-hidden rounded-xl bg-white p-5 shadow-lg ring-1 ring-black ring-opacity-5">
        <dt class="truncate text-sm font-medium text-gray-500">Reactivation (Bulan Ini)</dt>
        <dd class="mt-1 text-3xl font-semibold tracking-tight text-gray-900">{{ $reactivationsCount }}</dd>
    </div>
</div>
