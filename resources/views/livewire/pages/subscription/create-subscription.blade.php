<section class="bg-white py-12 sm:py-16">
    <div class="max-w-4xl mx-auto p-4 sm:p-6">
        <form wire:submit.prevent="submit">
            @include('livewire.pages.subscription.components.create-subscription._personal-information')
            @include('livewire.pages.subscription.components.create-subscription._plan-selection')
            @include('livewire.pages.subscription.components.create-subscription._meal-types')
            @include('livewire.pages.subscription.components.create-subscription._delivery-days')
            @include('livewire.pages.subscription.components.create-subscription._allergies')
            <div wire:key="order-detail-wrapper">
                @livewire('pages.subscription.order-detail')
            </div>

            <div class="mt-8">
                @if (session()->has('success'))
                    <div class="p-4 mb-4 text-green-800 bg-green-100 border-l-4 border-green-500 rounded-r-lg"
                         role="alert">
                        <p class="font-bold">Success</p>
                        <p>{{ session('success') }}</p>
                    </div>
                @elseif (session()->has('error'))
                    <div class="p-4 mb-4 text-red-800 bg-red-100 border-l-4 border-red-500 rounded-r-lg" role="alert">
                        <p class="font-bold">Error</p>
                        <p>{{ session('error') }}</p>
                    </div>
                @elseif (session()->has('info'))
                    <div class="p-4 mb-4 text-blue-800 bg-blue-100 border-l-4 border-blue-500 rounded-r-lg"
                         role="alert">
                        <p class="font-bold">Info</p>
                        <p>{{ session('info') }}</p>
                    </div>
                @endif
                <div class="mt-8">
                    <button type="submit"
                            class="w-full bg-green-600 text-white font-bold py-3 px-6 rounded-lg hover:bg-green-700 transition duration-300 ease-in-out disabled:opacity-50"
                            wire:loading.attr="disabled">
                        <span wire:loading.remove wire:target="submit">Subscribe Now</span>
                        <span wire:loading wire:target="submit">Processing...</span>
                    </button>
                </div>
        </form>
    </div>
</section>

@push('css')
    <style>
        /* Style untuk checkbox agar lebih modern */
        input[type="checkbox"]:checked {
            accent-color: #16a34a; /* green-600 */
        }
    </style>
@endpush
