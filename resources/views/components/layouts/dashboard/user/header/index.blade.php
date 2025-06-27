<header
    class="flex h-20 flex-shrink-0 items-center justify-between border-b border-gray-200/80 bg-white px-6 shadow-sm">
    <div class="flex items-center gap-4">
        <button @click="sidebarOpen = !sidebarOpen" class="text-gray-500 focus:outline-none">
            <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M4 6H20M4 12H20M4 18H11" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                      stroke-linejoin="round"/>
            </svg>
        </button>
    </div>

    <div class="flex items-center gap-2 sm:gap-4">
        <div class="relative hidden sm:block">
            <input
                class="w-full form-input rounded-full bg-gray-100 border-transparent py-2 pl-10 pr-4 text-sm focus:border-gray-300 focus:ring-0"
                type="text" placeholder="Cari...">
            <span class="absolute inset-y-0 left-0 flex items-center pl-3"><svg class="h-5 w-5 text-gray-400"
                                                                                viewBox="0 0 24 24" fill="none"><path
                        d="M21 21L15 15M17 10C17 13.866 13.866 17 10 17C6.13401 17 3 13.866 3 10C3 6.13401 6.13401 3 10 3C13.866 3 17 6.13401 17 10Z"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round"/></svg></span>
        </div>
        <button
            class="relative rounded-full p-2 text-gray-500 hover:bg-gray-100 hover:text-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
            <span class="absolute top-1.5 right-1.5 inline-flex h-2.5 w-2.5 rounded-full bg-red-500"></span>
            <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M15 17H20L18.5951 15.5951C18.2141 15.2141 18 14.6973 18 14.1585V11C18 8.38757 16.3304 6.16509 14 5.34142V5C14 3.89543 13.1046 3 12 3C10.8954 3 10 3.89543 10 5V5.34142C7.66962 6.16509 6 8.38757 6 11V14.1585C6 14.6973 5.78595 15.2141 5.40493 15.5951L4 17H9M15 17V18C15 19.6569 13.6569 21 12 21C10.3431 21 9 19.6569 9 18V17M15 17H9"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
        </button>

        <!-- Dropdown -->
        <div x-data="{ dropdownOpen: false }"
             @click.outside="dropdownOpen = false"
             @keydown.escape.window="dropdownOpen = false"
             class="relative">
            <button @click="dropdownOpen = !dropdownOpen"
                    class="relative block h-10 w-10 overflow-hidden rounded-full border-2 border-transparent transition hover:border-green-600 focus:border-green-600 focus:outline-none">
                <img class="h-full w-full object-cover"
                     src="https://ui-avatars.com/api/?name=John+Doe&background=16a34a&color=fff&font-size=0.5"
                     alt="Avatar Pengguna">
            </button>

            <!-- Dropdown menu -->
            <div x-show="dropdownOpen"
                 x-cloak
                 x-transition:enter="transition ease-out duration-200"
                 x-transition:enter-start="opacity-0 translate-y-1"
                 x-transition:enter-end="opacity-100 translate-y-0"
                 x-transition:leave="transition ease-in duration-150"
                 x-transition:leave-start="opacity-100 translate-y-0"
                 x-transition:leave-end="opacity-0 translate-y-1"
                 class="absolute right-0 z-50 mt-2 w-56 overflow-hidden rounded-lg bg-white py-2 shadow-xl ring-1 ring-black ring-opacity-5">
                <div class="border-b px-4 py-2">
                    <p class="text-sm font-semibold text-gray-800">John Doe</p>
                    <p class="truncate text-xs text-gray-500">john.doe@example.com</p>
                </div>
                <a href="#" class="flex items-center gap-3 px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Profil
                    Saya</a>
                <a href="#"
                   class="flex items-center gap-3 px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Pengaturan</a>
                <div class="border-t border-gray-100"></div>
                <a href="#" @click.prevent="document.getElementById('logout-form').submit()"
                   class="flex items-center gap-3 px-4 py-2 text-sm text-red-600 hover:bg-red-50">Logout</a>
            </div>
        </div>


    </div>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
        @csrf
    </form>
</header>
