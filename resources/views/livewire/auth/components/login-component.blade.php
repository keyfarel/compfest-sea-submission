<div class="w-full max-w-md bg-white p-8 sm:p-10 rounded-2xl shadow-sm border border-gray-150">

    @include('livewire.auth.components.partials.login._title')

    @error('credentials')
    <div class="p-3 my-4 text-sm text-red-700 bg-red-100 rounded-lg" role="alert">
        {{ $message }}
    </div>
    @enderror

    <form wire:submit.prevent="login" class="mt-6 space-y-5">
        @include('livewire.auth.components.partials.login._email-field')
        @include('livewire.auth.components.partials.login._password-field')
        @include('livewire.auth.components.partials.login._submit-button')
    </form>

    @include('livewire.auth.components.partials.login._redirect-register')
</div>
