<div>
    {{-- DIUBAH: Tambahkan wire:loading state untuk feedback ke pengguna --}}
    <button type="submit" wire:loading.attr="disabled"
            class="w-full flex justify-center py-3 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 disabled:opacity-75">
        <span wire:loading.remove>Masuk</span>
        <span wire:loading>Memproses...</span>
    </button>
</div>
