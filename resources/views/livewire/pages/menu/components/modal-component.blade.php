<x-partials.modal wire:model="showDetailModal" title="{{ $selectedPlan['name'] }}">
    <div class="space-y-6">
        <div class="bg-gray-100 rounded-lg h-56 flex items-center justify-center overflow-hidden">
            <img src="{{ $selectedPlan['image_url'] }}"
                 alt="Meal Plan"
                 class="w-full h-full object-cover rounded-lg">
        </div>
        <div>
            <h4 class="font-semibold text-gray-800">Price</h4>
            <p class="text-2xl font-bold text-green-600 mt-1">
                {{ $selectedPlan['price_formatted'] }}/month
            </p>
        </div>

        @if(!empty($selectedPlan['long_description']))
            <div>
                <h4 class="font-semibold text-gray-800">Description</h4>
                <p class="mt-1 text-gray-600 leading-relaxed">{{ $selectedPlan['long_description'] }}</p>
            </div>
        @endif

        @if(!empty($selectedPlan['included_meals']))
            <div>
                <h4 class="font-semibold text-gray-800">Included Meals</h4>
                <ul class="mt-2 list-disc list-inside space-y-1 text-gray-600">
                    @foreach($selectedPlan['included_meals'] as $feature)
                        <li>{{ $feature }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if(!empty($selectedPlan['extra_features']))
            <div>
                <h4 class="font-semibold text-gray-800">Features</h4>
                <ul class="mt-2 list-disc list-inside space-y-1 text-gray-600">
                    @foreach($selectedPlan['extra_features'] as $feature)
                        <li>{{ $feature }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <x-slot:footer>
            <a href="{{ $selectedPlan['subscribe_url'] }}"
               class="btn bg-green-600 hover:bg-green-700 text-white border-none rounded-lg w-full sm:w-auto sm:px-8">
                Subscribe to Plan
            </a>
        </x-slot:footer>
    </div>

</x-partials.modal>
