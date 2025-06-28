<div class="relative w-full md:flex-1">
    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
        <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg"
             viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
            <path fill-rule="evenodd"
                  d="M9 3.5a5.5 5.5 0 100 11 5.5 5.5 0 000-11zM2 9a7 7 0 1112.452 4.391l3.328 3.329a.75.75 0 11-1.06 1.06l-3.329-3.328A7 7 0 012 9z"
                  clip-rule="evenodd"/>
        </svg>
    </div>
    <input
        wire:model.debounce.500ms="search"
        type="search"
        placeholder="Cari pengguna..."
        class="text-gray-600 placeholder:text-sm w-full rounded-lg border border-gray-300 pl-10 pr-3 py-2 text-sm font-semibold shadow-sm focus:outline-none focus:border-green-600 focus:ring-0"
    />
</div>
