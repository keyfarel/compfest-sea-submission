<div class="mt-8" x-data="{ deliveryDays: @entangle('deliveryDays') }">
    <h2 class="text-lg font-bold text-gray-800">Delivery Days <span class="text-red-500">*</span></h2>
    <div class="mt-4 grid grid-cols-2 sm:grid-cols-4 gap-3">
        @foreach (['monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday'] as $day)
            <label
                class="flex items-center p-3 border rounded-lg cursor-pointer transition-all duration-200 ease-in-out hover:border-green-400 hover:shadow-sm"
                {{-- Gunakan :class Alpine dengan pengecekan 'includes' untuk array --}}
                :class="{ 'border-green-500 bg-green-50 scale-[1.02] shadow-sm': deliveryDays.includes('{{ $day }}'), 'border-gray-300': !deliveryDays.includes('{{ $day }}') }">

                {{-- Ubah wire:model.live menjadi x-model untuk interaksi instan --}}
                <input type="checkbox" x-model="deliveryDays" value="{{ $day }}"
                       class="h-4 w-4 rounded text-green-600 border-gray-300 focus:ring-green-500">
                <span class="ml-2 text-sm text-gray-700 capitalize">{{ $day }}</span>
            </label>
        @endforeach
    </div>
    @error('deliveryDays') <span class="text-sm text-red-500 mt-2 block">{{ $message }}</span> @enderror
</div>
