{{-- resources/views/livewire/pages/subscription/components/create-subscription/_delivery-days.blade.php --}}

<div class="mt-8" x-data="{
    deliveryDays: @entangle('deliveryDays').live,
    // 1. Ambil SEMUA ID delivery days dari database
    allDayIds: {{ $allDeliveryDays->pluck('id')->toJson() }},

    // 2. Logika 'get' membandingkan panjang array
    get isAllSelected() {
        return this.deliveryDays.length === this.allDayIds.length;
    },

    // 3. Logika 'set' mengisi dengan SEMUA ID jika dicentang
    set isAllSelected(value) {
        this.deliveryDays = value ? [...this.allDayIds] : [];
    }
}">
    <h2 class="text-lg font-bold text-gray-800">Delivery Days <span class="text-red-500">*</span></h2>
    <p class="text-sm text-gray-500 mt-1">Pilih hari pengantaran. Centang <strong>One Week</strong> jika ingin kirim
        setiap hari.</p>

    <div class="mt-4 grid grid-cols-2 sm:grid-cols-4 gap-3">
        @foreach ($allDeliveryDays as $deliveryDay)
            <label
                class="flex items-center p-3 border rounded-lg cursor-pointer transition-all duration-200 ease-in-out hover:border-green-400 hover:shadow-sm"
                :class="{ 'border-green-500 bg-green-50 scale-[1.02] shadow-sm': deliveryDays.includes({{ $deliveryDay->id }}), 'border-gray-300': !deliveryDays.includes({{ $deliveryDay->id }}) }">
                <input
                    type="checkbox"
                    x-model="deliveryDays"
                    value="{{ $deliveryDay->id }}"
                    class="h-4 w-4 rounded text-green-600 border-gray-300 focus:ring-green-500"
                >
                <span class="ml-2 text-sm text-gray-700 capitalize">{{ $deliveryDay->name }}</span>
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
            <span class="ml-2 text-sm text-gray-700">One Week (7 Hari)</span>
        </label>
    </div>
    @error('deliveryDays') <span class="text-sm text-red-500 mt-2 block">{{ $message }}</span> @enderror
</div>
