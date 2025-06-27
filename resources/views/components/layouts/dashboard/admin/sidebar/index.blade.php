<aside
    class="fixed inset-y-0 left-0 z-30 flex h-full w-64 flex-col border-r border-gray-200/80 bg-white shadow-sm transition-transform duration-300 ease-in-out"
    :class="{'translate-x-0': sidebarOpen, '-translate-x-full': !sidebarOpen}">

    <div class="flex h-20 items-center justify-center border-b border-gray-200/80">
        <a href="{{ route('home') }}" class="flex items-center gap-2 text-xl font-bold text-green-700">
            <x-partials.logo/>
            <span>SEA Catering</span>
        </a>
    </div>

    <div class="flex flex-1 flex-col justify-between overflow-y-auto">
        <nav class="mt-4 space-y-2 px-4">
            <a href="#"
               class="group flex items-center gap-3 rounded-lg px-4 py-2.5 text-gray-600 transition-colors hover:bg-gray-100 hover:text-gray-900">
                <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                     stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                </svg>
                <span>Dashboard</span>
            </a>
            <a href="#"
               class="group flex items-center gap-3 rounded-lg px-4 py-2.5 bg-green-100 font-semibold text-green-700 transition-colors">
                <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                     stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.653-.184-1.268-.5-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.653.184-1.268.5-1.857M12 8a3 3 0 100-6 3 3 0 000 6z"/>
                </svg>
                <span>Kelola Pengguna</span>
            </a>

            <a href="#"
               class="group flex items-center gap-3 rounded-lg px-4 py-2.5 text-gray-600 transition-colors hover:bg-gray-100 hover:text-gray-900">
                <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                     stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"/>
                </svg>
                <span>Kelola Pesanan</span>
            </a>

            <a href="#"
               class="group flex items-center gap-3 rounded-lg px-4 py-2.5 text-gray-600 transition-colors hover:bg-gray-100 hover:text-gray-900">
                <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                     stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                </svg>
                <span>Laporan</span>
            </a>
        </nav>
    </div>
</aside>
