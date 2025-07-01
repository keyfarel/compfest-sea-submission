<div class="flex flex-col md:flex-row items-center gap-2 w-full md:w-auto">
    <input type="date" wire:model.live="startDate"
           class="border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-sm w-full text-center md:text-left">

    <span class="text-gray-400 font-medium">to</span>
    <input type="date" wire:model.live="endDate"
           class="border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-sm w-full text-center md:text-left">
</div>
