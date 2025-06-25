{{-- resources/views/components/menu/meal-plan-card.blade.php --}}

@props(['plan'])

<div
    @class([
        'relative flex flex-col bg-white rounded-xl overflow-hidden border border-gray-200/80 transition-shadow w-full max-w-[454px]',
        'shadow-lg hover:shadow-2xl' => !($plan['is_popular'] ?? false),
        'shadow-xl shadow-green-500/20 hover:shadow-2xl' => $plan['is_popular'] ?? false,
    ])>

    @if($plan['is_popular'] ?? false)
        {{-- [DIUBAH] Tambahkan border putih dan sedikit shadow pada badge --}}
        <div
            class="absolute top-4 right-4 bg-green-600 text-white text-xs font-bold px-3 py-1 rounded-full z-10 border-2 border-white shadow-sm">
            POPULAR
        </div>
    @endif

    <div class="bg-gray-100 h-48 flex items-center justify-center">
        {{-- Nanti bisa diganti dengan <img src="{{ $plan['image_url'] }}"> --}}
        <svg class="w-16 h-16 text-gray-300" xmlns="http://www.w3.org/2000/svg" fill="none"
             viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round"
                  d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 013.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 001.5-1.5V6a1.5 1.5 0 00-1.5-1.5H3.75A1.5 1.5 0 002.25 6v12a1.5 1.5 0 001.5 1.5zm10.5-11.25h.008v.008h-.008V8.25zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z"/>
        </svg>
        {{--        <img src="https://static.vecteezy.com/system/resources/thumbnails/023/596/959/small_2x/green-background-green-abstract-background-green-background-design-illustration-abstract-futuristic-background-green-gradient-background-website-background-free-vector.jpg"--}}
        {{--             alt="Meal Plan"--}}
        {{--             class="w-full h-full object-cover">--}}
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
            <a href="{{ $plan['details_url'] }}"
               class="btn bg-green-600 hover:bg-green-700 text-white border-none rounded-lg">See
                More Details</a>
            <a href="{{ $plan['subscribe_url'] }}"
               class="btn btn-outline border-gray-300 text-gray-700 hover:bg-gray-100 hover:border-gray-400 rounded-lg sm:order-first">Subscribe</a>
        </div>
    </div>
</div>
