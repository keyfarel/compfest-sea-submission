<div>
    <label for="email" class="block text-sm font-semibold text-gray-700 mb-1">Email <span
            class="text-red-500">*</span></label>
    <div class="relative">
        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
            <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                 fill="currentColor">
                <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"/>
                <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"/>
            </svg>
        </div>
        <input type="email" id="email" wire:model="email" placeholder="contoh@email.com" required
               class="placeholder:text-sm mt-2 block w-full bg-gray-50 border-gray-200 rounded-md shadow-sm focus:outline-none
                  focus:ring-[1px]
                  focus:ring-green-600
                  focus:border-green-600 py-2.5 pl-10 pr-4 transition">
    </div>
    @error('email')
    <div class="mt-1 text-sm text-red-600">{{ $message }}</div>
    @enderror
</div>
