<div class="space-y-4">
    <h2 class="text-xl font-bold text-gray-800">Personal Information</h2>
    <div>
        <label for="fullName" class="block text-sm font-medium text-gray-700">Full Name <span
                class="text-red-500">*</span></label>
        <input type="text" id="fullName" wire:model.defer="fullName"
               oninput="this.value = this.value.replace(/[0-9]/g, '')"
               class="mt-1 block w-full border border-gray-400 rounded-md shadow-sm focus:outline-none focus:ring-[1px] focus:ring-green-500 focus:border-green-500 py-2 px-4"
               placeholder="e.g., John Doe">
        @error('fullName') <span class="text-sm text-red-500 mt-1">{{ $message }}</span> @enderror
    </div>
    <div>
        <label for="phoneNumber" class="block text-sm font-medium text-gray-700">Phone Number <span
                class="text-red-500">*</span></label>
        <input type="tel" id="phoneNumber" inputmode="numeric" pattern="[0-9]*" wire:model.defer="phoneNumber"
               oninput="this.value = this.value.replace(/[^0-9]/g, '')"
               class="mt-1 block w-full border border-gray-400 rounded-md shadow-sm focus:outline-none focus:ring-[1px] focus:ring-green-500 focus:border-green-500 py-2 px-4"
               placeholder="e.g., 08123456789">
        @error('phoneNumber') <span class="text-sm text-red-500 mt-1">{{ $message }}</span> @enderror
    </div>
</div>
