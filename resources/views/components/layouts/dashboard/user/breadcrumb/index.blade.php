{{-- resources/views/components/layouts/dashboard/user/breadcrumb/index.blade.php --}}
<div class="border-b border-gray-200/80 bg-white px-6 py-3 shadow-sm">
    <nav aria-label="Breadcrumb">
        <ol class="inline-flex items-center space-x-1 text-sm text-gray-500">
            <!-- Dashboard -->
            <li>
                <a href="{{ route('user-dashboard') }}"
                   class="{{ request()->routeIs('user-dashboard') ? 'text-green-700 font-medium' : 'hover:text-gray-700' }}">
                    Dashboard
                </a>
            </li>

            <!-- Separator -->
            @if (request()->routeIs('user-subscriptions') || request()->routeIs('user-orders'))
                <li>
                    <svg class="h-5 w-5 mx-2 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"/>
                    </svg>
                </li>
            @endif

            <!-- Subscriptions -->
            @if (request()->routeIs('user-subscriptions'))
                <li>
                    <a href="{{ route('user-subscriptions') }}"
                       class="font-medium {{ request()->routeIs('user-subscriptions') ? 'text-green-700' : 'hover:text-gray-700' }}">
                        Langganan Saya
                    </a>
                </li>
            @endif

            <!-- Orders -->
            @if (request()->routeIs('user-orders'))
                <li>
                    <a href="{{ route('user-orders') }}"
                       class="font-medium {{ request()->routeIs('user-orders') ? 'text-green-700' : 'hover:text-gray-700' }}">
                        Riwayat Pesanan
                    </a>
                </li>
            @endif
        </ol>
    </nav>
</div>
