<td class="px-0 py-0 md:px-6 md:py-4 whitespace-nowrap text-sm font-medium md:table-cell block">
    <div class="block md:flex md:justify-center md:items-center md:space-x-4">
        <!-- Edit -->
        <button wire:click="requestUserEdit" type="button"
                class="block w-full text-center text-indigo-600 hover:text-indigo-900 py-3 border-t
                       md:w-auto md:inline md:py-0 md:border-0">
            Edit
        </button>
        <!-- Hapus -->
        <button wire:click="requestUserDeletion" type="button"
                class="block w-full text-center text-red-600 hover:text-red-900 py-3 border-t
                       md:w-auto md:inline md:py-0 md:border-0">
            Hapus
        </button>
    </div>
</td>
