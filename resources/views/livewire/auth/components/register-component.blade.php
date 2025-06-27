<div class="w-full max-w-md bg-white p-8 sm:p-10 rounded-2xl shadow-sm border border-gray-200">

    <div>
        {{-- Pesan Sukses (Hijau) --}}
        @if (session('success'))
            <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-100" role="alert">
                <span class="font-medium">Berhasil!</span> {{ session('success') }}
            </div>
        @endif

        {{-- Pesan Gagal/Error (Merah) --}}
        @if (session('error'))
            <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-100" role="alert">
                <span class="font-medium">Gagal!</span> {{ session('error') }}
            </div>
        @endif
    </div>

    @include('livewire.auth.components.partials.register._title')
    <form
        x-data="{
        focusNext(nextFieldId, event) {
            if (event.target.value.trim() !== '') {
                document.getElementById(nextFieldId).focus();
                }
            }
        }"
        wire:submit.prevent="register"
        class="mt-8 space-y-4">
        @include('livewire.auth.components.partials.register._fullname-field')
        @include('livewire.auth.components.partials.register._email-field')
        @include('livewire.auth.components.partials.register._password-field')
        @include('livewire.auth.components.partials.register._confirm-password-field')
        @include('livewire.auth.components.partials.register._submit-button')
    </form>

    @include('livewire.auth.components.partials.register._redirect-login')

</div>
