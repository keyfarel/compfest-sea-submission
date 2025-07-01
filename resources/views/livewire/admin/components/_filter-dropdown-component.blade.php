<div x-data="{ open: false }" class="relative w-full md:w-auto">
    <button @click="open = !open" type="button"
            class="flex w-full items-center justify-center gap-x-1.5 rounded-md bg-white px-3 py-1.5 text-sm font-semibold text-gray-900 hover:bg-gray-50">
        <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
             fill="currentColor">
            <path fill-rule="evenodd"
                  d="M5.75 2a.75.75 0 01.75.75V4h7V2.75a.75.75 0 011.5 0V4h.25A2.75 2.75 0 0118 6.75v8.5A2.75 2.75 0 0115.25 18H4.75A2.75 2.75 0 012 15.25v-8.5A2.75 2.75 0 014.75 4H5V2.75A.75.75 0 015.75 2zm-1 5.5c0-.414.336-.75.75-.75h10.5a.75.75 0 010 1.5H5.5a.75.75 0 01-.75-.75z"
                  clip-rule="evenodd"/>
        </svg>
        <span>Pilih Rentang</span>
    </button>
    <div x-show="open" @click.away="open = false" x-transition
         class="absolute left-0 z-10 mt-2 w-full origin-top rounded-md bg-white shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none"
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
