<div class="mt-8" x-data="{
    deliveryDays: @entangle('deliveryDays'),
    allDays: ['monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday'],
    get isAllSelected() {
        return this.allDays.every(day => this.deliveryDays.includes(day));
    },
    set isAllSelected(value) {
        this.deliveryDays = value ? [...this.allDays] : [];
    }
}">
    <h2 class="text-lg font-bold text-gray-800">Delivery Days <span class="text-red-500">*</span></h2>
    <p class="text-sm text-gray-500 mt-1">Pilih hari pengantaran. Centang <strong>One Week</strong> jika ingin kirim setiap hari (Senin–Minggu).</p>

    <div class="mt-4 grid grid-cols-2 sm:grid-cols-4 gap-3">
        <!-- Individual Day Options -->
        @foreach (['monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday'] as $day)
            <label
                class="flex items-center p-3 border rounded-lg cursor-pointer transition-all duration-200 ease-in-out hover:border-green-400 hover:shadow-sm"
                :class="{ 'border-green-500 bg-green-50 scale-[1.02] shadow-sm': deliveryDays.includes('{{ $day }}'), 'border-gray-300': !deliveryDays.includes('{{ $day }}') }">
                <input
                    type="checkbox"
                    x-model="deliveryDays"
                    value="{{ $day }}"
                    class="h-4 w-4 rounded text-green-600 border-gray-300 focus:ring-green-500"
                >
                <span class="ml-2 text-sm text-gray-700 capitalize">{{ $day }}</span>
            </label>
        @endforeach

        <!-- All Week Option -->
        <label
            class="flex items-center p-3 border rounded-lg cursor-pointer transition-all duration-200 ease-in-out hover:border-green-400 hover:shadow-sm"
            :class="{ 'border-green-500 bg-green-50 scale-[1.02] shadow-sm': isAllSelected, 'border-gray-300': !isAllSelected }">

            <input
                type="checkbox"
                x-model="isAllSelected"
                class="h-4 w-4 rounded text-green-600 border-gray-300 focus:ring-green-500"
            />
            <span class="ml-2 text-sm text-gray-700">One Week (7 Hari)</span>
        </label>
    </div>
    @error('deliveryDays') <span class="text-sm text-red-500 mt-2 block">{{ $message }}</span> @enderror
</div>
