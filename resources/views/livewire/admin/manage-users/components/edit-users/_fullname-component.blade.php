<div>
    <label for="name" class="block text-sm font-semibold text-gray-700 mb-1">Nama Lengkap </label>
    <div class="relative">
        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
            <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none"
                 viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round"
                      d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z"/>
            </svg>
        </div>
        <input type="text" id="name" wire:model.defer="editingUser.name" placeholder="Nama Lengkap"
               class="placeholder:text-sm mt-1 block w-full bg-gray-50 border-gray-200 rounded-lg shadow-sm
                          focus:outline-none focus:ring-1 focus:ring-green-600 focus:border-green-600
                          py-2 pl-10 pr-4 transition">
    </div>
    @error('editingUser.name')
    <div class="mt-1 text-sm text-red-600">{{ $message }}</div> @enderror
</div>
