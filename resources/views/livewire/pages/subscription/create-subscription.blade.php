<section class="bg-white py-12 sm:py-16">
    <div class="max-w-4xl mx-auto p-4 sm:p-6">
        <form wire:submit.prevent="submit">
            @if (session()->has('success'))
                <div class="p-4 mb-6 text-green-800 bg-green-100 border border-green-200 rounded-lg">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Personal Information Card -->
            @include('livewire.pages.subscription.components.create-subscription._personal-information')

            <!-- Meal Plan Selection Card -->
            @include('livewire.pages.subscription.components.create-subscription._plan-selection')

            <!-- Meal Types Selection Card -->
            @include('livewire.pages.subscription.components.create-subscription._meal-types')

            <!-- Delivery Days Selection Card -->
            @include('livewire.pages.subscription.components.create-subscription._delivery-days')

            <!-- Allergies or Dietary Restrictions Card -->
            @include('livewire.pages.subscription.components.create-subscription._allergies')

            <!-- Order Detail Card -->
            <div wire:key="order-detail-wrapper">
                @livewire('pages.subscription.order-detail')
            </div>

            <!-- Subscribe Now Button -->
            <div class="mt-8">
                {{-- Tombol ini akan tetap lebar penuh di desktop --}}
                <x-utils.buttons.save-button-cta wireClick="submit" target="submit" type="submit">
                    <span wire:loading.remove wire:target="submit">Subscribe Now</span>
                    <span wire:loading wire:target="submit">Processing...</span>
                </x-utils.buttons.save-button-cta>
            </div>
        </form>
    </div>

</section>

@push('css')
    <style>
        input[type="checkbox"]:checked {
            accent-color: #16a34a;
        }
    </style>
@endpush
