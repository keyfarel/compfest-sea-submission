<div class="w-full max-w-md bg-white p-8 sm:p-10 rounded-2xl shadow-sm border border-gray-150">

    @include('livewire.auth.login.components._title-component')

    @error('credentials')
    <div class="p-3 my-4 text-sm text-red-700 bg-red-100 rounded-lg" role="alert">
        {{ $message }}
    </div>
    @enderror

    <form wire:submit.prevent="login" class="mt-6 space-y-5">
        @include('livewire.auth.login.components._email-component')
        @include('livewire.auth.login.components._password-component')
        @include('livewire.auth.login.components._button-component')
    </form>

    @include('livewire.auth.login.components._redirect-component')
</div>
