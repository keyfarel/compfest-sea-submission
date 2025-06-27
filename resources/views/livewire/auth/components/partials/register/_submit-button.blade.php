<div>
    <button type="button" wire:click.prevent="register" wire:loading.attr="disabled"
            class="w-full flex justify-center py-3 px-4 mt-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 transition-all hover:shadow-lg disabled:opacity-75"
            x-ref="submitButton">
        <span wire:loading.remove>Daftar Sekarang</span>
        <span wire:loading>Mendaftarkan...</span>
    </button>
</div>
