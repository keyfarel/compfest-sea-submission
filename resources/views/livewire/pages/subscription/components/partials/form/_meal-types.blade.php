<div class="mt-8" x-data="{ mealTypes: @entangle('mealTypes') }">
    <h2 class="text-lg font-bold text-gray-800">Meal Types <span class="text-red-500">*</span></h2>
    <div class="mt-4 grid grid-cols-2 sm:grid-cols-3 gap-3">
        @foreach(['Breakfast', 'Lunch', 'Dinner'] as $type)
            @php $value = strtolower($type); @endphp
            <label
                class="flex items-center p-3 border rounded-lg cursor-pointer transition-all duration-200 ease-in-out hover:border-green-400 hover:shadow-sm"
                {{-- Gunakan :class Alpine dengan pengecekan 'includes' untuk array --}}
                :class="{ 'border-green-500 bg-green-50 scale-[1.02] shadow-sm': mealTypes.includes('{{ $value }}'), 'border-gray-300': !mealTypes.includes('{{ $value }}') }">

                {{-- Ubah wire:model.live menjadi x-model untuk interaksi instan --}}
                <input type="checkbox" x-model="mealTypes" value="{{ $value }}"
                       class="h-4 w-4 rounded text-green-600 border-gray-300 focus:ring-green-500">
                <span class="ml-3 text-sm text-gray-700">{{ $type }}</span>
            </label>
        @endforeach
    </div>
    @error('mealTypes') <span class="text-sm text-red-500 mt-2 block">{{ $message }}</span> @enderror
</div>
