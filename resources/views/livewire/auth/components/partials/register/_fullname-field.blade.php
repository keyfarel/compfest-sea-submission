<div>
    <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Nama Lengkap <span class="text-red-500">*</span></label>
    <div class="relative">
        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
            <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" /></svg>
        </div>
        {{-- DIUBAH: Tambahkan wire:model.blur="name" --}}
        <input type="text" id="name" wire:model.blur="name" placeholder="Nama lengkap Anda"
               class="block w-full bg-gray-50 border-gray-200 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 py-2.5 pl-10 pr-4 transition">
    </div>
    {{-- DIUBAH: Tambahkan @error untuk menampilkan pesan validasi --}}
    @error('name') <span class="text-xs text-red-500 mt-1">{{ $message }}</span> @enderror
</div>
