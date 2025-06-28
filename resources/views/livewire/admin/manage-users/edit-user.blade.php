<x-utils.modals.general-modal wire:model="showEditModal" title="Edit Detail Pengguna">
    <div class="space-y-6">

        <!-- Nama Lengkap -->
        @include('livewire.admin.manage-users.components.edit-users._fullname-component')

        <!-- Email -->
        @include('livewire.admin.manage-users.components.edit-users._email-component')

        <!-- Input Password -->
        @include('livewire.admin.manage-users.components.edit-users._password-component')

        <!-- Input Konfirmasi Password -->
        @include('livewire.admin.manage-users.components.edit-users._confirm-password-component')

        <!-- Dropdown Peran -->
        @include('livewire.admin.manage-users.components.edit-users._role-component')

        <!-- Status Akun -->
        @include('livewire.admin.manage-users.components.edit-users._status-component')
    </div>

    <x-slot:footer>
        @include('livewire.admin.manage-users.components.edit-users._confirm-button-component')
    </x-slot:footer>
</x-utils.modals.general-modal>
