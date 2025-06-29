<div class="container mx-auto px-4 sm:px-6 lg:px-8">
    <!-- Heading -->
    <div class="mx-auto max-w-2xl text-center">
        <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">
            What Our Customers Say
        </h2>
        <p class="mt-4 text-lg leading-8 text-gray-600">
            Read reviews from customers who have experienced our healthy meal delivery service.
        </p>
    </div>


    <!-- Wrapper Card -->
    <div class="mx-auto max-w-6xl">
        <div class="mt-12 relative">

            <button id="prevBtn" class="absolute left-0 top-1/2 -translate-y-1/2 z-10 p-2 bg-white rounded-full shadow hidden">
                <svg class="w-5 h-5 text-gray-600 sm:w-6 sm:h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                </svg>
            </button>

            <button id="nextBtn" class="absolute right-0 top-1/2 -translate-y-1/2 z-10 p-2 bg-white rounded-full shadow hidden">
                <svg class="w-5 h-5 text-gray-600 sm:w-6 sm:h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                </svg>
            </button>

            <div id="carouselContainer" class="overflow-hidden px-12">
                <div id="carouselInner" class="flex transition-transform duration-500 ease-in-out -mx-3">
                    @foreach($this->testimonials as $testimonial)
                        <div class="w-full sm:w-1/2 lg:w-1/3 shrink-0 px-3">
                            <div class="flex h-full flex-col rounded-lg border border-gray-200/80 bg-white p-6 shadow-sm">
                                <div class="flex items-center gap-0.5 text-yellow-500">
                                    @for ($i = 0; $i < 5; $i++)
                                        @if ($i < $testimonial['rating'])
                                            <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" /></svg>
                                        @else
                                            <svg class="h-5 w-5 text-gray-300" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" /></svg>
                                        @endif
                                    @endfor
                                </div>
                                <p class="mt-4 text-gray-700 flex-grow">{{ $testimonial['quote'] }}</p>
                                <div class="mt-6 flex items-center pt-6 border-t border-gray-100">
                                    <div class="h-12 w-12 shrink-0 rounded-full bg-gray-200 flex items-center justify-center">
                                        <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 24 24"><path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/></svg>
                                    </div>
                                    <div class="ml-4">
                                        <p class="text-base font-bold text-gray-900">{{ $testimonial['name'] }}</p>
                                        <p class="text-sm text-gray-500">{{ $testimonial['location'] }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
