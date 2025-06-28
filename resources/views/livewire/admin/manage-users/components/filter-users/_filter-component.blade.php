{{-- PERUBAHAN 1: `x-data` sekarang hanya mengurus UI (apakah dropdown terbuka) --}}
<div x-data="{ open: false }" class="relative w-full md:w-auto">
    <button @click="open = !open" @click.outside="open = false" type="button"
            class="inline-flex w-full justify-center items-center gap-x-2 rounded-lg border border-green-600 bg-green-600 px-4 py-2 text-sm font-semibold text-white shadow-sm hover:bg-green-700">
        <svg class="h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none"
             viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round"
                  d="M12 3c2.755 0 5.455.232 8.083.678.533.09.917.556.917 1.096v1.044a2.25 2.25 0 01-.659 1.591l-5.432 5.432a2.25 2.25 0 00-.659 1.591v2.927a2.25 2.25 0 01-1.244 2.013L9.75 21v-6.572a2.25 2.25 0 00-.659-1.591L3.659 7.409A2.25 2.25 0 013 5.818V4.774c0-.54.384-1.006.917-1.096A48.32 48.32 0 0112 3z"/>
        </svg>
        Filter Opsi
    </button>

    <div x-show="open" x-transition
         class="absolute mt-2 z-20 rounded-md bg-white shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none p-4 space-y-4
                    left-0 right-0
                    md:left-auto md:w-64">

        <div>
            <p class="text-sm font-semibold text-gray-700 mb-1">Role</p>
            <template x-for="role in ['Semua Peran', 'Admin', 'User']" :key="role">
                <label
                    class="block text-sm cursor-pointer rounded px-2 py-1"
                    {{-- PERUBAHAN 2: `:class` sekarang memeriksa properti Livewire via `$wire` --}}
                    :class="$wire.role === role ? 'bg-green-100 text-green-700 font-semibold' : 'text-gray-600 hover:bg-gray-100'">

                    {{-- PERUBAHAN 3: `wire:model` akan langsung mengubah properti di backend --}}
                    <input wire:model="role" type="radio" class="hidden" name="role" :value="role">
                    <span x-text="role"></span>
                </label>
            </template>
        </div>

        <div>
            <p class="text-sm font-semibold text-gray-700 mb-1">Status</p>
            <template x-for="status in ['Semua Status', 'Aktif', 'Tidak Aktif']" :key="status">
                <label
                    class="block text-sm cursor-pointer rounded px-2 py-1"
                    :class="$wire.status === status ? 'bg-green-100 text-green-700 font-semibold' : 'text-gray-600 hover:bg-gray-100'">
                    <input wire:model="status" type="radio" class="hidden" name="status" :value="status">
                    <span x-text="status"></span>
                </label>
            </template>
        </div>
    </div>
</div>
