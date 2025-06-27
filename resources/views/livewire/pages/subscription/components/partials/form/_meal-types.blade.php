<div class="mt-8" x-data="{
    mealTypes: @entangle('mealTypes'),
    allMeals: ['breakfast', 'lunch', 'dinner'],
    get isAllMealsSelected() {
        return this.allMeals.every(meal => this.mealTypes.includes(meal));
    },
    set isAllMealsSelected(value) {
        this.mealTypes = value ? [...this.allMeals] : [];
    }
}">
    <h2 class="text-lg font-bold text-gray-800">Meal Types <span class="text-red-500">*</span></h2>
    <p class="text-sm text-gray-500 mt-1">Pilih jenis makanan. Centang <strong>All Meals</strong> jika ingin memilih semua (Sarapan, Makan Siang, dan Makan Malam).</p>

    <div class="mt-4 grid grid-cols-2 sm:grid-cols-3 gap-3">
        <!-- Individual Meal Options -->
        @foreach(['Breakfast', 'Lunch', 'Dinner'] as $type)
            @php $value = strtolower($type); @endphp
            <label
                class="flex items-center p-3 border rounded-lg cursor-pointer transition-all duration-200 ease-in-out hover:border-green-400 hover:shadow-sm"
                :class="{ 'border-green-500 bg-green-50 scale-[1.02] shadow-sm': mealTypes.includes('{{ $value }}'), 'border-gray-300': !mealTypes.includes('{{ $value }}') }">
                <input type="checkbox" x-model="mealTypes" value="{{ $value }}"
                       class="h-4 w-4 rounded text-green-600 border-gray-300 focus:ring-green-500">
                <span class="ml-3 text-sm text-gray-700">{{ $type }}</span>
            </label>
        @endforeach

        <!-- All Meals Option -->
        <label
            class="flex items-center p-3 border rounded-lg cursor-pointer transition-all duration-200 ease-in-out hover:border-green-400 hover:shadow-sm"
            :class="{ 'border-green-500 bg-green-50 scale-[1.02] shadow-sm': isAllMealsSelected, 'border-gray-300': !isAllMealsSelected }">
            <input
                type="checkbox"
                x-model="isAllMealsSelected"
                class="h-4 w-4 rounded text-green-600 border-gray-300 focus:ring-green-500"
            />
            <span class="ml-3 text-sm text-gray-700">All Meals</span>
        </label>
    </div>

    @error('mealTypes')
    <span class="text-sm text-red-500 mt-2 block">{{ $message }}</span>
    @enderror
</div>
