<x-slot:title>
    Riwayat Langganan
</x-slot:title>

<div>
    <div class="space-y-8">
        @include('livewire.user.history-subscribe.components._header-component')

        @if($subscriptions->isNotEmpty())
            @include('livewire.user.history-subscribe.components._mobile-card-component')
            @include('livewire.user.history-subscribe.components._desktop-card-component')

            @if ($subscriptions->hasPages())
                <div class="px-5 py-5 bg-white border-t rounded-b-lg shadow-md lg:shadow-none">
                    {{ $subscriptions->links() }}
                </div>
            @endif

        @else
            @include('livewire.user.history-subscribe.components._empty-card-component')
        @endif

    </div>
    @include('livewire.user.history-subscribe.components._modal-show-component')
</div>
