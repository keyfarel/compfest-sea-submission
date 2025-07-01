<x-slot:title>
    Admin Dashboard
</x-slot:title>

<div class="space-y-8 max-w-7xl mx-auto">
    <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
        <div>
            <h1 class="text-3xl font-extrabold tracking-tight text-gray-900">Admin Dashboard</h1>
            <p class="mt-1 text-lg text-gray-600">Ringkasan analitik dan aktivitas langganan.</p>
        </div>

        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-end gap-3 w-full sm:w-auto">
            <div
                class="flex flex-col md:flex-row gap-2 md:gap-0 w-full md:w-auto border border-gray-300 rounded-lg shadow-sm p-2 bg-white">
                <div x-data="{ open: false }" class="relative">
                    <button @click="open = !open" type="button"
                            class="flex w-full md:w-auto items-center justify-center gap-x-1.5 rounded-md bg-white px-3 py-1.5 text-sm font-semibold text-gray-900 ring-1 ring-inset ring-gray-200 hover:bg-gray-50">
                        <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                             fill="currentColor">
                            <path fill-rule="evenodd"
                                  d="M5.75 2a.75.75 0 01.75.75V4h7V2.75a.75.75 0 011.5 0V4h.25A2.75 2.75 0 0118 6.75v8.5A2.75 2.75 0 0115.25 18H4.75A2.75 2.75 0 012 15.25v-8.5A2.75 2.75 0 014.75 4H5V2.75A.75.75 0 015.75 2zm-1 5.5c0-.414.336-.75.75-.75h10.5a.75.75 0 010 1.5H5.5a.75.75 0 01-.75-.75z"
                                  clip-rule="evenodd"/>
                        </svg>
                        <span>Pilih Rentang</span>
                        <svg class="-mr-1 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                             fill="currentColor">
                            <path fill-rule="evenodd"
                                  d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z"
                                  clip-rule="evenodd"/>
                        </svg>
                    </button>
                    <div x-show="open" @click.away="open = false" x-transition
                         class="absolute right-0 z-10 mt-2 w-56 origin-top-right rounded-md bg-white shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none"
                         style="display: none;">
                        <div class="py-1">
                            <a href="#" wire:click.prevent="setPeriod('today')"
                               class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Hari Ini</a>
                            <a href="#" wire:click.prevent="setPeriod('last_7_days')"
                               class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">7 Hari Terakhir</a>
                            <a href="#" wire:click.prevent="setPeriod('last_30_days')"
                               class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">30 Hari Terakhir</a>
                            <a href="#" wire:click.prevent="setPeriod('this_month')"
                               class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Bulan Ini</a>
                            <a href="#" wire:click.prevent="setPeriod('this_year')"
                               class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Tahun Ini</a>
                        </div>
                    </div>
                </div>
                <div class="hidden md:block h-6 self-center border-l border-gray-300 mx-2"></div>
                <div class="block md:hidden w-full border-t border-gray-200 my-2"></div>
                <div class="flex items-center gap-2 w-full md:w-auto">
                    <input type="date" wire:model.live="startDate"
                           class="border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-sm w-full">
                    <span class="text-gray-400 font-medium">to</span>
                    <input type="date" wire:model.live="endDate"
                           class="border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-sm w-full">
                </div>
            </div>
        </div>
    </div>

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

    <div wire:loading.class="opacity-50" class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <div class="lg:col-span-2 overflow-hidden rounded-xl bg-white p-6 shadow-lg ring-1 ring-black ring-opacity-5">
            <h3 class="text-lg font-semibold text-gray-900">Grafik Langganan Baru</h3>
            <div class="mt-6 h-72 flex items-end justify-between space-x-2">
                @php
                    $maxValue = max(array_column($chartData, 'value')) ?: 1;
                @endphp
                @foreach ($chartData as $data)
                    <div class="flex flex-col items-center space-y-2 w-full">
                        <div class="w-full bg-green-300 rounded-t-lg hover:bg-green-400"
                             style="height: {{ ($data['value'] / $maxValue) * 100 }}%;"></div>
                        <span class="text-xs text-gray-500">{{ $data['label'] }}</span>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="lg:col-span-1 overflow-hidden rounded-xl bg-white shadow-lg ring-1 ring-black ring-opacity-5">
            <h3 class="text-lg font-semibold text-gray-900 p-6 border-b border-gray-200">Langganan Terbaru</h3>
            <ul role="list" class="divide-y divide-gray-200">
                @forelse ($recentSubscriptions as $sub)
                    <li class="p-4 flex items-center justify-between">
                        <div>
                            <p class="font-medium text-gray-900">{{ $sub->user->name }}</p>
                            <p class="text-sm text-gray-500">{{ $sub->plan->name }}</p>
                        </div>
                        <span class="text-sm text-gray-500">{{ $sub->created_at->diffForHumans() }}</span>
                    </li>
                @empty
                    <li class="p-4 text-center text-sm text-gray-500">Tidak ada data.</li>
                @endforelse
            </ul>
        </div>
    </div>
</div>
