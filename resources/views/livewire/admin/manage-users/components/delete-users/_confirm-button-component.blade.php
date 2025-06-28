<div class="flex flex-col-reverse sm:flex-row sm:justify-end gap-3">

    <x-utils.buttons.cancel-button wireClick="$set('showDeleteModal', false)"/>

    <!-- Tombol Hapus Pengguna -->
    <x-utils.buttons.delete-button
        wireClick="delete"
        target="delete"
        default-text="Ya, Hapus Pengguna"
        loading-text="Menghapus Pengguna..."
    />
    </button>
</div>
