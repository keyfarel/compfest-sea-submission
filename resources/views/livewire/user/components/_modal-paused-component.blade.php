<x-utils.modals.general-modal wire:model="showPauseModal" title="Jeda Langganan">
    <div class="space-y-4">
        <div class="p-4 text-sm text-blue-700 bg-blue-100 rounded-lg">
            <p>Pilih rentang tanggal untuk menjeda langganan Anda.</p>
        </div>

        <div>
            <label for="pauseStartDate" class="block text-sm font-medium text-gray-700">Tanggal Mulai Jeda</label>
            <input
                type="date"
                id="pauseStartDate"
                wire:model.live="pauseStartDate"
                min="{{ now()->format('Y-m-d') }}"
                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
            @error('pauseStartDate') <span class="text-sm text-red-500">{{ $message }}</span> @enderror
        </div>

        <div>
            <label for="pauseEndDate" class="block text-sm font-medium text-gray-700">Tanggal Akhir Jeda</label>
            <input type="date" id="pauseEndDate" wire:model.live="pauseEndDate"
                   class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
            @error('pauseEndDate') <span class="text-sm text-red-500">{{ $message }}</span> @enderror
        </div>
    </div>

    <x-slot:footer>
        <button type="button" wire:click="confirmPause" wire:loading.attr="disabled"
                class="w-full sm:w-auto rounded-lg bg-yellow-500 px-4 py-2 text-sm font-semibold text-white shadow-sm hover:bg-yellow-600">
            Konfirmasi Jeda
        </button>
        <button type="button" @click="open = false"
                class="w-full sm:w-auto mt-2 sm:mt-0 rounded-lg bg-white px-4 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50">
            Batal
        </button>
    </x-slot:footer>
</x-utils.modals.general-modal>
