<x-slot:title>
    User Dashboard
</x-slot:title>

<div>
    <div class="space-y-8">
        @include('livewire.user.components._header-component')
        @include('livewire.user.components._info-card-component')
        @include('livewire.user.components._card-component')
    </div>

    @include('livewire.user.components._modal-paused-component')
</div>
