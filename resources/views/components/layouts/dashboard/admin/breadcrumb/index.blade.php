<div class="border-b border-gray-200/80 bg-white px-6 py-3 shadow-sm">
    <nav aria-label="Breadcrumb">
        <ol class="inline-flex items-center space-x-1 text-sm text-gray-500">
            <!-- Dashboard -->
            <li>
                <a href="{{ route('admin-dashboard') }}"
                   class="{{ request()->routeIs('admin-dashboard') ? 'text-green-700 font-medium' : 'hover:text-gray-700' }}">
                    Dashboard
                </a>
            </li>

            <!-- Separator -->
            @if (request()->routeIs('manage-users') || request()->routeIs('manage-orders') || request()->routeIs('reports'))
                <li>
                    <svg class="h-5 w-5 mx-2 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"/>
                    </svg>
                </li>
            @endif

            <!-- Kelola Pengguna -->
            @if (request()->routeIs('manage-users'))
                <li>
                    <a href="{{ route('manage-users') }}"
                       class="font-medium {{ request()->routeIs('manage-users') ? 'text-green-700' : 'hover:text-gray-700' }}">
                        Kelola Pengguna
                    </a>
                </li>
            @endif

            <!-- Kelola Pesanan -->
            @if (request()->routeIs('manage-orders'))
                <li>
                    <a href="{{ route('manage-orders') }}"
                       class="font-medium {{ request()->routeIs('manage-orders') ? 'text-green-700' : 'hover:text-gray-700' }}">
                        Kelola Pesanan
                    </a>
                </li>
            @endif

            <!-- Laporan -->
            @if (request()->routeIs('reports'))
                <li>
                    <a href="{{ route('reports') }}"
                       class="font-medium {{ request()->routeIs('reports') ? 'text-green-700' : 'hover:text-gray-700' }}">
                        Laporan
                    </a>
                </li>
            @endif
        </ol>
    </nav>
</div>
