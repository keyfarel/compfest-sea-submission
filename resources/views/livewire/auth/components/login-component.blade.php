@include('livewire.auth.components.partials.login._title')

{{-- TAMBAHKAN INI: Untuk menampilkan error jika login gagal --}}
@error('email')
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
