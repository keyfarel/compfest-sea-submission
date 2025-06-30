<x-utils.modals.general-modal wire:model="showEditModal" title="Edit Detail Pengguna">
    <div class="space-y-6">

        @if (session('success'))
            <div class="p-4 mb-4 text-sm bg-green-100 border border-green-200 text-green-700 rounded-md" role="alert">
                <span class="font-medium">Berhasil!</span> {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="p-4 mb-4 text-sm bg-red-100 border border-red-200 text-red-700 rounded-md" role="alert">
                <span class="font-medium">Gagal!</span> {{ session('error') }}
            </div>
        @endif

        <!-- Nama Lengkap -->
        @include('livewire.admin.manage-users.components.edit-users._fullname-component')

        <!-- Email -->
        @include('livewire.admin.manage-users.components.edit-users._email-component')

        <!-- Dropdown Peran -->
        @include('livewire.admin.manage-users.components.edit-users._role-component')

        <!-- Input Password -->
        @include('livewire.admin.manage-users.components.edit-users._password-component')

        <!-- Input Konfirmasi Password -->
        @include('livewire.admin.manage-users.components.edit-users._confirm-password-component')
    </div>

    <x-slot:footer>
        @include('livewire.admin.manage-users.components.edit-users._confirm-button-component')
    </x-slot:footer>
</x-utils.modals.general-modal>
