@props([
    'wireClick' => '',
    'target' => '',
    'type' => 'button',
])

<button
    type="{{ $type }}"
    wire:click="{{ $wireClick }}"
    wire:loading.attr="disabled"
    wire:target="{{ $target }}"
    {{ $attributes->merge([
        'class' => 'w-full bg-green-600 text-white font-bold py-3 px-6 rounded-lg hover:bg-green-700 transition-colors disabled:opacity-70 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500'
    ]) }}>

    {{-- Slot ini akan diisi oleh konten dari pemanggil --}}
    {{ $slot }}

</button>
