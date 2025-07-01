{{-- resources/views/livewire/pages/subscription/components/create-subscription/_meal-types.blade.php --}}

<div class="mt-8" x-data="{
    mealTypes: @entangle('mealTypes').live,
    // 1. Ambil SEMUA ID meal types dari database dan jadikan array untuk Alpine
    allMealTypeIds: {{ $allMealTypes->pluck('id')->toJson() }},

    // 2. Logika 'get' sekarang membandingkan panjang array
    get isAllSelected() {
        return this.mealTypes.length === this.allMealTypeIds.length;
    },

    // 3. Logika 'set' sekarang mengisi array dengan SEMUA ID jika dicentang
    set isAllSelected(value) {
        this.mealTypes = value ? [...this.allMealTypeIds] : [];
    }
}">
    <h2 class="text-lg font-bold text-gray-800">Meal Types <span class="text-red-500">*</span></h2>
    <p class="text-sm text-gray-500 mt-1">Pilih jenis makanan. Centang <strong>All Meals</strong> jika ingin memilih
        semua.</p>

    <div class="mt-4 grid grid-cols-2 sm:grid-cols-3 gap-3">
        @foreach ($allMealTypes as $mealType)
            <label
                class="flex items-center p-3 border rounded-lg cursor-pointer transition-all duration-200 ease-in-out hover:border-green-400 hover:shadow-sm"
                :class="{ 'border-green-500 bg-green-50 scale-[1.02] shadow-sm': mealTypes.includes({{ $mealType->id }}), 'border-gray-300': !mealTypes.includes({{ $mealType->id }}) }">
                <input type="checkbox" x-model="mealTypes" value="{{ $mealType->id }}"
                       class="h-4 w-4 rounded text-green-600 border-gray-300 focus:ring-green-500">
                <span class="ml-3 text-sm text-gray-700">{{ $mealType->name }}</span>
            </label>
        @endforeach

        <label
            class="flex items-center p-3 border rounded-lg cursor-pointer transition-all duration-200 ease-in-out hover:border-green-400 hover:shadow-sm"
            :class="{ 'border-green-500 bg-green-50 scale-[1.02] shadow-sm': isAllSelected, 'border-gray-300': !isAllSelected }">
            <input
                type="checkbox"
                x-model="isAllSelected"
                class="h-4 w-4 rounded text-green-600 border-gray-300 focus:ring-green-500"
            />
            <span class="ml-3 text-sm text-gray-700">All Meals</span>
        </label>
    </div>

    @error('mealTypes')
    <span class="text-sm text-red-500 mt-2 block">{{ $message }}</span>
    @enderror
</div>
