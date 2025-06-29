@props([
'wireClick' => '',
'target' => '',
'defaultText' => 'Simpan',
'loadingText' => 'Menyimpan...'
])

<button wire:click="{{ $wireClick }}" wire:loading.attr="disabled" wire:target="{{ $target }}"
        {{ $attributes->merge([
        'class' => 'inline-flex items-center justify-center w-full sm:w-auto px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition duration-200 text-sm font-semibold disabled:opacity-75 disabled:cursor-wait focus:outline-none focus:ring-0 focus:border-none active:ring-0 active:border-none'
        ]) }}>

    {{-- Spinner --}}
    <x-utils.spinners.button-spinner :target="$target"/>

    {{-- Teks --}}
    <span wire:loading.remove wire:target="{{ $target }}">{{ $defaultText }}</span>
    <span wire:loading wire:target="{{ $target }}">{{ $loadingText }}</span>
</button>
