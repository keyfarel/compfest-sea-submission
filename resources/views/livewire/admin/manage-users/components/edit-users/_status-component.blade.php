<div>
    <p class="text-sm font-semibold text-gray-700 mb-1">Status Akun</p>
    <fieldset class="space-y-3 mt-2">
        <div class="flex items-center">
            <input
                id="status-aktif"
                type="radio"
                wire:model="editingUser.status"
                value="Aktif"
                class="h-5 w-5 accent-green-600 border-gray-300"
            >
            <label for="status-aktif" class="ml-3 block text-sm font-medium text-gray-800">Aktif</label>
        </div>
        <div class="flex items-center">
            <input
                id="status-tidak-aktif"
                type="radio"
                wire:model="editingUser.status"
                value="Tidak Aktif"
                class="h-5 w-5 accent-green-600 border-gray-300 "
            >
            <label for="status-tidak-aktif" class="ml-3 block text-sm font-medium text-gray-800">Tidak
                Aktif</label>
        </div>
    </fieldset>
    @error('editingUser.status')
    <div class="mt-1 text-sm text-red-600">{{ $message }}</div>
    @enderror
</div>
