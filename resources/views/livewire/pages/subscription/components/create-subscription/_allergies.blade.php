<div class="mt-8" x-data="{
    content: @entangle('allergies').defer ?? '',
    maxLength: 300
}">
    <h2 class="text-lg font-bold text-gray-800">Allergies or Dietary Restrictions</h2>

    <div class="mt-4 relative">
        <label for="allergies" class="sr-only">Allergies or Dietary Restrictions</label>

        <textarea id="allergies"
                  rows="4"
                  wire:model.defer="allergies"
                  x-model="content"
                  maxlength="300" {{-- DIUBAH --}}
                  class="mt-1 block w-full border border-gray-400 rounded-md shadow-sm focus:outline-none focus:ring-[1px] focus:ring-green-500 focus:border-green-500 py-3 px-4 pr-20"
                  placeholder="Please list any allergies or dietary restrictions (optional)"></textarea>

        <div class="absolute bottom-3 right-3 text-sm"
             :class="{ 'text-red-600 font-semibold': content.length >= maxLength, 'text-gray-500': content.length < maxLength }">
            <span x-text="content.length"></span> / <span x-text="maxLength"></span>
        </div>

    </div>
    @error('allergies') <span class="text-sm text-red-500 mt-1">{{ $message }}</span> @enderror
</div>
