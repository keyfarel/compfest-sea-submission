{{-- Formulir Testimoni --}}
<div class="w-full bg-white rounded-lg border border-gray-200 p-6 shadow-sm">
    <h2 class="text-xl font-semibold text-gray-900 mb-6">Share Your Experience</h2>

    {{-- Pesan Sukses --}}
    @if (session('success'))
        <div class="mb-4 p-4 bg-green-100 border border-green-200 text-green-700 rounded-md">
            {{ session('success') }}
        </div>
    @endif

    {{-- Pesan Info --}}
    @if (session('info'))
        <div class="mb-4 p-4 bg-blue-100 border border-blue-200 text-blue-700 rounded-md">
            {{ session('info') }}
        </div>
    @endif

    {{-- Pesan Error --}}
    @if (session('error'))
        <div class="mb-4 p-4 bg-red-100 border border-red-200 text-red-700 rounded-md">
            {{ session('error') }}
        </div>
    @endif

    <form wire:submit="save">

        {{-- Name --}}
        <div class="mb-4">
            <label for="name" class="block text-sm font-medium text-gray-700">Name <span
                    class="text-red-500">*</span></label>
            <input type="text" id="name"
                   wire:model="name"
                   readonly
                   class="mt-1 w-full rounded-md border-gray-200 bg-gray-100 px-4 py-2 text-gray-600 focus:outline-none focus:ring-0 cursor-not-allowed">
            @error('name') <span class="text-sm text-red-500 mt-1">{{ $message }}</span> @enderror
        </div>

        {{-- Location --}}
        <div class="mb-4">
            <label for="location" class="block text-sm font-medium text-gray-700">Location</label>
            <input type="text" id="location"
                   wire:model.live.debounce.300ms="location" {{-- DIUBAH --}}
                   placeholder="City (optional)"
                   class="mt-1 w-full rounded-md border border-gray-300 px-4 py-2 focus:ring focus:ring-green-200 focus:outline-none">
            @error('location') <span class="text-sm text-red-500 mt-1">{{ $message }}</span> @enderror
        </div>

        {{-- Rating --}}
        <div class="mb-4">
            <label for="rating" class="block text-sm font-medium text-gray-700">Rating <span
                    class="text-red-500">*</span></label>

            <div x-data="{ rating: @entangle('rating').live, hoverRating: 0 }"
            x-cloak
                 @mouseleave="hoverRating = 0"
                 class="flex items-center space-x-1 mt-1">

                @for ($i = 1; $i <= 5; $i++)
                    <svg
                        @mouseenter="hoverRating = {{ $i }}"
                        @click="rating = {{ $i }};"
                        class="w-6 h-6 cursor-pointer"
                        :class="(hoverRating >= {{ $i }}) || (rating >= {{ $i }}) ? 'text-yellow-400' : 'text-gray-300'"
                        fill="currentColor"
                        viewBox="0 0 20 20">
                        <path
                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                    </svg>
                @endfor
            </div>
            @error('rating') <span class="text-sm text-red-500 mt-1">{{ $message }}</span> @enderror
        </div>

        {{-- Review --}}
        <div class="mb-6" x-data="{ count: @js($this->review).length }">
            <div class="flex justify-between items-center">
                <label for="review" class="block text-sm font-medium text-gray-700">Review <span
                        class="text-red-500">*</span></label>
                <p class="text-sm text-gray-500">
                    <span x-text="count"></span> / 150
                </p>
            </div>
            <textarea
                id="review"
                wire:model.live.debounce.300ms="review"
                @input="count = $event.target.value.length"
                rows="4"
                maxlength="150"
                placeholder="Share your experience with SEA Catering"
                class="mt-1 w-full rounded-md border border-gray-300 px-4 py-2 resize-y focus:ring focus:ring-green-200 focus:outline-none"
            ></textarea>
            @error('review') <span class="text-sm text-red-500 mt-1">{{ $message }}</span> @enderror
        </div>

        <x-utils.buttons.save-button-cta
            type="submit"
            size="small"
            target="save"
        >
            Submit Review
        </x-utils.buttons.save-button-cta>
    </form>
</div>
