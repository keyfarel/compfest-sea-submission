<div x-data="{ showPassword: false }">
    <label for="password" class="block text-sm font-semibold text-gray-700">
        Password <span class="text-red-500">*</span>
    </label>

    <div class="relative">
        <!-- Icon Lock di kiri -->
        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
            <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd"
                      d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z"
                      clip-rule="evenodd" />
            </svg>
        </div>

        <!-- Input -->
        <input :type="showPassword ? 'text' : 'password'" id="password" wire:model="password"
               placeholder="Masukkan password" required
               class="placeholder:text-sm mt-2 block w-full bg-gray-50 border-gray-200 rounded-md shadow-sm focus:outline-none
                  focus:ring-[1px]
                  focus:ring-green-600
                  focus:border-green-600 py-2.5 pl-10 pr-10 transition" />

        <!-- Eye toggle button -->
        <button type="button"
                @click="showPassword = !showPassword"
                class="absolute inset-y-0 right-0 pr-3 flex items-center justify-center text-gray-500 focus:outline-none"
                style="height: 100%;">

            <!-- Icon mata tertutup -->
            <svg x-show="!showPassword" class="h-5 w-5 block" fill="none" stroke="currentColor"
                 viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round"
                      d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                <path stroke-linecap="round" stroke-linejoin="round"
                      d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7
              -1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
            </svg>

            <!-- Icon mata terbuka -->
            <svg x-show="showPassword" class="h-5 w-5 block" fill="none" stroke="currentColor"
                 viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round"
                      d="M13.875 18.825A10.05 10.05 0 0112 19
              c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029
              m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M3 3l18 18" />
            </svg>
        </button>
    </div>
    @error('password')
    <div class="mt-1 text-sm text-red-600">{{ $message }}</div>
    @enderror
</div>
