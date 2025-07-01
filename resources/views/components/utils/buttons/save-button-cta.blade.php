@props([
    'wireClick' => null,
    'target' => '',
    'type' => 'button',
    'size' => 'normal'
])

@php
    $sizeClasses = [
        'normal' => 'py-3 px-6 font-bold rounded-lg',
        'small' => 'py-2 px-4 font-semibold rounded-md shadow-sm',
    ][$size];
@endphp

<button
    type="{{ $type }}"

    @if ($wireClick)
        wire:click="{{ $wireClick }}"
    @endif

    wire:loading.attr="disabled"
    wire:target="{{ $target ?: $wireClick }}"

    {{ $attributes->class([
        'w-full bg-green-600 text-white hover:bg-green-700 transition-colors disabled:opacity-70 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500',
        $sizeClasses
    ]) }}>

    <div wire:loading wire:target="{{ $wireClick ?: $target }}">
        <x-utils.spinners.button-spinner/>
        Processing...
    </div>

    <div wire:loading.remove wire:target="{{ $wireClick ?: $target }}">
        {{ $slot }}
    </div>

</button>
