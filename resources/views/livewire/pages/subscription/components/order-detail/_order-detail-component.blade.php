<div class="mt-8" wire:loading.class="opacity-50 transition-opacity">
    <div class="p-5 bg-green-50 border-l-4 border-green-500 rounded-r-lg">
        <h3 class="text-base font-semibold text-gray-800">Subscription Summary</h3>

        {{-- Tampilkan rincian hanya jika ada paket yang dipilih dan harga total lebih dari 0 --}}
        @if($planName && $totalPrice > 0)
            <dl class="mt-4 space-y-2 text-sm text-gray-700">
                {{-- Rincian Harga Paket --}}
                <div class="flex justify-between">
                    <dt class="font-medium text-gray-800">{{ $planName }}</dt>
                    <dd>Rp {{ number_format($planPrice, 0, ',', '.') }}</dd>
                </div>

                {{-- Rincian Tipe Makanan --}}
                <div class="flex justify-between">
                    <dt>Meal Types</dt>
                    <dd>x {{ $mealCount }}</dd>
                </div>

                {{-- Rincian Hari Pengiriman --}}
                <div class="flex justify-between">
                    <dt>Delivery Days</dt>
                    <dd>x {{ $dayCount }}</dd>
                </div>

                {{-- Pengali Mingguan --}}
                <div class="flex justify-between">
                    <dt>Weeks (Multiplier)</dt>
                    <dd>x 4.3</dd>
                </div>
            </dl>

            <hr class="my-3 border-green-200">

            {{-- Total Harga --}}
            <div class="flex items-center justify-between mt-3">
                <p class="text-lg font-bold text-gray-800">Total Estimate</p>
                <div>
                    <p class="text-2xl font-bold text-green-600 text-right">
                        Rp {{ number_format($totalPrice, 0, ',', '.') }}
                    </p>
                    <p class="text-xs font-medium text-gray-500 text-right">/ month</p>
                </div>
            </div>

        @else
            {{-- Pesan awal sebelum form diisi --}}
            <p class="mt-2 text-sm text-gray-600">
                Select a plan, meal types, and delivery days to see your monthly subscription price.
            </p>
        @endif
    </div>
</div>
