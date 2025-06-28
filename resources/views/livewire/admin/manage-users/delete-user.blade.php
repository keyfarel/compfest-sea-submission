<x-utils.modals.confirmation-modal wire:model="showDeleteModal" title="Konfirmasi Hapus Pengguna">

    <!-- Konten Modal -->
    <div class="flex flex-col items-center text-center sm:flex-row sm:items-start sm:text-left sm:space-x-4">
        <!-- Ikon Peringatan -->
        @include('livewire.admin.manage-users.components.delete-users._warning-icon-component')

        <!-- Konten Teks -->
        @include('livewire.admin.manage-users.components.delete-users._text-content-component')
    </div>

    <x-slot:footer>
        <!-- Tombol Konfirmasi -->
        @include('livewire.admin.manage-users.components.delete-users._confirm-button-component')
    </x-slot:footer>
</x-utils.modals.confirmation-modal>
