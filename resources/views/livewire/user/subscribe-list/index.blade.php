<x-slot:title>
    User Dashboard
</x-slot:title>

<div>
    <div class="space-y-8">
        @include('livewire.user.subscribe-list.components._header-component')
        @include('livewire.user.subscribe-list.components._card-component')

    </div>
    @include('livewire.user.subscribe-list.components._modal-paused-component')
</div>
