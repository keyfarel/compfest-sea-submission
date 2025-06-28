<div x-data="{ open: false }" class="relative">
    <label for="role" class="block text-sm font-semibold text-gray-700 mb-1">Peran</label>
    <button @click="open = !open" @click.outside="open = false" type="button"
            class="mt-1 relative w-full cursor-default rounded-lg bg-gray-50 py-2 pl-3 pr-10 text-left text-sm
                           border border-gray-200 shadow-sm focus:outline-none focus:ring-1 focus:ring-green-600 focus:border-green-600 transition">
        <span class="block truncate" x-text="$wire.editingUser.role"></span>
        <span class="pointer-events-none absolute inset-y-0 right-0 flex items-center pr-2">
                    <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                         fill="currentColor"><path fill-rule="evenodd"
                                                   d="M10 3a.75.75 0 01.55.24l3.25 3.5a.75.75 0 11-1.1 1.02L10 4.852 7.3 7.76a.75.75 0 01-1.1-1.02l3.25-3.5A.75.75 0 0110 3zm-3.76 9.24a.75.75 0 011.06.04l2.7 2.92 2.7-2.92a.75.75 0 111.12 1.04l-3.25 3.5a.75.75 0 01-1.12 0l-3.25-3.5a.75.75 0 01.04-1.06z"
                                                   clip-rule="evenodd"/>
                    </svg>
                </span>
    </button>
    <div x-show="open" x-transition
         class="absolute z-10 mt-1 max-h-60 w-full overflow-auto rounded-md bg-white py-1 text-base shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none"
         style="display: none;">
        <template x-for="roleOption in ['Admin', 'User']">
            <div @click="$wire.set('editingUser.role', roleOption); open = false"
                 :class="{ 'bg-green-100 text-green-900': $wire.editingUser.role === roleOption, 'text-gray-900': !($wire.editingUser.role === roleOption) }"
                 class="text-sm relative cursor-pointer select-none py-2 pl-10 pr-4 hover:bg-green-50">
                            <span class="block truncate"
                                  :class="{ 'font-semibold': $wire.editingUser.role === roleOption, 'font-normal': !($wire.editingUser.role === roleOption) }"
                                  x-text="roleOption"></span>
                <span x-show="$wire.editingUser.role === roleOption"
                      class="absolute inset-y-0 left-0 flex items-center pl-3 text-green-600">
                            <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                 fill="currentColor"><path fill-rule="evenodd"
                                                           d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.052-.143z"
                                                           clip-rule="evenodd"/>
                            </svg>
                        </span>
            </div>
        </template>
    </div>
</div>
