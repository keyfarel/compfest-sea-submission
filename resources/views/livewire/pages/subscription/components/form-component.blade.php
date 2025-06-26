<div class="max-w-4xl mx-auto p-4 sm:p-6">
    <form wire:submit.prevent="submit">
        @if (session()->has('success'))
            <div class="p-4 mb-6 text-green-800 bg-green-100 border border-green-200 rounded-lg">
                {{ session('success') }}
            </div>
        @endif

        <!-- Personal Information Card -->
        @include('livewire.pages.subscription.components.partials.form._personal-information')

        <!-- Meal Plan Selection Card -->
        @include('livewire.pages.subscription.components.partials.form._plan-selection')

        <!-- Meal Types Selection Card -->
        @include('livewire.pages.subscription.components.partials.form._meal-types')

        <!-- Delivery Days Selection Card -->
        @include('livewire.pages.subscription.components.partials.form._delivery-days')

        <!-- Allergies or Dietary Restrictions Card -->
        @include('livewire.pages.subscription.components.partials.form._allergies')

        <!-- Order Detail Card -->
        <div wire:key="order-detail-wrapper">
            @livewire('pages.subscription.components.order-detail-component')
        </div>

            <!-- Subscribe Now Button -->
            <div class="mt-8">
                <button type="submit" wire:loading.attr="disabled"
                        class="w-full bg-green-600 text-white font-bold py-3 px-6 rounded-lg hover:bg-green-700 transition-colors disabled:opacity-70">
                    <span wire:loading.remove wire:target="submit">Subscribe Now</span>
                    <span wire:loading wire:target="submit">Processing...</span>
                </button>
            </div>
    </form>
</div>
