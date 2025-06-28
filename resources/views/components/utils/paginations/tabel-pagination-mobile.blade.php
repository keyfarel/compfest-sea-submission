<div class="flex flex-1 justify-between sm:hidden">
    @if ($paginator->onFirstPage())
        <span class="relative inline-flex items-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-semibold text-gray-400 cursor-not-allowed">Sebelumnya</span>
    @else
        <button wire:click="previousPage" wire:loading.attr="disabled" class="relative inline-flex items-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-semibold text-gray-700 hover:bg-gray-50">Sebelumnya</button>
    @endif

    @if ($paginator->hasMorePages())
        <button wire:click="nextPage" wire:loading.attr="disabled" class="relative ml-3 inline-flex items-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-semibold text-gray-700 hover:bg-gray-50">Berikutnya</button>
    @else
        <span class="relative ml-3 inline-flex items-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-semibold text-gray-400 cursor-not-allowed">Berikutnya</span>
    @endif
</div>
