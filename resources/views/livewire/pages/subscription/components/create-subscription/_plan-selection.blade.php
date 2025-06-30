{{-- Ganti baris ini --}}
<div class="mt-8"
     x-data="{ selectedPlan: @entangle('selectedPlan') }">

    {{-- Menjadi seperti ini --}}
    <div class="mt-8"
         x-data="{ selectedPlan: @entangle('selectedPlan').live }">

        {{-- Kode Anda yang lain di dalam file ini sudah benar dan tidak perlu diubah. --}}
        {{-- Logika @click Anda akan secara otomatis memicu pembaruan ke server --}}
        {{-- berkat .live pada @entangle. --}}

        <h2 class="text-lg font-bold text-gray-800">Plan Selection <span class="text-red-500">*</span></h2>
        <div class="mt-4 grid grid-cols-1 md:grid-cols-3 gap-4">
            @foreach ($plans as $id => $plan)
                <label
                    class="relative flex flex-col p-4 border rounded-lg cursor-pointer transform transition-all duration-300 ease-in-out"
                    :class="{ 'border-green-500 ring-[1px] ring-green-500 shadow-lg -translate-y-1 md:translate-y-0 md:scale-105': selectedPlan === '{{ $id }}', 'border-gray-300': selectedPlan !== '{{ $id }}' }"
                    @click.prevent="selectedPlan = (selectedPlan === '{{ $id }}') ? '' : '{{ $id }}'">

                    <input type="radio"
                           name="plan"
                           value="{{ $id }}"
                           class="sr-only"
                           :checked="selectedPlan === '{{ $id }}'">

                    <h3 class="text-base font-semibold text-gray-800">{{ $plan['name'] }}</h3>
                    <p class="mt-1 text-sm text-gray-600 flex-grow">{{ $plan['description'] }}</p>
                    <p class="mt-3 text-lg font-bold text-green-600">Rp {{ number_format($plan['price']) }}/meal</p>
                </label>
            @endforeach
        </div>
        @error('selectedPlan') <span class="text-sm text-red-500 mt-2 block">{{ $message }}</span> @enderror
    </div>
