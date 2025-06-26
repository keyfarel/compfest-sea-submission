<div class="mt-8" wire:loading.class="opacity-50 transition-opacity">
    <div class="p-5 bg-green-50 border-l-4 border-green-500 rounded-r-lg">
        <h3 class="text-base font-semibold text-gray-800">Subscription Summary</h3>

        @if($totalPrice > 0)
            <p class="mt-2 text-sm text-gray-700">
                Your estimated monthly subscription price is:
            </p>
            <p class="mt-2 text-2xl font-bold text-green-600">
                Rp {{ number_format($totalPrice, 0, ',', '.') }}
                <span class="text-sm font-medium text-gray-500">/ month</span>
            </p>
        @else
            <p class="mt-2 text-gray-600 text-sm">Select a plan, meal types, and delivery days to see your monthly subscription price.</p>
        @endif
    </div>
</div>
