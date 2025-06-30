<section class="bg-white py-16 sm:py-24">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="mx-auto max-w-2xl text-center">
            <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">
                What Our Customers Say
            </h2>
            <p class="mt-4 text-lg leading-8 text-gray-600">
                Read reviews from our top-rated customers who have experienced our healthy meal delivery service.
            </p>
        </div>

        <div class="mx-auto mt-16 max-w-7xl">
            <div class="grid grid-cols-1 gap-y-12 sm:grid-cols-2 sm:gap-x-6 lg:grid-cols-3 lg:gap-x-8 lg:gap-y-0">

                @foreach($this->testimonials as $testimonial)
                    <div class="flex h-full flex-col rounded-lg border border-gray-200/80 bg-white p-6 shadow-sm">
                        <div class="flex items-center gap-0.5 text-yellow-400">
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
                @endforeach

            </div>

            <div class="mt-16 text-center">
                <a href="{{ route('testimoni') }}" class="inline-block rounded-md bg-green-600 px-4 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-green-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                    View All Testimonials
                </a>
               </div>
        </div>
    </div>
</section>
