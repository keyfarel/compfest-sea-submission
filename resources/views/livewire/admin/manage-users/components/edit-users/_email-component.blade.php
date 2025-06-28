<div>
    <label for="email" class="block text-sm font-semibold text-gray-700 mb-1">Email </label>
    <div class="relative">
        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
            <svg class="w-5 h-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none"
                 viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round"
                      d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75"/>
            </svg>
        </div>
        <input type="email" id="email" wire:model.defer="editingUser.email" placeholder="contoh@email.com"
               required
               class="placeholder:text-sm mt-1 block w-full bg-gray-50 border-gray-200 rounded-lg shadow-sm
                          focus:outline-none focus:ring-1 focus:ring-green-600 focus:border-green-600
                          py-2 pl-10 pr-4 transition">
    </div>
    @error('editingUser.email')
    <div class="mt-1 text-sm text-red-600">{{ $message }}</div> @enderror
</div>
