<x-slot:title>
    Admin Dashboard
</x-slot:title>

<div class="space-y-8 max-w-7xl mx-auto">
    <!-- Header Halaman dan Filter Tanggal -->
    <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
        <div>
            <h1 class="text-3xl font-extrabold tracking-tight text-gray-900">Admin Dashboard</h1>
            <p class="mt-1 text-lg text-gray-600">Ringkasan analitik dan aktivitas langganan.</p>
        </div>

        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-end gap-3 w-full sm:w-auto">

            <div class="flex flex-col md:flex-row gap-2 md:gap-0 w-full md:w-auto border border-gray-300 rounded-lg shadow-sm p-2 bg-white">

                <div x-data="{ open: false }" class="relative">
                    <button @click="open = !open" type="button" class="flex w-full md:w-auto items-center justify-center gap-x-1.5 rounded-md bg-white px-3 py-1.5 text-sm font-semibold text-gray-900 ring-1 ring-inset ring-gray-200 hover:bg-gray-50">
                        <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M5.75 2a.75.75 0 01.75.75V4h7V2.75a.75.75 0 011.5 0V4h.25A2.75 2.75 0 0118 6.75v8.5A2.75 2.75 0 0115.25 18H4.75A2.75 2.75 0 012 15.25v-8.5A2.75 2.75 0 014.75 4H5V2.75A.75.75 0 015.75 2zm-1 5.5c0-.414.336-.75.75-.75h10.5a.75.75 0 010 1.5H5.5a.75.75 0 01-.75-.75z" clip-rule="evenodd" />
                        </svg>
                        <span class="whitespace-nowrap">Pilih Rentang</span>
                        <svg class="-mr-1 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z" clip-rule="evenodd" />
                        </svg>
                    </button>

                    <div x-show="open" @click.away="open = false"
                         x-transition
                         class="absolute left-0 md:left-auto md:right-0 z-10 mt-2 w-full md:w-56 origin-top-right rounded-md bg-white shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none"
                         style="display: none;">
                        <div class="py-1">
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Hari Ini</a>
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">7 Hari Terakhir</a>
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">30 Hari Terakhir</a>
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Bulan Ini</a>
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Tahun Ini</a>
                        </div>
                    </div>
                </div>

                <div class="hidden md:block h-6 self-center border-l border-gray-300 mx-2"></div>
                <div class="block md:hidden w-full border-t border-gray-200 my-2"></div>

                <div class="flex items-center gap-2 w-full md:w-auto">
                    <input type="date" value="2025-06-01" class="border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-sm w-full">
                    <span class="text-gray-400 font-medium">to</span>
                    <input type="date" value="2025-06-28" class="border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-sm w-full">
                </div>
            </div>

            <button type="button" class="w-full sm:w-auto inline-flex items-center justify-center gap-x-1.5 rounded-lg bg-indigo-600 px-4 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                <svg class="-ml-0.5 h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 3c2.755 0 5.455.232 8.083.678.533.09.917.556.917 1.096v1.044a2.25 2.25 0 01-.659 1.591l-5.432 5.432a2.25 2.25 0 00-.659 1.591v2.927a2.25 2.25 0 01-1.244 2.013L9.75 21v-6.572a2.25 2.25 0 00-.659-1.591L3.659 7.409A2.25 2.25 0 013 5.818V4.774c0-.54.384-1.006.917-1.096A48.32 48.32 0 0112 3z" />
                </svg>
                Filter
            </button>
        </div>
    </div>

    <!-- Stat Cards / Metrik Utama -->
    <div class="grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-4">
        <!-- Monthly Recurring Revenue (MRR) -->
        <div class="overflow-hidden rounded-xl bg-white p-5 shadow-lg ring-1 ring-black ring-opacity-5">
            <dt class="truncate text-sm font-medium text-gray-500">Monthly Recurring Revenue</dt>
            <dd class="mt-1 text-3xl font-semibold tracking-tight text-gray-900">Rp 12.550.000</dd>
        </div>
        <!-- Langganan Baru -->
        <div class="overflow-hidden rounded-xl bg-white p-5 shadow-lg ring-1 ring-black ring-opacity-5">
            <dt class="truncate text-sm font-medium text-gray-500">Langganan Baru (Bulan Ini)</dt>
            <dd class="mt-1 text-3xl font-semibold tracking-tight text-gray-900">15</dd>
        </div>
        <!-- Total Langganan Aktif -->
        <div class="overflow-hidden rounded-xl bg-white p-5 shadow-lg ring-1 ring-black ring-opacity-5">
            <dt class="truncate text-sm font-medium text-gray-500">Total Langganan Aktif</dt>
            <dd class="mt-1 text-3xl font-semibold tracking-tight text-gray-900">89</dd>
        </div>
        <!-- Reactivation -->
        <div class="overflow-hidden rounded-xl bg-white p-5 shadow-lg ring-1 ring-black ring-opacity-5">
            <dt class="truncate text-sm font-medium text-gray-500">Reactivation (Bulan Ini)</dt>
            <dd class="mt-1 text-3xl font-semibold tracking-tight text-gray-900">4</dd>
        </div>
    </div>

    <!-- Grafik dan Tabel Terbaru -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- Grafik Langganan Aktif -->
        <div class="lg:col-span-2 overflow-hidden rounded-xl bg-white p-6 shadow-lg ring-1 ring-black ring-opacity-5">
            <h3 class="text-lg font-semibold text-gray-900">Grafik Langganan Aktif</h3>
            <div class="mt-6 h-72 flex items-end justify-between space-x-4">
                <!-- Bar Chart (Simulasi) -->
                <div class="flex flex-col items-center space-y-2">
                    <div class="w-10 bg-green-200 rounded-t-lg" style="height: 60%;"></div>
                    <span class="text-xs text-gray-500">Jan</span>
                </div>
                <div class="flex flex-col items-center space-y-2">
                    <div class="w-10 bg-green-300 rounded-t-lg" style="height: 75%;"></div>
                    <span class="text-xs text-gray-500">Feb</span>
                </div>
                <div class="flex flex-col items-center space-y-2">
                    <div class="w-10 bg-green-200 rounded-t-lg" style="height: 50%;"></div>
                    <span class="text-xs text-gray-500">Mar</span>
                </div>
                <div class="flex flex-col items-center space-y-2">
                    <div class="w-10 bg-green-400 rounded-t-lg" style="height: 85%;"></div>
                    <span class="text-xs text-gray-500">Apr</span>
                </div>
                <div class="flex flex-col items-center space-y-2">
                    <div class="w-10 bg-green-400 rounded-t-lg" style="height: 90%;"></div>
                    <span class="text-xs text-gray-500">Mei</span>
                </div>
                <div class="flex flex-col items-center space-y-2">
                    <div class="w-10 bg-green-500 rounded-t-lg" style="height: 100%;"></div>
                    <span class="text-xs text-gray-500">Jun</span>
                </div>
            </div>
        </div>

        <!-- Tabel Langganan Terbaru -->
        <div class="lg:col-span-1 overflow-hidden rounded-xl bg-white shadow-lg ring-1 ring-black ring-opacity-5">
            <h3 class="text-lg font-semibold text-gray-900 p-6 border-b border-gray-200">Langganan Terbaru</h3>
            <ul role="list" class="divide-y divide-gray-200">
                <li class="p-4 flex items-center justify-between">
                    <div>
                        <p class="font-medium text-gray-900">Andi Saputra</p>
                        <p class="text-sm text-gray-500">Protein Plan</p>
                    </div>
                    <span
                        class="inline-flex items-center rounded-full bg-green-100 px-2.5 py-0.5 text-xs font-medium text-green-800">Baru</span>
                </li>
                <li class="p-4 flex items-center justify-between">
                    <div>
                        <p class="font-medium text-gray-900">Citra Lestari</p>
                        <p class="text-sm text-gray-500">Royal Plan</p>
                    </div>
                    <span
                        class="inline-flex items-center rounded-full bg-green-100 px-2.5 py-0.5 text-xs font-medium text-green-800">Baru</span>
                </li>
                <li class="p-4 flex items-center justify-between">
                    <div>
                        <p class="font-medium text-gray-900">Budi Hartono</p>
                        <p class="text-sm text-gray-500">Diet Plan</p>
                    </div>
                    <span
                        class="inline-flex items-center rounded-full bg-blue-100 px-2.5 py-0.5 text-xs font-medium text-blue-800">Reaktivasi</span>
                </li>
                <li class="p-4 flex items-center justify-between">
                    <div>
                        <p class="font-medium text-gray-900">Dewi Anggraini</p>
                        <p class="text-sm text-gray-500">Protein Plan</p>
                    </div>
                    <span
                        class="inline-flex items-center rounded-full bg-green-100 px-2.5 py-0.5 text-xs font-medium text-green-800">Baru</span>
                </li>
            </ul>
        </div>
    </div>
</div>
