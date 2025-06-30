<x-utils.modals.confirmation-modal wire:model="showDeleteModal" title="Konfirmasi Hapus Pengguna">
    <div class="flex flex-col sm:flex-row sm:items-start sm:space-x-4 text-center sm:text-left">
        <!-- Ikon -->
        @include('livewire.admin.manage-users.components.delete-users._warning-icon-component')

        <!-- Konten Teks -->
        <div class="min-w-0 flex-1 mt-4 sm:mt-0">
            <p class="text-sm {{ session()->has('error') ? 'text-red-600 font-semibold' : 'text-gray-600' }}">
                @if (session()->has('error'))
                    {{ session('error') }}
                @else
                    Apakah Anda yakin ingin menghapus pengguna
                    <strong class="font-semibold text-gray-900">{{ $userNameToDelete }}</strong>
                    secara permanen?
                @endif
            </p>

            @if (!session()->has('error'))
                <p class="mt-2 text-sm text-gray-500">
                    Semua data yang terkait dengan pengguna ini akan dihapus selamanya. Tindakan ini tidak dapat diurungkan.
                </p>
            @endif
        </div>
    </div>

    <x-slot:footer>
        @include('livewire.admin.manage-users.components.delete-users._confirm-button-component')
    </x-slot:footer>
</x-utils.modals.confirmation-modal>
