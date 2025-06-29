<div
    @class([
        'relative flex flex-col bg-white rounded-xl overflow-hidden border border-gray-200/80 transition-shadow w-full max-w-[454px]',
        'shadow-lg hover:shadow-2xl' => !($plan['is_popular'] ?? false),
        'shadow-xl shadow-green-500/20 hover:shadow-2xl' => $plan['is_popular'] ?? false,
    ])>

    @if($plan['is_popular'] ?? false)
        <div
            class="absolute top-4 right-4 bg-green-600 text-white text-xs font-bold px-3 py-1 rounded-full z-10 border-2 border-white shadow-sm">
            POPULAR
        </div>
    @endif

    <div class="bg-gray-100 h-48 flex items-center justify-center">
        <img src="{{ $plan['image_url'] }}"
             alt="Meal Plan"
             class="w-full h-full object-cover">
    </div>

    <div class="p-5 flex-grow flex flex-col">
        <h3 class="text-xl font-bold text-gray-900">{{ $plan['name'] }}</h3>
        <p class="mt-2 text-sm text-gray-600">{{ $plan['description'] }}</p>

        <div class="mt-4">
            <p class="text-3xl font-bold text-green-600">
                {{ $plan['price_formatted'] }}<span class="text-base font-medium text-gray-500">/month</span>
            </p>
        </div>

        <ul class="mt-4 space-y-3 text-sm text-gray-700 flex-grow">
            @foreach($plan['features'] as $feature)
                <li class="flex items-center gap-3">
                    <svg class="w-5 h-5 text-green-500 flex-shrink-0" xmlns="http://www.w3.org/2000/svg"
                         fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5"/>
                    </svg>
                    <span>{{ $feature }}</span>
                </li>
            @endforeach
        </ul>

        <div class="mt-6 flex flex-col sm:flex-row sm:justify-between gap-3">
            <button type="button"
                    wire:click="showPlanDetails({{ $plan['id'] }})"
                    class="btn bg-green-600 hover:bg-green-700 text-white border-none rounded-lg">
                See More Details
            </button>
            <a href="{{ $plan['subscribe_url'] }}"
               class="btn btn-outline border-gray-300 text-gray-700 hover:bg-gray-100 hover:border-gray-400 rounded-lg">Subscribe</a>
        </div>
    </div>
</div>
